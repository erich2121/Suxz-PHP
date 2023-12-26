<?php
/**
 * @var bool $isLoggedIn
 */
// Этот файлик подключаем на каждой страничке
include "includes/bootstrap.php";

// Если пользователь не залогинен, то средиректим его на форму входа
// if(!$isLoggedIn) {
//     header('location: /login.php');
//     die();
// }

// Подключаем шаблон (вьюху)
include "./views/index.php";