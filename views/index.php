<?php
/**
 * @var bool $isLoggedIn
 * @var array $loggedInUser
 */

$pageTitle = 'Главная';
ob_start();
?>

<!-- <div class="vh-100 d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="border border-3 border-primary"></div>
                <div class="card bg-white shadow-lg"> -->
                    <!-- <div class="card-body p-5"> -->


                            <h5 class="row col-3.offset-md-3 justify-content-center align-items-center">Авторизован:
                                <p class="row fw-bold justify-content-center text-danger"><?= $loggedInUser['username']; ?></p>
                            </h5>
                                
                            

                            <!-- <div class="mb-3"> -->
                                
                            <form method="post" action="/logout.php" class="col-3 row justify-content-center align-items-center">
                            <button type="submit" class="btn btn-info">Выйти</button>
                            </form>

                            <!-- </div> -->
                           

                        
                    <!-- </div> -->
                <!-- </div>
            </div>
        </div>
    </div>
</div> -->
<?php
$content = ob_get_clean();
include "layouts/main.php";
?>
