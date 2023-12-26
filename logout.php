<?php
include "includes/bootstrap.php";

// Определяем каким методом пришел запрос (GET или POST)
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Разлогиниваем пользователя, если запрос пришел методом POST
if($requestMethod === 'POST') {
    unset($_SESSION['auth']);
}

header('location: /');
die();


