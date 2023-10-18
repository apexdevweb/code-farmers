<?php
require('actionback/database.php');
//VALIDATION DU FORMULAIRE
if (isset($_POST['modifpubli'])) {
    //ON VERIFIE QUE LES CHAMPS NE SONT PAS VIDE
    if (!empty($_POST['titlePubli']) && !empty($_POST['containPubli'])) {
        //ON SECURISE LE NOUVEAU TITRE ET CONTENU AVEC UN STRIP_TAGS
        $new_titre_publi = strip_tags($_POST['titlePubli']);
        $new_contenu_publi = strip_tags($_POST['containPubli']);
        //ON MET A JOUR LES NOUVELLES DONNEES DANS LA DATABASE
        $UpPubli = $bdd->prepare('UPDATE publications SET titre = ?, contenu = ? WHERE id = ?');
        $UpPubli->execute(array($new_titre_publi, $new_contenu_publi, $idPubli));

        header('Location: maPublication.php');
    } else {
        $errorMsg = "Veuillez completer tous les champs";
    }
}
