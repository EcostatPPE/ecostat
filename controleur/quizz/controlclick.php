<?php require_once $_SERVER['DOCUMENT_ROOT'].'Ecostat/controleur/quizz/control.php';


session_start();
//session_unset();
$ctrl = new Quizz2();
if (isset($_POST['selectionner'])) /*&& $_POST['selectionner']=='Selectionner')*/ {
    // on teste si le visiteur a bien choisi une réponse avant d'avoir clické sur "Selectionner". On teste aussi si la variable $_POST['select_sondage'] n'est pas vide
    $idsond = $_POST['id'];
    $ctrl->afficherQuizz($idsond);
}
elseif(isset($_POST['reponse']))
{
    $ctrl->ajouterReponse($_POST['reponse'],$_POST['idQuestion'],$_POST['idSond']);
}
elseif(isset($_GET['final']) && $_GET['final'] == 1 && isset($_GET['quizz']))
{
    $ctrl->afficherResultat($_GET['quizz']);

}else{
    $ctrl->afficherAccueil();
}
?>
