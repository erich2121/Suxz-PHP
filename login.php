<?php
/**
 * @var DB $DB
 * @var boolean $isLoggedIn
 */
// Этот файлик подключаем на каждой страничке
include "includes/bootstrap.php";

// Определяем каким методом пришел запрос (GET или POST)
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Если пользователь уже залогинен, то средиректим его на главную
if($isLoggedIn) {
    header('location: /');
    die();
}

// Дальше код для обработки отправки формы входа

// Форма входа отправляет запрос методом POST, поэтому сначала проверим убедимся
if($requestMethod === 'POST') {
    // Теперь проверим, что запрос пришел именно от формы входа. Если это так, то в параметрах запроса будет ключ login_form
    // Он определен в html-атрибуте "name" кнопки входа

    if(isset($_POST['login_form'])) {
        // Форма отправляет запрос в этот файлик, но с припиской /?action=login
        // Когда мы отправляем формы на тот же адрес где находимся, важно чтобы он отличался
        $action = $_REQUEST['action'] ?? null;

        if($action === 'login') {
            // функция trim чистит пробелы по бокам строки
            $username = trim($_POST['username']) ?? null;
            $password = trim($_POST['password']) ?? null;

            // Определяем пустой массив сообщений об ошибках
            $errors = [];
            if(!$username) {
                // ключ - имя поля
                $errors['username'] = 'Fill in the field "Login"';
            }

            if(!$password) {
                $errors['password'] = 'Fill in the field "Password"';
            }

            if(empty($errors)) {
                // Ошибок пока нет, значит пользователь поля заполнил. Проверяем есть ли у нас такие товарищи

                // Обрати внимание как мы передаем имя пользователя в запрос. Если передавать пользовательский ввод в запрос,
                // то с легкостью можно сделать дыру в безопасности, давая возможность сделать SQL инъекцию
                $user = $DB->fetchOne("SELECT * FROM `users` WHERE `username` = :username", ['username' => $username]);

                // Если пол
                if(!$user) {
                    // Пользователя не нашли, добавим ошибку, но такую чтобы небыло понятно что именно он ввел неправильно
                    $errors['password'] = 'Wrong login or password.';
                } else {
                    // Раз нашли сверяем пароли
                    if(password_verify($password, $user['password_hash'])) {
                        // Создадим в сессии пользователя ключ, в который сохраним его ID — наличие ключа будет означать,
                        // что пользователь был авторизован
                        $_SESSION['auth'] = $user['id'];

                        // И редиректим его на главную
                        header('location: /index.php');
                        die();
                    } else {
                        $errors['password'] = 'Wrong login or password.';
                    }
                }
            }

            // Если есть ошибки, сохраняем их в сессии в формате json, чтобы легко преобразовать их в массив
            if(!empty($errors)) {
                $_SESSION['login_form_errors'] = json_encode($errors);
            }

            // Также записываем данные, которые пришли с формы в сессиию, чтобы не заставлять пользователя заполнять их
            // по новой (в данном случае логин)
            $_SESSION['login_form_data'] = json_encode($_POST);
        }

        // редиректим на login.php (напоминаю, что мы сейчас на /login.php?action=login
        header('location: /login.php');
        die();
    }
}

include "./views/login.php";