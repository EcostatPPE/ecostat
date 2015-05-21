<?php

require_once $_SERVER['DOCUMENT_ROOT'] . 'Ecostat/modele/conn_db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . 'Ecostat/modele/quizz.php';

class Quizz2 {

    private $quizz;

    public function __construct() {
        $this->quizz = new Quizz();
    }

    public function afficherQuizz($idQuizz) {
        // AFFICHAGE DU THEME DU SONDAGE SELECTIONNE
        $theme = $this->quizz->getQuizzs();
        $sondage = $this->quizz->getQuizzId($idQuizz);
        // Récup du nom du sondage selectionne
        // Récup des questions possibles du sondage selectionné
        $questionquizz = $this->quizz->getQuizzTheme($sondage['codeQuizz']);
        $questiond = $questionquizz->fetch_array();
        $tabrep = array();
        // Récup des réponses possibles des questions
        foreach ($questionquizz as $question) {
            $reponse = $this->quizz->getQuizzRep($question['codeQ_quizz']);
            array_push($tabrep, $reponse);
        }
        $titre = 'ECOSTAT • Quizz';
        require_once $_SERVER['DOCUMENT_ROOT'] . 'Ecostat/Vue/quizz/vue_quizz.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . 'Ecostat/Vue/gabarit.php';
    }

    public function afficherAccueil() {

        $theme = $this->quizz->getQuizzs();
        $titre = 'ECOSTAT • Quizz';
        require_once $_SERVER['DOCUMENT_ROOT'] . 'Ecostat/Vue/quizz/vue_quizz.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . 'Ecostat/Vue/gabarit.php';
    }

    public function ajouterReponse($reponse, $idquestion, $idsondage) {
        $c = 0;
        foreach ($reponse as $chbk) {
            $question = $this->quizz->getCodeQRep($chbk);
            foreach ($question as $questions) {
                $vraiRep = $this->quizz->getTrueRep($chbk, $questions['codeQ_quizz']);
                foreach ($vraiRep as $truerep) {
                    if ($chbk == $truerep['libelleReponse']) {
                        if (!(isset($_SESSION['reponse']))) {
                            $_SESSION['reponse'] = "Vous avez bien répondu à la question " . $questions['codeQ_quizz'] . "<br>";
                        } else {
                            $_SESSION['reponse'] = $_SESSION['reponse'] . "Vous avez bien répondu à la question " . $questions['codeQ_quizz'] . "<br>";
                        }
                    }
                }
            }
            $c = $c + 1;
        }
        header("Location:/Ecostat/vue/quizz/?final=1&quizz=" . $idquestion);
    }

    public function afficherResultat($idQuestion) {
        $titre = 'Ecostat • Quizz';
        require_once $_SERVER['DOCUMENT_ROOT'] . 'Ecostat/vue/quizz/vue_quizz.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . 'Ecostat/vue/gabarit.php';
        session_unset();
    }

}

?>
