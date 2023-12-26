<nav id="nav">
    <div id="nav-bar">
        <div class="logo-menu__bar">
            <a class="logo" href="#">
                <img id="logo" src="img/logo.svg" alt="logo">suxz
            </a>
            <ul class="nav-bar-menu">
                <a href="#">
                    <li>Home</li>
                </a>
                <a href="#container-screen__learnings">
                    <li>Learnings</li>
                </a>
                <a href="#container-screen__about">
                    <li>About&nbspus</li>
                </a>
                <a href="#screen-container__testimonial">
                    <li>Testimonial</li>
                </a>
            </ul>
        </div>
        
        

        <?php if (!$isLoggedIn) : ?>

            <div class="logIn-form">
                <a href="/login.php" class="logIn__button">Log in</a>
                <a href="/signup.php" class="signUp__button">Sign up</a>
            </div>
            
        <?php endif; ?>

        <?php if (!$isLoggedIn == null) : ?>

            <div class="logIn-form loggedInUser">
                <div class="logIn__button loggedInUser"> <a href="/views/form_review.php"><?= $loggedInUser['username']; ?> </a></div>

                <form method="post" action="/logout.php" class="form__boot">
                    <button type="submit" class="signUp__button">Logout</button>
                </form>
            </div>

        <?php endif; ?>

    </div>
</nav>
<div id="nav-gamburger">
    <!-- Logo -->
    <a href="#" class="logo-mobile">
        <img src="img/logo.svg" alt="logo">
    </a>
    <!-- Hamburger icon -->
    <input class="side-menu" type="checkbox" id="side-menu" />
    <label class="hamb" for="side-menu"><span class="hamb-line"></span></label>
    <!-- Menu -->
    <nav class="nav-burg">
        <ul class="menu">
            <a href="#">
                <li>Home</li>
            </a>
            <a href="#container-screen__learnings">
                <li>Learnings</li>
            </a>
            <a href="#container-screen__about">
                <li>About us</li>
            </a>
            <a href="#screen-container__testimonial">
                <li>Testimonial</li>
            </a>
        </ul>

        <?php if (!$isLoggedIn) : ?>

            <div class="logIn-form">
                <a href="/login.php" class="logIn__button">Log in</a>
                <a href="/signup.php" class="signUp__button">Sign up</a>
            </div>
        <?php endif; ?>

        <?php if (!$isLoggedIn == null) : ?>

            <div class="logIn-form">
                <div class="logIn__button loggedInUser"><a href="/views/form_review.php"><?= $loggedInUser['username']; ?> </a></div>

                <form method="post" action="/logout.php" class="form__boot">
                    <button type="submit" class="signUp__button">Logout</button>
                </form>
            </div>

        <?php endif; ?>


    </nav>
</div>