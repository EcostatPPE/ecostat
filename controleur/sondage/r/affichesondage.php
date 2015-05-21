<?php
require_once $_SERVER['DOCUMENT_ROOT'].'Ecostat/modele/conn_db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'Ecostat/modele/sondage.php';


class Sondage2 {

	private $sond;


	public function __construct() {
		$this->sond = new Sondage();
	}

	public function afficherResultatQ($idQuestion)
    {
        $reponses = $this->sond->getQuestionsRep($idQuestion);
        $question = $this->sond->getQuestion($idQuestion);
        $titre = 'ECOSTAT • '.$question['libelleQuestion'];
        require_once $_SERVER['DOCUMENT_ROOT'].'Ecostat/Vue/sondage/r/vue_sondage.php';
        require_once $_SERVER['DOCUMENT_ROOT'].'Ecostat/Vue/gabarit.php';
    }
}
		?>
