<?php
// Устанавливаем заголовок страницы
$pageTitle = 'Вход';
// Открытие буфера вывода (читай внизу, чтобы понять зачем)
ob_start();

// Проверяем есть ли в сессии данные об ошибках отправленной формы
$errors = $_SESSION['login_form_errors'] ?? null;
if($errors) {
    // Превращаем их в массив
    $errors = (array) json_decode($errors);

    // Удаляем из сессии, чтобы не показывались снова
    unset($_SESSION['login_form_errors']);
}

// Проверяем есть ли в сессии сохраненные данные формы
$loginFormData = $_SESSION['login_form_data'] ?? null;
if($loginFormData) {
    $loginFormData = (array) json_decode($loginFormData);

    // Удаляем из сессии, чтобы не показывались снова
    unset($_SESSION['login_form_data']);
}
?>
<div class="container__boot">
    <div class="container-window__boot">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="shadow__boot">
                    <div class="window__boot">

                        <form class="form__boot" autocomplete="off" method="post" action="/login.php?action=login">
                            <h2 class="text-h2__boot">Authorisation</h2>

                            <div class="label__boot">
                                <label for="username" class="form-label__boot">Login</label>
                                <input type="text" class="form-control__boot <?= isset($errors['username']) ? 'is-invalid' : ''; ?>" id="username" name="username"
                                       placeholder="username" value="<?= $loginFormData['username'] ?? ''; ?>">

                                
                            </div>
                            <?php if(isset($errors['username'])): ?>
                                    <div class="text-danger__boot">
                                        <?= $errors['username']; ?>
                                    </div>
                                <?php endif; ?>
                            <div class="label__boot">
                                <label for="password" class="form-label__boot">Password</label>
                                <input type="password" class="form-control__boot <?= isset($errors['password']) ? 'is-invalid' : ''; ?>" id="password" name="password"
                                       placeholder="*******">

                                
                            </div>
                            <?php if(isset($errors['password'])): ?>
                                    <div class="text-danger__boot">
                                        <?= $errors['password']; ?>
                                    </div>
                                <?php endif; ?>
                            <div class="button-form__boot">
                                <button class="button__boot" type="submit" name="login_form">Log in</button>
                            </div>
                        </form>

                        <div>
                            <p class="text-p__boot">
                            Don't have an account? <a href="/signup.php" class="text-primary fw-bold">Get sign up!</a>
                            </p>
                                <!-- Выводим сообщение об ошибке авторизации из файла submit_review.php -->
                                <?php 
                                if (isset($_SESSION['message'])) {
                                    echo '<p class="auth-php__msg"> ' . $_SESSION['message'] . ' </p>';
                                    unset($_SESSION['message']); 
                                }
                                ?>
                            <!-- <a href="/index.php" class="text-primary fw-bold">Get back</a> -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
// Записываем html выше из буфера вывода в переменную как строку
$content = ob_get_clean();

// Подключаем один из общих шаблонов, в котором внедряется этот код (переменные передадутся туда)
include "layouts/clean.php";
?>