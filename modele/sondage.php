<?php
class Sondage extends Bdd{

	public function getSondId($idsond) {
		$req = $this->connexionbdd()->query('SELECT * FROM sondage WHERE idSondage="'.$idsond.'"') or die($mysqli -> error);
		$req = $req->fetch_array();
		return $req;
	}
	public function getSondTheme($idsond) {
		$rec = $this->connexionbdd()->query('SELECT * FROM q_sondage WHERE codeSondage="'.$idsond.'"');
		return $rec;
	}
	public function getSondRep($idsond) {
		$req1 = $this->connexionbdd()->query('SELECT * FROM tb_sondage WHERE codeQ_Sondage="'.$idsond.'"') or die($mysqli -> error);
		return $req1;
	}
	public function getSondages(){
		$rec = $this->connexionbdd()->query('SELECT * FROM sondage');
		return $rec;
	}
	public function getSonds() {
		$rec = $this->connexionbdd()->query('SELECT * FROM q_sondage');
		return $rec;
	}
}

?>
