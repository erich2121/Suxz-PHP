<?php
/**
 * @var bool $isLoggedIn
 * @var array $loggedInUser
 */
$pageTitle = 'Регистрация';
ob_start();

// Проверяем есть ли в сессии данные об ошибках отправленной формы 
$errors = $_SESSION['signup_form_errors'] ?? null;
if($errors) {
    // Превращаем их в массив
    $errors = (array) json_decode($errors);

    // Удаляем из сессии, чтобы не показывались снова
    unset($_SESSION['signup_form_errors']);
}

// Проверяем есть ли в сессии сохраненные данные формы 
$signupFormData = $_SESSION['signup_form_data'] ?? null;
if($signupFormData) {
    $signupFormData = (array) json_decode($signupFormData);

    // Удаляем из сессии, чтобы не показывались снова
    unset($_SESSION['signup_form_data']);
}
?>

<div class="container__boot">
    <div class="container-window__boot">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">

                <div class="shadow__boot">
                    <div class="window__boot">

                        <form class="form__boot" autocomplete="off" method="post" action="/signup.php?action=signup">
                            <h2 class="text-h2__boot">Registration</h2>

                            <div class="label__boot">
                                <label for="username" class="form-label__boot">Login</label>
                                <input type="text" class="form-control__boot <?= isset($errors['username']) ? 'is-invalid' : ''; ?>" id="username" name="username"
                                       placeholder="username" value="<?= $signupFormData['username'] ?? ''; ?>">
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
                            <?php if(isset($errors['password_complete'])): ?>
                                    <div class="text-danger__boot">
                                        <?= $errors['password_complete']; ?>
                                    </div>
                            <?php endif; ?>
                            <div class="button-form__boot">
                                <button class="button__boot sign" type="submit" name="signup_form">Sign up</button>
                            </div>
                        </form>

                        <div>
                            <p class="text-p__boot">
                                Already have an account? <a href="/login.php" class="text-primary fw-bold">Log in</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include "layouts/clean.php";
?>
