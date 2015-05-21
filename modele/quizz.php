<?php
class Quizz extends Bdd{

    public function getQuizzId($idQuizz) {
        $req = $this->connexionbdd()->query('SELECT * FROM quizz WHERE libelleQuizz="'.$idQuizz.'"') or die($this->connexionbdd()->error);
        $req = $req->fetch_array();
        return $req;
    }
    public function getQuizzTheme($idQuizz) {
        $rec = $this->connexionbdd()->query('SELECT * FROM q_quizz WHERE codeQuizz="'.$idQuizz.'"');
        return $rec;
    }
    public function getQuizzRep($idQuizz) {
        $req1 = $this->connexionbdd()->query("SELECT * FROM tb_quizz INNER JOIN q_quizz ON q_quizz.codeQ_quizz = tb_quizz.codeQ_quizz WHERE q_quizz.codeQ_quizz = $idQuizz");
        return $req1;
    }
    public function getQuizzs(){
        $rec = $this->connexionbdd()->query('SELECT * FROM quizz');
        return $rec;
    }
    public function getQuizzsQ() {
        $rec = $this->connexionbdd()->query('SELECT * FROM q_quizz');
        return $rec;
    }
    public function getQuestionsRep($idQuestion) {
        return $this->connexionbdd()->query("SELECT * FROM tb_quizz WHERE codeQ_quizz=$idQuestion");
    }
    public function getQuestion($idQuestion) {
        return $this->connexionbdd()->query("SELECT * FROM q_quizz WHERE codeQ_quizz=$idQuestion");
    }
    public function getQuizzReponse($libelle,$codeQ)
    {
        return $this->connexionbdd()->query("SELECT * FROM tb_quizz WHERE libelle='$libelle' AND codeQ_quizz=$codeQ")->fetch_array();
    }
    public function getTrueRep($libelle,$codeQ)
    {
        $req = $this->connexionbdd()->query("SELECT * FROM tb_rep_quizz WHERE libelleReponse='$libelle' AND codeQ_quizz=$codeQ");
        if($req->num_rows > 0){
            return $req;
        }
        else
        {
            return 1;
        }
    }
    public function getCodeQRep($libelle)
    {
        return $this->connexionbdd()->query("SELECT * FROM tb_rep_quizz WHERE libelleReponse='$libelle'");
    }
}

?>
