<?php

include '../db/conn_db.php';

// on teste si formulaire de vote a été validé
if (isset($_POST['go']) && $_POST['go'] == 'Voter') {
    if (!isset($_POST['reponse']) || !isset($_POST['sondage_en_cours'])) {
        echo $erreur = 'Aucune réponse n\'a été choisie.';
    }
    // on teste si le visiteur a bien choisi une réponse avant d'avoir clické sur "Vote". On teste aussi si la variable $_POST['sondage_en_cours'] n'est pas vide
    if (empty($_POST['reponse'])) {
        echo $erreur = 'Au moins un des champs est vide.';
    } else {
        // là le visiteur à choisi une réponse
        // on prépare notre requête : on ajoute un vote pour la réponse choisie par le votant

        $mysqli->query('UPDATE tb_sondage SET compteur = compteur + 1 WHERE codeQ_Sondage="' . $_POST['sondage_en_cours'] . '" AND id_reponse="' . $_POST['reponse'] . '"') or die($mysqli->error);
        // on ferme la connexion à la base de donnée

        echo '<p>Merci d\'avoir voté :)</p>';
    }
}
?>
