<?php

//require_once $_SERVER['DOCUMENT_ROOT'].'ecostat/modele/enquete.php';

class ControlEnquete {

    private $enquete;

    public function __construct() {
        //$this->enquete = new Enquete();
    }

    public function afficheAccueil() {
        $titre = 'Ecostat • Enquête';
        require_once $_SERVER['DOCUMENT_ROOT'] . 'ecostat/vue/enquete/vue_enquete.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . 'ecostat/vue/gabarit.php';
    }

}
