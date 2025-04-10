<?php
require('backend/security/securityScript.php');
require("backend/script/publications/publicationScript.php");
?>
<!DOCTYPE html>
<html lang="fr">

<?php
include("include/head.php");
?>

<body>
    <header>
        <?php
        include("include/logo.php");
        include("include/nav.php");
        ?>
    </header>
    <br>
    <?php
    include("include/userpanel.php");
    ?>
    <div class="container">
        <form method="POST" enctype="multipart/form-data">
            <?php
            if (isset($errorMsg,)) {
                echo "<p>" . $errorMsg . "</p>";
            } elseif (isset($successMsg)) {
                echo "<p>" . $successMsg . "</p>";
            }
            ?>
            <section class="txt_bloc">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Le post que vous proposer</label>
                    <input type="text" class="form-control" name="titlePubli" maxlength="25" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Description de l'offre</label>
                    <textarea class="form-control" name="containPubli" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Lieu de de travail</label>
                    <select class="form-select form-select-sm" name="city" required>
                        <option selected>...</option>
                        <option value="Anvers">Anvers</option>
                        <option value="Limbourg">Limbourg</option>
                        <option value="Flandre orientale">Flandre orientale</option>
                        <option value="Brabant famand">Brabant famand</option>
                        <option value="Flandre occidenal">Flandre occidenal</option>
                        <option value="Bruxelles">Bruxelles</option>
                        <option value="Namur">Namur</option>
                        <option value="Brabant wallon">Brabant wallon</option>
                        <option value="Hainaut">Hainaut</option>
                        <option value="Luxembourg">Luxembourg</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Les heures par semaines</label>
                    <input type="number">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Type de contrat proposer</label>
                    <select class="form-select form-select-sm" name="city" required>
                        <option selected>...</option>
                        <option value="cdd">Cdd</option>
                        <option value="cdi">Cdi</option>
                        <option value="mitemp">Mi-temp</option>
                        <option value="stagiaire">Stagiaire</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Le salaire net que vous proposer</label>
                    <p>Veuillez choisir une devise</p>
                    <div class="device__container--choice">
                        <i class="fa-solid fa-arrow-right"></i>
                        <div class="device__sub--container">
                            <label for="device" class="device__label"><img src="assets/images/euro.png" alt="logoEuro"></label>
                            <input type="radio" value="euro" name="device">
                        </div>
                        <div class="device__sub--container">
                            <label for="device" class="device__label"><img src="assets/images/dollar.png" alt="logoDollar"></label>
                            <input type="radio" value="usd" name="device">
                        </div>
                    </div>
                    <!-- <input type="number" placeholder="€" id="eur">
                    <input type="number" placeholder="$" id="dollars"> -->
                </div>
            </section>
            <br>

            <br>
            <div class="mb-3">
                <div class="input-group mb-3">
                    <label class="input-group-text">Publier un fichier</label>
                    <input type="file" class="form-control" name="publiImg">
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="publish">Publier</button>
        </form>
    </div>
    <script type="text/javascript">
        const eur = document.getElementById("eur");
        const doll = document.getElementById("dollars");

        if (eur) {

        } else if (doll) {

        }
    </script>
</body>

</html>