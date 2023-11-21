<?php
session_start();
require("../database.php");
if (isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['confirmkey']) && !empty($_GET['id'])) {
    $get_id = $_GET['id'];
    $get_cle = $_GET['confirmkey'];
    $verif_user = $bdd->prepare("SELECT * FROM users WHERE `id` = ? AND confirmkey = ?");
    $verif_user->execute(array($get_id,  $get_cle));
    if ($verif_user->rowCount() > 0) {
        $verif_user_info = $verif_user->fetch();
        if ($verif_user_info['confirm'] != 1) {
            $update_confirm = $bdd->prepare("UPDATE users SET confirm = ? WHERE `id` = ?");
            $update_confirm->execute(array(1, $get_id));
?>
            <!DOCTYPE html>
            <html lang="fr">
            <?php
            include "../../includes/head.php";
            ?>
            <style>
                body {
                    background-color: #000;
                }

                .logoContent {
                    text-align: center;
                    height: 100vh;
                    width: 100%;
                    overflow: hidden;
                    background-color: #000;
                }

                .logoContent>h2,
                h4 {
                    text-align: center;
                    color: #fff;
                }

                .logoContent>a {
                    text-align: center;
                    color: #fff;
                    font-size: 1.2rem;
                }

                .logoContent>img {
                    margin-top: 5vh;
                    height: 10vh;
                    width: 90%;
                }

                @media only screen and (max-width: 600px) {

                    .logoContent {
                        position: absolute;
                        height: auto;
                        width: 100%;
                        overflow: hidden;
                        background-color: #000;
                    }

                    .logoContent>img {
                        margin-top: 5vh;
                        height: 3vh;
                        width: 100%;
                    }
                }
            </style>

            <body>
                <section class="logoContent">
                    <img src="../../asset/wallpapper/Logo1.png">
                    <br>
                    <br>
                    <h2>Votre inscription est validé</h2>
                    <br>
                    <h4>Bienvenue <?= $verif_user_info['userName']; ?> <i class="fa-solid fa-arrow-right"></i><a href="../../login.php"> Connexion</a></h4>
                </section>
            </body>

            </html>
<?php
        } else {
            //SI L'UTILISATEUR EST DEJA CONFIRMER ON L'ENVOI SUR LA SESSION
            $_SESSION['confirmkey'] = $get_cle;
            header('Location: ../../home.php');
        }
    } else {
        echo "Votre clé ou identifiant est incorrecte";
    }
} else {
    echo "l'utilisateur n'existe pas !";
}
?>