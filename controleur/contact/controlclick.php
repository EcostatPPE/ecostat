<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Ecostat/controleur/contact/control.php';

$ctrl = new ControlContact();
if (isset($_POST['envoi'])) {
    $ctrl->envoieMessage($_POST['texte'], $_POST['objet']);
} else {
    $ctrl->afficheAccueil();
}
