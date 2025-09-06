<?php
require_once('backend/connection/connexionDB.php');
// ON RECUPERE TOUTES LES PUBLICATIONS DANS UN "array" "grâce à son ID" DU L'UTILISATEUR CONNECTER
try {
    $publi_rescu = $bdd->prepare("SELECT `id`, `titre`, `contenu`,`nom_auteur`,`date_publication`, `img_publication` FROM publications WHERE id_auteur = ? ORDER BY `id` DESC");
    $publi_rescu->execute([$_GET['id']]);
    if ($publi_rescu->rowCount() === 0) {
        $no_publi_msg = "<p>" . "Aucune publication pour le moment" . "</p>";
    }
} catch (PDOException $e) {
    echo "Erreur de récupération des publications" . $e->getMessage();
}
