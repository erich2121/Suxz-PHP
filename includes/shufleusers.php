<?php


// выбираем случайных 4 пользователей
$users_query = "SELECT * FROM `users` ORDER BY RAND() LIMIT 8";
$users_stmt = $DB->query($users_query);
$users = $users_stmt->fetchAll();

// перемешиваем пользователей случайным образом
shuffle($users);

// отображаем пользователей
?>

<div class="item-block__testimonial">
    <?php
        $displayed_users = [];
        foreach ($users as $user) {
            if (
                !empty($user['avatar']) &&
                !empty($user['full_name']) &&
                !empty($user['post']) &&
                !empty($user['comment']) &&
                !in_array($user['full_name'], $displayed_users)
            ) {
                array_push($displayed_users, $user['full_name']);
    ?>
                <div class="item__testimonial" data-aos="fade-up">
                    <img src="../../<?= $user['avatar'] ?>" alt="avatar" class="item-img__testimonial">
                    <p class="item-name__testimonial"> <?= $user['full_name']?> </p>
                    <p class="item-post__testimonial"> <?= $user['post'] ?> </p>
                    <p class="item-text__testimonial"> <?= $user['comment'] ?> </p>
                </div>
    <?php
                if (count($displayed_users) >= 4) {
                    break;
                }
            }
        }
    ?>
</div>


  