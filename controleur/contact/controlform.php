<?php

class ControlContactForm {

    private $contact;

    public function envoi($mail, $objet, $message) {
        mail($mail, $objet, $message);
    }

}
