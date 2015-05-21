<?php
require_once $_SERVER['DOCUMENT_ROOT'].'Ecostat/modele/conn_db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'Ecostat/modele/quizz.php';


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
        foreach($questionquizz as $question){
            $reponse = $this->quizz->getQuizzRep($question['codeQ_quizz']);
            array_push($tabrep, $reponse);
        }
        $titre = 'ECOSTAT • Quizz';
        require_once $_SERVER['DOCUMENT_ROOT'].'Ecostat/Vue/quizz/vue_quizz.php';
        require_once $_SERVER['DOCUMENT_ROOT'].'Ecostat/Vue/gabarit.php';


    }
    public function afficherAccueil() {

        $theme = $this->quizz->getQuizzs();
        $titre = 'ECOSTAT • Quizz';
        require_once $_SERVER['DOCUMENT_ROOT'].'Ecostat/Vue/quizz/vue_quizz.php';
        require_once $_SERVER['DOCUMENT_ROOT'].'Ecostat/Vue/gabarit.php';
    }
    public function ajouterReponse($reponse,$idquestion,$idsondage)
    {
        $vraiRep = $this->quizz->getTrueRep($reponse,$idquestion);
        $question = $this->quizz->getQuestion($idquestion);
        echo $vraiRep['libelleReponse'];
        if($reponse == $vraiRep['libelleReponse']){
            $_SESSION['reponse'] = 'Vous avez bien à toutes les questions';
        }
        else
        {
            $_SESSION['reponse'] = 'Vous vous êtes trompé à la question '.$question['libelleQuestion'];
        }
        header("Location:/Ecostat/vue/quizz/?final=1&quizz=".$idquestion);
    }
    public function afficherResultat($idQuestion){
        $titre = 'Ecostat • Quizz';
        require_once $_SERVER['DOCUMENT_ROOT'].'Ecostat/vue/quizz/vue_quizz.php';
        require_once $_SERVER['DOCUMENT_ROOT'].'Ecostat/vue/gabarit.php';
        session_unset();
    }

}
?>
