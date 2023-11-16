<?php
require "PHPMailer/PHPMailerAutoload.php";
require "actionback/users/signupScript.php";

if (isset($_POST['signup'])) {
    if (!empty($_POST['mail'])) {
        // ON GENERE UNE CLE POUR CONFIRMATION PAR MAIL -> $keyConfirm
        $keyConfirm = mt_rand(1000000, 9000000);
        $verifMail = $_POST['mail'];
        $verifInsert = $bdd->prepare("INSERT INTO users(mail, confirmkey, confirm) VALUES (?,?,?)");
        $verifInsert->execut(array($verifMail, $keyConfirm, 0));

        // ON RECUPERE LES INFO DE L'UTILISATEUR POUR LA CONFIRMATION PAR EMAIL

        $verifRecupUser = $bdd->prepare("SELECT * FROM users WHERE mail = ?");
        $verifRecupUser->execute(array($verifMail));

        if ($verifRecupUser->rowCount() > 0) {
            $verifUserInfos = $verifRecupUser->fetch();
            $_SESSION['id'] = $verifRecupUserMail['id'];

            //PHP MAILER/////////////////////////////////////////////////////

            function smtpmailer($to, $from, $from_name, $subject, $body)
            {
                $mail = new PHPMailer();
                $mail->IsSMTP();
                $mail->SMTPAuth = true;

                $mail->SMTPSecure = 'ssl';
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = '465';
                $mail->Username = 'Apex-dev@dmin';
                $mail->Password = 'votre mdp email';

                //   $path = 'reseller.pdf';
                //   $mail->AddAttachment($path);

                $mail->IsHTML(true);
                $mail->From = "Apexdevweb@gmail.com";
                $mail->FromName = $from_name;
                $mail->Sender = $from;
                $mail->AddReplyTo($from, $from_name);
                $mail->Subject = $subject;
                $mail->Body = $body;
                $mail->AddAddress($to);

                if (!$mail->Send()) {
                    $error = "Please try Later, Error Occured while Processing...";
                    return $error;
                } else {
                    $error = "Thanks You !! Your email is sent.";
                    return $error;
                }
            }

            $to   = $Umail;
            $from = 'codefarmers.admin@gmail.com';
            $name = 'Admin';
            $subj = 'Confirmation de votre compte';
            $msg = 'http://code-farmerbeta/actionback/users/confirmationMail.php?id=' . $_SESSION['id'] . '&confirmkey=' . $keyConfirm;

            $error = smtpmailer($to, $from, $name, $subj, $msg);
            //PHP MAILER FIN/////////////////////////////////////////////////////

        }
    } else {
        echo "Veuillez remplir le champs E-mail !";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<?php
include "includes/head.php";
?>

<body>
    <div class="container">
        <br>
        <a href="index.php"><i class="fa-solid fa-arrow-left"></i>Retour</a>
        <br>
        <br>
        <form method="POST">
            <?php
            if (isset($errorMsg)) {
                echo "<p>" . $errorMsg . "</p>";
            }
            ?>
            <div class="mb-3">
                <label for="userName" class="form-label">User-name</label>
                <input type="text" class="form-control" name="userName">
            </div>
            <div class="input-group mb-3">
                <input type="email" class="form-control" name="mail" placeholder="E-mail">
                <span class="input-group-text">@example.com</span>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="userPassword">
            </div>
            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirme password</label>
                <input type="password" class="form-control" name="confirmPassword">
            </div>
            <label for="city" class="form-label">Choisir une province</label>
            <select class="form-select form-select-sm" name="city">
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
            <br>
            <div class="container_downform">
                <label for="dateNaissance" class=" form-label">Votre date de naissance</label>
                <input type="date" name="dateNaissance">
                <br>
                <label for="Homme" class=" form-label">Votre genre <i class="fa-solid fa-arrow-right"></i></label>
                <div class="subcontainer_downform">
                    <label for="genre" class=" form-label">Homme</label>
                    <input type="radio" name="genre" value="Homme">
                    <label for="dateNaissance" class=" form-label">Femme</label>
                    <input type="radio" name="genre" value="Femme">
                </div>
            </div>
            <br>
            <br>
            <button type="submit" class="btn btn-primary" name="signup">Inscription</button>
        </form>
        <br>
        <a href="login.php">J'ai déjà un compte, je me connecte<i class="fa-solid fa-arrow-right"></i></a>
    </div>

</body>

</html>
