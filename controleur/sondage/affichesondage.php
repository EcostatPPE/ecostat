<?php

require_once $_SERVER['DOCUMENT_ROOT'] . 'Ecostat/modele/conn_db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . 'Ecostat/modele/sondage.php';

class Sondage2 {

    private $sond;

    public function __construct() {
        $this->sond = new Sondage();
    }

    public function afficherSondage($idsond) {
        // AFFICHAGE DU THEME DU SONDAGE SELECTIONNE
        $theme = $this->sond->getSondages();
        $sondage = $this->sond->getSondId($idsond);
        // Récup du nom du sondage selectionne
        // Récup des questions possibles du sondage selectionné
        $questionsond = $this->sond->getSondTheme($sondage['idSondage']);
        $questiond = $questionsond->fetch_array();
        $tabrep = array();
        // Récup des réponses possibles des questions
        foreach ($questionsond as $question) {
            $reponse = $this->sond->getSondRep($question['codeQ_sondage']); // REQUETE A MODIFIER
            array_push($tabrep, $reponse);
        }
        $titre = 'ECOSTAT • Sondage';
        require_once $_SERVER['DOCUMENT_ROOT'] . 'Ecostat/Vue/sondage/vue_sondage.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . 'Ecostat/Vue/gabarit.php';
    }

    public function afficherAccueil() {

        $theme = $this->sond->getSondages();
        $titre = 'ECOSTAT • Sondage';
        require_once $_SERVER['DOCUMENT_ROOT'] . 'Ecostat/Vue/sondage/vue_sondage.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . 'Ecostat/Vue/gabarit.php';
    }

    public function ajouterReponse($reponse, $idquestion, $idsondage) {
        $this->sond->addReponse($reponse);
        header("Location:/ecostat/vue/sondage/");
    }

}

?>
