<!DOCTYPE html>
<html lang="fr">
<?php
include("includes/head.php");
?>
<style>
    body {
        background-color: #000;
    }

    @media only screen and (max-width: 600px) {
        .premier_contenu {
            margin-top: 8vh;
            height: 75vh;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-evenly;
            overflow: hidden;
        }
    }
</style>

<body>
    <div class="section_contain">
        <section class="logoContent">
            <!--LOGO PRINCIPALE -->
            <img src="asset/wallpapper/Logo1.png">
            <!--SECTION DES CARTES -->
            <br>
            <br>
            <h4 class="firstTitre">Social networks for programmers</h4>
            <section class="premier_contenu">
                <div class="gltch">
                    <h5 class="crdsTitre">Home</h5>
                    <a href="home.php" style="display: none;" class="sub_title">Visite</a>
                    <div class="glitch">
                        <img src="../asset/wallpapper/bgfive.jpg" style="border-radius: 10px;">
                        <div style="display: none;" class="glitch__layers">
                            <div class="sub__layer"></div>
                            <div class="sub__layer"></div>
                            <div class="sub__layer"></div>
                            <div class="sub__layer"></div>
                            <div class="sub__layer"></div>
                            <div class="sub__layer"></div>
                            <div class="sub__layer"></div>
                            <div class="sub__layer"></div>
                        </div>
                    </div>
                </div>
                <div class="gltch2">
                    <h5 class="crdsTitre">Signup</h5>
                    <a href="signup.php" style="display: none;" class="sub_title2">Inscription</a>
                    <div class="glitch">
                        <img src="../asset/wallpapper/bgerrer2.jpg">
                        <div style="display: none;" class="glitch__layers2">
                            <div class="sub__layer2"></div>
                            <div class="sub__layer2"></div>
                            <div class="sub__layer2"></div>
                            <div class="sub__layer2"></div>
                            <div class="sub__layer2"></div>
                            <div class="sub__layer2"></div>
                            <div class="sub__layer2"></div>
                            <div class="sub__layer2"></div>
                        </div>
                    </div>
                </div>
                <div class="gltch3">
                    <h5 class="crdsTitre">Login</h5>
                    <a href="login.php" style="display: none;" class="sub_title3">Connexion</a>
                    <div class="glitch">
                        <img src="../asset/wallpapper/bgtree.jpg">
                        <div style="display: none;" class="glitch__layers3">
                            <div class="sub__layer3"></div>
                            <div class="sub__layer3"></div>
                            <div class="sub__layer3"></div>
                            <div class="sub__layer3"></div>
                            <div class="sub__layer3"></div>
                            <div class="sub__layer3"></div>
                            <div class="sub__layer3"></div>
                            <div class="sub__layer3"></div>
                        </div>
                    </div>
                </div>
            </section>
    </div>
    <script src="../asset/glitcher.js"></script>
</body>

</html>