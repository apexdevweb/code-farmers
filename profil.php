<?php
require('actionback/users/securityScript.php');
require('actionback/users/profilScript.php');
?>

<!DOCTYPE html>
<html lang="fr">
<?php
include('includes/head.php');
?>

<body>
    <?php
    include('includes/navbar.php');
    ?>
    <br>
    <div class="container">
        <?php
        if (isset($userSelectInfo)) {
        ?>
            <h3><?= $user_name_select; ?></h3>
            <hr>
            <div class="container text-left">
                <div class="row">
                    <div class="col">
                        <img src="asset/image/<?= $user_avatar_select; ?>" style="width: 300px; height: 300px">
                    </div>
                    <div class="col">
                        <h6>âge: <?= $user_age_select; ?></h6>
                        <h6>genre: <?= $user_genre_select; ?></h6>
                        <h6>ville: <?= $user_city_select; ?></h6>
                    </div>
                </div>
            </div>
            <hr>
            <!-- Swiper -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <hr>
        <?php
        }
        ?>
    </div>
    <script src="asset/initSwiper.js"></script>
</body>

</html>