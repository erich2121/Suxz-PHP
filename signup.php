<?php
/**
 * @var bool $isLoggedIn
 */
include "includes/bootstrap.php";

// Определяем каким методом пришел запрос (GET или POST)
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Если пользователь залогинен, то средиректим его на главную
if($isLoggedIn) {
    header('location: /');
    die();
}

// Дальше код для обработки отправки формы регистрации

// Форма регистрации отправляет запрос методом POST, поэтому сначала проверим убедимся
if($requestMethod === 'POST') {
    // Теперь проверим, что запрос пришел именно от формы регистрации. Если это так, то в параметрах запроса будет ключ signup_form
    // Он определен в html-атрибуте "name" кнопки входа

    if(isset($_POST['signup_form'])) {
        // Форма отправляет запрос в этот файлик, но с припиской /?action=signup
        // Когда мы отправляем формы на тот же адрес где находимся, важно чтобы он отличался
        $action = $_REQUEST['action'] ?? null;
        
        if($action === 'signup') {
            // Передаем значения полей формы, используя защиту от SQL-инъекций
            $username = trim($_POST['username']) ?? null;

            // Передаем ввод без метода хэширования пароля, чтобы не выскакивала ошибка 
            // так как метод password_hash(он будет прописан следующим шагом ниже) не может иметь значения null
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

            // Если ошибок нет, то продолжаем
            if(empty($errors)) {

            // Передаем значения поля формы с уже хэшированным паролем
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            // Проверяем пользователя
            $user = $DB->fetchOne("SELECT * FROM `users` WHERE `username` = :username", ['username' => $username]);

            // Проверим, не занято ли имя пользователя
            if(!$user) {
                
            // Записываем рандомный 16-чный набор символов для поля auth_key в базе данных
            $hex = bin2hex(random_bytes(18));
            $randomString = $hex;

            // Подготавливаем запрос на добавление нового пользователя в базу данных
            $stmt = $DB->query("INSERT INTO `users` (`username`, `password_hash`, `auth_key`) 
            VALUES (:username, :password, :randomString)", [$username, $password, $randomString]);
            }

            // Если имя занято
            if(!$user == null) {
                $errors['password'] = 'This user already exists';
            } 
            }

            // Если есть ошибки, сохраняем их в сессии в формате json, чтобы легко преобразовать их в массив
            if(!empty($errors)) {
                $_SESSION['signup_form_errors'] = json_encode($errors);
            }

            // Также записываем данные, которые пришли с формы в сессиию, чтобы не заставлять пользователя заполнять их
            // по новой (в данном случае логин)
            $_SESSION['signup_form_data'] = json_encode($_POST);
        }
        // редиректим на signup.php ( напоминаю, что мы сейчас на /signup.php?action=signup )
        if (!$stmt) {   
            header('location: /signup.php');
        }
        // редиректим на login.php при успешной регистрации
        if (!$stmt == null) {
            header('location: /login.php');  
        }  
        // header('location: /signup.php');
        die();
    }
}
include "./views/signup.php";