<?php
// include "includes/bootstrap.php";

// Получаем данные из базы данных
$result = $DB->query("SELECT `username`, `post`, `rating`, `avatar`, `full_name`, `comment` FROM `users` ORDER BY RAND() LIMIT 1");

// 
if ($result->rowCount() > 0) {

    // Выводим из таблицы имя, должность и рейтинг
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $username = $row["username"];
    $post = $row["post"];
    $rating = $row["rating"];
    $avatar = $row["avatar"];
    $full_name = $row["full_name"];
    $comment = $row["comment"];
    


    // Если должность равна null, то заменим ее 
    if (!$post) {
        $post = 'Undefined';
    }

    // Рисуем шкалу рейтинга в картинках 
    if ($rating > 0) {
        ob_start();
        for ($i = 1; $i <= $rating; $i++) {
            echo "<img src='img/petuh.png' alt='star'>";
        }
        $stars = ob_get_clean();
    }

    if ($rating == null) {
        $stars = 'Without rating';
    }

    // Отображаем аватар пользователя 
    if ($avatar != null) {
        $avatar_html = "<img src='$avatar' alt='avatar' class='item-php__rating avatar'>";
    } 
    if ($avatar == null) {
        $avatar = '../img/ava/noav.png';
    }

    // echo "<p>$username holds the position of $post and has a rating of $rating <br> $stars</p>";
} else {
    echo "No user data found.";
}
?>
