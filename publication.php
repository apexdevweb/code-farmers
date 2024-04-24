<?php
require('actionback/users/securityScript.php');
require("actionback/publications/publicationScript.php");
?>
<!DOCTYPE html>
<html lang="fr">

<?php
include("includes/head.php");
?>

<body>
    <?php
    include("includes/navbar.php");
    ?>
    <br>
    <?php
    include("includes/userpanel.php");
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
                    <label for="exampleInputEmail1" class="form-label">Titre de la publication</label>
                    <input type="text" class="form-control" name="titlePubli" maxlength="25" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Description de la publication</label>
                    <textarea class="form-control" name="containPubli" required></textarea>
                </div>
            </section>
            <br>
            <section class="code_bloc">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">HTML5 <i class="fa-brands fa-html5"></i></label>
                    <textarea type="text" class="form-control" name="cdhtml" id="code_html" oninput="refresh()"></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">CSS3 <i class="fa-brands fa-css3"></i></label>
                    <textarea type="text" class="form-control" name="cdcss" id="code_css" oninput="refresh()"></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">JAVASCRIPT <i class="fa-brands fa-js"></i></label>
                    <textarea type="text" class="form-control" name="cdjavascript" id="code_js" oninput="refresh()"></textarea>
                </div>
                <iframe id="res"></iframe>
            </section>
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
    <!--script de l'éditeur de code-->
    <script>
        function refresh() {
            const cde_html = document.getElementById('code_html').value;
            const cde_css = "<style>" + document.getElementById('code_css').value + "</style>";
            const cde_js = "<scri" + "pt>" + document.getElementById('code_js').value + "</scri" + "pt>";
            const page = document.getElementById('res').contentWindow.document;
            page.open();
            page.write(cde_html + cde_css + cde_js);
            page.close();
        }
    </script>
    <!--script de l'éditeur de code fin-->
</body>

</html>