<?php
// Здесь прописываем действия, которые нужно выполнять на каждой странице и определяем общие переменные,
// которые могут нам пригодиться

// Стартуем пользовательскую сессию (https://metanit.com/php/tutorial/4.3.php)
session_start();

// Подключаем класс для работы с базой данных
include dirname(__DIR__) . "/classes/DB.php";

// Создаем экземпляр, в который передадим хост, юзер, пароль и название базы данных
$DB = new DB('localhost', 'root', '', 'stas');

// Проверяем залогинен ли пользователь и сохраняем это в переменную
$isLoggedIn = $_SESSION['auth'] ?? false;
$isLoggedIn = (bool) $isLoggedIn;

$loggedInUser = null;

// Если залогинен, то сохраним его в переменную
if($isLoggedIn) {
    $user = $DB->fetchOne("SELECT * FROM `users` WHERE `id` = :id", ['id' => $_SESSION['auth']]);

    if($user) {
        $loggedInUser = $user;
    } else {
        // Если пользователя в базе нет, то актуализируем соответствующие данные
        $isLoggedIn = false;
        unset($_SESSION['userId']);
    }
}
