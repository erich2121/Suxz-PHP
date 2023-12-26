<?php
// Такие вот коментарии как ниже, нужны чтобы тебе и другим было понятно, какие переменные, необъвленные в этом файле используются
// также что-бы не ругался твой редактор, если он умеет анализировать код
/**
 * @var $content string
 */
?>
<!doctype html>
<html lang="ru">
<?php
// назвали с нижним подчеркиванием, чтобы отличать шаблоны от их составных частей
include '_head.php'
?>



<body>

    <div class="wrapper">

        <?php include 'nav.php' ?>

        <header class="header">

            <div class="container-flex__header">
                <div class="img__header">
                    <div class="block__counts">
                        <p class="title__counts">Members</p>
                        <div class="countusers__counts">

                            <?php include 'includes/countusers.php' ?>

                        </div>
                        <img src="../../img/naebka.png" alt="img" class="dynamics__counts">
                    </div>
                    <img src="img/header-bg.png" alt="">

                </div>
                <div class="flex-column__header">
                    <p class="title__header">suxz make it easy</p>
                    <h1 class="text-h1__header">
                        Find Your Way <br>Of Success
                    </h1>
                    <h2 class="text-h2__header">
                        We help you to increase self-confidence and<br>
                        train yourself in a direction, and make you more<br>
                        creative in developing a work
                    </h2>
                    <div class="container-buttons__header">
                        <div class="block-buttons__header">
                            <a href="#" class="getStarted__button">Get Started</a>
                            <a href="#" class="ourServices__button">Our Services</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <div id="container-screen__learnings">
                <div class="container-block__learnings">
                    <div class="screen__learnings">
                        <p class="title__learnings">learnings</p>
                        <h2 class="text-h2__learnings">Online Learning Platform<br>
                            International Curriculum</h2>
                        <p class="text-study__learnings">Study and understand the material
                            class is more relaxed without time limit.</p>
                    </div>
                    <div class="learnings-flexbox">
                        <div class="learnings-block-items">
                            <div class="learnings-flex__item" data-aos="fade-up" style="transition: 0.5s ease-out;">
                                <img src="img/item1.png" height="80px" width="80px" alt="icon" class="learnings-flex__img">
                                <h3 class="learnings-flex__heading">Starter</h3>
                                <p class="learnings-flex__description">Free class access for that
                                    start learning code and
                                    design</p>
                                <a data-mymodal data-id="modal1" data-mytab="1" href="#" class="js-open-modal">See Class</a>
                            </div>
                            <div class="learnings-flex__item" data-aos="fade-up" style="transition: 0.5s ease-out;">
                                <img src="img/item2.png" height="80px" width="80px" alt="icon" class="learnings-flex__img">
                                <h3 class="learnings-flex__heading">Premium</h3>
                                <p class="learnings-flex__description">Advanced material from
                                    the Starter &
                                    learn to
                                    build projects</p>
                                <a data-mymodal data-id="modal1" data-mytab="2" href="#" class="js-open-modal">See Class</a>
                            </div>
                        </div>
                        <div class="learnings-block-items">
                            <div class="learnings-flex__item" data-aos="fade-up" style="transition: 0.5s ease-out;">
                                <img src="img/item3.png" height="80px" width="80px" alt="icon" class="learnings-flex__img">
                                <h3 class="learnings-flex__heading">Superstar</h3>
                                <p class="learnings-flex__description">Materials for experts
                                    who have completed the
                                    premium package</p>
                                <a data-mymodal data-id="modal1" data-mytab="3" href="#" class="js-open-modal">See Class</a>
                            </div>
                            <div class="learnings-flex__item" data-aos="fade-up" style="transition: 0.5s ease-out;">
                                <img src="img/item4.png" height="80px" width="80px" alt="icon" class="learnings-flex__img">
                                <h3 class="learnings-flex__heading">Bootcamp</h3>
                                <p class="learnings-flex__description">Informatics science
                                    training program with
                                    the latest material</p>
                                <a data-mymodal data-id="modal1" data-mytab="4" href="#" class="js-open-modal">See Class</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="modal1" class="mymodal">
                    <div class="mymodal__body">
                        <button class="mymodal__close" type="button" title="Закрыть">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1317 11.1317L4 3L3.29289 3.70711L11.4246 11.8388L3.29288 19.9706L3.99998 20.6777L12.1317 12.5459L20.2635 20.6777L20.9706 19.9706L12.8388 11.8388L20.9705 3.70711L20.2634 3L12.1317 11.1317Z" fill="black" />
                            </svg>
                        </button>
                        <div class="mymodal__content">
                            <div class="mytabs">
                                <div class="mytabs-nav">
                                    <a href="#" class="mytabs-nav__item" data-id="1">Starter</a>
                                    <a href="#" class="mytabs-nav__item" data-id="2">Premium</a>
                                    <a href="#" class="mytabs-nav__item" data-id="3">Superstar</a>
                                    <a href="#" class="mytabs-nav__item" data-id="4">Bootcamp</a>
                                    <a href="#" class="mytabs-nav__item" data-id="5">Other article</a>
                                </div>
                                <div class="mytabs-content">
                                    <div class="mytabs-content__item" data-id="1">
                                        <p class="modal__title">Starter</p>
                                        <p class="modal__text">
                                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nam culpa cumque,
                                            fuga facere nobis laboriosam dignissimos necessitatibus maiores? Fugit cum
                                            amet iusto ex similique accusantium delectus dolorum, quaerat et vel.
                                        </p>
                                    </div>
                                    <div class="mytabs-content__item" data-id="2">
                                        <p class="modal__title">Premium</p>
                                        <p class="modal__text">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, porro nisi
                                            sint recusandae veniam ipsam? Autem unde, voluptates doloribus illo et
                                            sapiente culpa explicabo ipsam aut soluta, perspiciatis, aliquid sunt.
                                            Consectetur minus, pariatur natus assumenda distinctio, modi doloremque eum
                                            similique quaerat sed sint, veritatis quo. Corporis aperiam dolor maxime
                                            recusandae rem explicabo aspernatur, officia rerum ad debitis! Rerum, id
                                            porro!
                                            Velit rerum quas et incidunt dolor, pariatur fuga eum placeat distinctio
                                            facilis eveniet quaerat maxime iste fugit hic iusto ipsam similique
                                            doloremque animi. Temporibus doloremque, repudiandae et nisi numquam id.
                                        </p>
                                    </div>
                                    <div class="mytabs-content__item" data-id="3">
                                        <p class="modal__title">Superstar</p>
                                        <p class="modal__text">
                                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero, quod
                                            dolore! Optio expedita ex non repellendus quasi? Veritatis, dicta modi. Sed
                                            ex ullam dolor at officia id quia velit beatae?
                                            Inventore laudantium cumque nisi adipisci facilis veniam autem corporis
                                            voluptatem, expedita ex. Optio veniam, hic voluptatibus, amet, consectetur
                                            ullam molestias debitis delectus fugiat ipsa harum esse! Modi deleniti nobis
                                            iusto.
                                            Facilis ratione voluptatem iusto officia laborum, sint voluptas. Voluptatem
                                            doloribus ipsam autem voluptas rerum et sed similique cumque molestias
                                            excepturi consequuntur, neque, vero eos tempora iure itaque dolorum suscipit
                                            corrupti.
                                            Eveniet itaque necessitatibus voluptates repudiandae possimus, corrupti
                                            molestiae nemo eius saepe commodi blanditiis facilis facere sint, eaque
                                            similique. Assumenda consequuntur libero magni est dicta ducimus nam totam
                                            velit dolor aut.
                                        </p>
                                    </div>
                                    <div class="mytabs-content__item" data-id="4">
                                        <p class="modal__title">Bootcamp</p>
                                        <p class="modal__text">
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis, assumenda.
                                            Commodi nisi maxime amet voluptatem quam sint optio aliquid? Numquam, illum
                                            saepe fuga nobis alias deleniti modi delectus itaque tenetur!
                                            Facere in error soluta porro quia, assumenda quibusdam iure nemo ut hic
                                            reprehenderit dignissimos excepturi vero pariatur modi, non nulla quas quasi
                                            eaque? Corporis dolore vitae possimus dolor a consequuntur.
                                            Dolor praesentium nesciunt cupiditate voluptatum, eligendi nihil optio quia
                                            impedit, ab temporibus, excepturi laborum ullam consectetur. Fugit mollitia,
                                            accusamus laborum vero temporibus minima, id accusantium provident quae qui
                                            voluptatibus modi.
                                            Consectetur necessitatibus molestias officiis cum ad! Voluptate, rerum. Ad
                                            mollitia, rem id rerum ea sequi iste quasi quisquam illum inventore cum est
                                            laborum odio atque harum quos ab quia consequatur.
                                            Natus, expedita. Id, accusantium. Voluptates autem eius blanditiis tempora
                                            omnis. Quia optio nam consequatur? Nisi, sed maiores aliquid id expedita
                                            dolores beatae. Iusto, voluptas officia ab nostrum aliquam magnam! Quos!
                                        </p>
                                    </div>
                                    <div class="mytabs-content__item" data-id="5">
                                        <p class="modal__title">Other article</p>
                                        <p class="modal__text">
                                            If you need other articles just add string into your html code : <br>
                                            &lt;div class="mytabs-content__item" data-id="6"&gt;
                                            <br> &lt;p class="modal__title">New article&lt;/p&gt;
                                            <br> &lt;p class="modal__text">
                                            Some text...
                                            &lt;/p&gt;
                                            <br> &lt;/div&gt;
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="container-screen__about">
                <div class="container-block__about">
                    <div class="flexbox__about">
                        <div class="block-img__about">
                            <img src="img/woman.png" alt="img" class="img__about">
                            <div class="block__rating">
                                <div class="block-block__rating">

                                    <?php include 'includes/ratingscale.php' ?>
                                    
                                    <img src="../../<?= $avatar?>" alt="avatar" class="item-php__rating avatar">
                                    <div class="item-php__rating">
                                        <p class="title__rating">

                                            <?php if(!$full_name) {
                                                echo $username;
                                            } else {
                                                echo $full_name;
                                            } 
                                            ?>  

                                        </p>
                                        <p class="post__rating"><?= $post; ?></p>
                                        <div class="raiting-scale__rating"><?= $stars; ?></div>     
                                    </div>                                      
                                </div>
                            </div>
                        </div>

                        <div class="flex-content__about">
                            <p class="title__about">about us</p>
                            <h2 class="h2-text__about">We Help Improve
                                Your Work Experience</h2>
                            <p class="text-increase__about">We help you to increase self-confidence
                                and train yourself in a direction.</p>
                            <ul class="flex-list__about">
                                <li class="item__about" data-aos="fade-left"> <img src="img/Vector1.svg" alt="ico">
                                    <p>Study and produce creation to
                                        get a job</p>
                                </li>
                                <li class="item__about" data-aos="fade-left"><img src="img/Vector1.svg" alt="ico">
                                    <p>Up to date material and created by
                                        expert creators</p>
                                </li>
                                <li class="item__about" data-aos="fade-left"><img src="img/Vector1.svg" alt="ico">
                                    <p>Complete classes and projects and
                                        get a certificate from us</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="container-screen__recruit">
                <h2 class="h2-text__recruit">Companies That Recruit Our Graduates</h2>
                <p class="text__recruit">Our graduates have worked in more than 400 companies around the World</p>
                <div class="flexbox-companies__recruit">
                    <a href="#"><img src="img/Github.png" height="54px" width="170px" alt="Github" class="item__recruit" data-aos="zoom-in" style="transition: 0.5s ease-out;"></a>
                    <a href="#"><img src="img/Microsoft.png" height="40px" width="190px" alt="Microsoft" class="item__recruit" data-aos="zoom-in" style="transition: 0.5s ease-out;"></a>
                    <a href="#"><img src="img/Redis.png" height="55px" width="170px" alt="Redis" class="item__recruit" data-aos="zoom-in" style="transition: 0.5s ease-out;"></a>
                    <a href="#"><img src="img/Amazon.png" height="45px" width="170px" alt="Amazon" class="item__recruit" data-aos="zoom-in" style="transition: 0.5s ease-out;"></a>
                    <a href="#"><img src="img/Paypal.png" height="43px" width="170px" alt="Paypal" class="item__recruit" data-aos="zoom-in" style="transition: 0.5s ease-out;">
                    </a>
                    <a href="#"><img src="img/Linkedin.png" height="43px" width="160px" alt="Linkedin" class="item__recruit" data-aos="zoom-in" style="transition: 0.5s ease-out;">
                    </a>
                    <a href="#"><img src="img/Reddit.png" height="52px" width="160px" alt="Reddit" class="item__recruit" data-aos="zoom-in" style="transition: 0.5s ease-out;">
                    </a>
                    <a href="#"><img src="img/Medium.png" height="38px" width="180px" alt="Medium" class="item__recruit" data-aos="zoom-in" style="transition: 0.5s ease-out;">
                    </a>
                </div>
            </div>
            <div id="screen-container__testimonial">
                <div class="screen-block__testimonial">
                    <p class="title__testimonial">testimonial</p>
                    <h2 class="h2-text__testimonial">our alumni say</h2>
                    <p class="text__testimonial">These are the words of people who have taken our class</p>
                    <div class="flexbox__testimonial">
                        <div class="flex-items__testimonial">

                        <?php include 'includes/shufleusers.php' ?>
                        
                        </div>
                    </div>
                </div>
            </div>
            <div id="screen-container__contacts">
                <div class="filer__contacts">
                    <h2 class="h2-text__contacts">So? What Are You Waiting For</h2>
                    <p class="text__contacts">It's time to build your career, study in a relaxed and purposeful manner
                    </p>
                    <div class="block-buttons__contacts">
                        <a href="#" class="getStarted__button">Get Started</a>
                        <a href="tel:+6202131048184" class="contactUs__button">Contact Us</a>
                    </div>
                </div>
            </div>
        </main>

        <?php
        include '_footer.php'
        ?>

    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="js/script.js"></script>
</body>

</html>