<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Ecostat/modele/contact.php';

class ControlContact {

    private $contact;

    public function __construct() {
        $this->contact = new Contact();
    }

    public function afficheAccueil() {
        $titre = "Ecostat • Contact";
        require_once $_SERVER['DOCUMENT_ROOT'].'Ecostat/vue/contact/vue_contact.php';
        require_once $_SERVER['DOCUMENT_ROOT'].'Ecostat/vue/gabarit.php';
    }
}
