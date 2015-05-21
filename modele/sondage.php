<?php

class Sondage extends Bdd {

    public function getSondId($idsond) {
        $req = $this->connexionbdd()->query('SELECT * FROM sondage WHERE libelleSondage="' . $idsond . '"') or die($mysqli->error);
        $req = $req->fetch_array();
        return $req;
    }
    public function getSondage($id) {
        return $this->connexionbdd()->query("SELECT * FROM sondage WHERE idSondage$id")->fetch_array();
    }
    public function getSondTheme($idsond) {
        $rec = $this->connexionbdd()->query('SELECT * FROM q_sondage WHERE codeSondage="' . $idsond . '"');
        return $rec;
    }

    public function getSondRep($idsond) {
        $req1 = $this->connexionbdd()->query("SELECT * FROM tb_sondage INNER JOIN q_sondage ON q_sondage.codeQ_sondage = tb_sondage.codeQ_sondage WHERE q_sondage.codeQ_sondage = $idsond");
        return $req1;
    }

    public function getSondages() {
        $rec = $this->connexionbdd()->query('SELECT * FROM sondage');
        return $rec;
    }

    public function getSonds() {
        $rec = $this->connexionbdd()->query('SELECT * FROM q_sondage');
        return $rec;
    }

    public function getQuestionsRep($idQuestion) {
        return $this->connexionbdd()->query("SELECT * FROM tb_sondage WHERE codeQ_sondage=$idQuestion");
    }

    public function getQuestion($idQuestion) {
        return $this->connexionbdd()->query("SELECT * FROM q_sondage WHERE codeQ_sondage=$idQuestion")->fetch_array();
    }

    public function getSondageReponse($libelle, $codeQ) {
        return $this->connexionbdd()->query("SELECT * FROM tb_sondage WHERE libelle='$libelle' AND codeQ_sondage=$codeQ")->fetch_array();
    }

    public function addReponse($idreponse) {
        $EnvoiReponse = $this->connexionbdd()->query("UPDATE tb_sondage SET compteur = compteur + 1 WHERE id_reponse = $idreponse");
    }
    public function getIp($ip,$codeSondage,$codeQuestion){
        return $this->connexionbdd()->query("SELECT * FROM ip_sond WHERE ip='$ip' AND codeQ_sondage=$codeQuestion AND idSondage=$codeSondage")->fetch_array();
    }
    public function addIp($ip,$codeSondage,$codeQuestion) {
        $this->connexionbdd()->query("INSERT INTO ip_sond VALUES ('$ip',$codeQuestion,$codeSondage)");
    }

}

?>
