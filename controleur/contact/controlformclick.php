<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Ecostat/controleur/contact/controlform.php';

$ctrl = new ControlContactForm();
$ctrl->envoi("ecostat@yopmail.fr",$_POST['objet'],$_POST['message'] );

