<?php
include "../includes/bootstrap.php";

// Определяем каким методом пришел запрос (GET или POST)
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Подключаем head
include '../views/layouts/_head.php';


$pageTitle = 'Профиль';
ob_start();

// Проверяем есть ли в сессии данные об ошибках отправленной формы
$errors = $_SESSION['review_form_errors'] ?? null;
if ($errors) {
    // Превращаем их в массив
    $errors = (array) json_decode($errors);

    // Удаляем из сессии, чтобы не показывались снова
    unset($_SESSION['review_form_errors']);
}

// Проверяем есть ли в сессии сохраненные данные формы
$loginFormData = $_SESSION['review_form_data'] ?? null;
if ($loginFormData) {
    $loginFormData = (array) json_decode($loginFormData);

    // Удаляем из сессии, чтобы не показывались снова
    unset($_SESSION['review_form_data']);
}

?>
<?php
$avasource = '../../';

if ($loggedInUser['avatar'] != null) {
    $avatar_html = "<img src='$avatar' alt='avatar' class='item-php__rating avatar'>";
}
if ($loggedInUser['avatar'] == null) {
    $avatar = '../img/ava/noav.png';
}
?>

<div class="container-form__review">
    <div class="container-show-review__review">
        <p class="text__review">Так отображается ваш последний отзыв:</p>
        <div class="item-block__testimonial">
            <div class="item__testimonial">
                <?php
                $avatar_html;
                $avasource = '../../';

                if ($loggedInUser['avatar'] != null) {
                    echo '<img src="' . $avasource . $loggedInUser['avatar'] . '" alt="avatar" class="item-img__testimonial">';
                }
                if ($loggedInUser['avatar'] == null) {
                    echo '<img src="../img/ava/noav_2.png" alt="avatar" class="item-img__testimonial">';
                }
                ?>
                
                <p class="item-name__testimonial"> <?= $loggedInUser['full_name']; ?> </p>
                <p class="item-post__testimonial"> <?= $loggedInUser['post']; ?> </p>
                <p class="item-text__testimonial"> <?= $loggedInUser['comment']; ?> </p>
            </div>
        </div>
        <!-- <form method="post" action="/logout.php">
        <button type="submit" class="logout__review">Выйти</button>
    </form> -->

    </div>
    <form method="post" action="../submit_review.php" enctype="multipart/form-data" class="form__review">

        <h2 class="text-h2__boot">Профиль<br>
            <div class="logIn__button loggedInUser"> <?= $loggedInUser['username']; ?> </div>
        </h2>

        <label for="full_name" class="label__review">Ваше полное имя:</label><br>
        <input type="text" id="post" name="full_name" class="input__review 
        <?= isset($errors['full_name']) ? 'is-invalid' : ''; ?>" value="<?= $loginFormData['full_name'] ?? ''; ?>"><br>

        <?php if (isset($errors['full_name'])) {
            echo '<p class="review-php__msg"> ' . $errors['full_name'] . ' </p>';
        }
        ?>

        <label for="post" class="label__review">Ваша профессия:</label><br>
        <input type="text" id="post" name="post" class="input__review 
        <?= isset($errors['post']) ? 'is-invalid' : ''; ?>" value="<?= $loginFormData['post'] ?? ''; ?>"><br>

        <?php if (isset($errors['post'])) {
            echo '<p class="review-php__msg"> ' . $errors['post'] . ' </p>';
        }
        ?>

        <label for="avatar" class="label__review">Аватар:</label><br>
        <input type="file" id="avatar" name="avatar" class="input__review"><br>

        <?php if (isset($errors['avatar'])) {
            echo '<p class="review-php__msg"> ' . $errors['avatar'] . ' </p>';
        }
        ?>

        <label for="rating" class="label__review">Оценка (от 1 до 5):</label><br>
        <input type="number" id="rating" name="rating" min="1" max="5" class="input__review
        <?= isset($errors['rating']) ? 'is-invalid' : ''; ?>" value="<?= $loginFormData['rating'] ?? ''; ?>"><br>

        <?php if (isset($errors['rating'])) {
            echo '<p class="review-php__msg"> ' . $errors['rating'] . ' </p>';
        }
        ?>

        <label for="comment" class="label__review ">Отзыв:</label><br>
        <textarea id="comment" name="comment" class="input__review
        <?= isset($errors['comment']) ? 'is-invalid' : ''; ?>"><?= $loginFormData['comment'] ?? ''; ?></textarea><br>

        <?php if (isset($errors['comment'])) {
            echo '<p class="review-php__msg"> ' . $errors['comment'] . ' </p>';
        }
        ?>
        <div class="container-buttons__review">
            <input type="submit" value="Обновить" name="review_form" class="submit__review">
        </div>

        <?php
        // Выводим последнее сообщение из сессии
        if (isset($_SESSION['message'])) {
            echo '<p class="review-php__msg a"> ' . $_SESSION['message'] . ' </p>';
            unset($_SESSION['message']);
        }
        ?>

    </form>

</div>

<?php
$content = ob_get_clean();
include "layouts/clean.php";
?>