<?php
include "includes/bootstrap.php";

// проверяем, авторизован ли пользователь
if (!isset($_SESSION['auth'])) {
    // если не авторизован, перенаправляем на страницу входа
    header('Location: /login.php');
    die();
}

// Определяем каким методом пришел запрос (GET или POST)
$requestMethod = $_SERVER['REQUEST_METHOD'];

// если форма отправлена, сохраняем отзыв и дополнительные данные
if ($requestMethod === 'POST') {

    // извлекаем данные из запроса
    $full_name = $_POST['full_name'] ?? null;
    $post = $_POST['post'] ?? null;
    $rating = $_POST['rating'] ?? null;
    $avatar = $_FILES['avatar'];
    $comment = trim($_POST['comment']) ?? null;

    // Определяем пустой массив сообщений об ошибках
    $errors = [];
    if (!$full_name) {
        // ключ - имя поля
        $errors['full_name'] = 'Заполните поле "Ваше полное имя"';
    }

    if ($post == null) {
        $errors['post'] = 'Заполните поле "Ваша профессия"';
    }

    if (!$rating) {
        $errors['rating'] = 'Заполните поле "Оценка"';
    }

    if (!$avatar) {
        $errors['avatar'] = 'Заполните поле "Аватар"';
    }

    if (!$comment) {
        $errors['comment'] = 'Заполните поле "Отзыв"';
    }

    if (empty($errors)) {

        $path = 'img/ava/' . time() . '.webp';

        // Создаем объект Imagick и загружаем изображение
        $image = new Imagick($_FILES['avatar']['tmp_name']);

        // Устанавливаем качество сжатия в 80%
        $image->setImageCompressionQuality(80);

        // Преобразуем изображение в формат WebP и сохраняем его
        $image->setImageFormat('webp');
        $image->writeImage($path);

        // Очищаем память
        $image->clear();
        $image->destroy();

        if (!file_exists($path)) {
            $_SESSION['message'] = 'Ошибка при загрузке изображения!';
            header('Location: /views/form_review.php');
            die();
        }

        // извлекаем id пользователя из сессии
        $user_id = $_SESSION['auth'];

        // формируем запрос на обновление данных
        $update_query = "UPDATE `users` SET `full_name`=COALESCE(:full_name, `full_name`), `post`=COALESCE(:post, `post`), `rating`=COALESCE(:rating, `rating`), `avatar`=COALESCE(:avatar, `avatar`), `comment`=COALESCE(:comment, `comment`) WHERE `id`=:id";

        // выполняем запрос
        $stmt = $DB->query($update_query, [
            "full_name" => $full_name, "post" => $post, "rating" => $rating,
            "avatar" => $path, "comment" => $comment, "id" => $user_id
        ]);
        if (!$stmt) {
            $_SESSION['message'] = 'Ошибка при обновлении данных';
        }
        if (!$stmt == null) {
            // выводим сообщение об успешном обновлении данных
            $_SESSION['message'] = 'Данные обновлены!';
        }
    }
    // Если есть ошибки, сохраняем их в сессии в формате json, чтобы легко преобразовать их в массив
    if (!empty($errors)) {
        $_SESSION['review_form_errors'] = json_encode($errors);
    }

    // Также записываем данные, которые пришли с формы в сессиию, чтобы не заставлять пользователя заполнять их
    // по новой (в данном случае логин)
    $_SESSION['review_form_data'] = json_encode($_POST);
}

// редиректим на form_review.php
header('location: /views/form_review.php');
die();

include "./views/form_review.php";
