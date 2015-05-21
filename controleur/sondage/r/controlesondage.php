<?php require_once $_SERVER['DOCUMENT_ROOT'].'Ecostat/controleur/sondage/r/affichesondage.php';



$ctrl = new Sondage2();
if (isset($_GET['id'])) /*&& $_POST['selectionner']=='Selectionner')*/ {
    // on teste si le visiteur a bien choisi une réponse avant d'avoir clické sur "Selectionner". On teste aussi si la variable $_POST['select_sondage'] n'est pas vide
    $ctrl->afficherResultatQ($_GET['id']);
}
else
{
    header("Location:/ecostat/vue/sondage");
}
?>
