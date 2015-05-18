<?php
class Sondage extends Bdd{

	public function getSondId($idsond) {
		$req = $this->connexionbdd()->query('SELECT * FROM sondage WHERE libelleSondage="'.$idsond.'"') or die($mysqli -> error);
		$req = $req->fetch_array();
		return $req;
	}
	public function getSondTheme($idsond) {
		$rec = $this->connexionbdd()->query('SELECT * FROM q_sondage WHERE codeSondage="'.$idsond.'"');
		return $rec;
	}
	public function getSondRep($idsond) {
		$req1 = $this->connexionbdd()->query("SELECT * FROM tb_sondage INNER JOIN q_sondage ON q_sondage.codeQ_sondage = tb_sondage.codeQ_sondage WHERE q_sondage.codeQ_sondage = $idsond");
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
