<?php
require_once $_SERVER['DOCUMENT_ROOT'].'Ecostat/modele/conn_db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'Ecostat/modele/sondage.php';


class Sondage2 {

	private $sond;


	public function __construct() {
		$this->sond = new Sondage();
	}

	public function afficherSondage($idsond) {
// AFFICHAGE DU SONDAGE
// Récup du nom du sondage selectionne
		$req = $this->sond->getSondId($idsond);
// Récup des questions possibles du sondage selectionné
		$rec = $this->sond->getSondTheme($idsond);
// Récup des réponses posibles du sondage selectionné
		$req1 = $this->sond->getSondRep($idsond); // REQUETE A MODIFIER
		ob_start();
		echo $req['libelleSondage'];
		$champ = ob_get_clean();



				ob_start();
				while($datareq = $rec -> fetch_array())
				{
					echo '<br />'.$datareq['codeQ_sondage'].': '.$datareq['libelleQuestion'];

					while ($data1 = $req1 -> fetch_array())
					{


						echo '<br />'.$data1['libelle'];'<br />';
						echo '<input name="reponse" type="radio" value="'.$data1['id_reponse'].'" />';

					}

				}
				echo '<input type="hidden" name="envoi_sond" value="'.$idsond.'">';
				$list = ob_get_clean();
				$titre = 'ECOSTAT • Sondage';
				require_once $_SERVER['DOCUMENT_ROOT'].'Ecostat/Vue/sondage/vue_sondage.php';
				require_once $_SERVER['DOCUMENT_ROOT'].'Ecostat/Vue/gabarit.php';


	}
	public function afficherAccueil() {
		ob_start();
// contenu du menu déroulant clé étrangère
			$jeuenr = $this->sond->getSondages();
			while($ligne = $jeuenr -> fetch_assoc())
			{
				$num=$ligne['idSondage'];
				$nom=$ligne['libelleSondage'];
				echo "<option selected value='$num'>$nom</option>";
			}
		$listsondage = ob_get_clean();
		$titre = 'ECOSTAT • Sondage';
		require $_SERVER['DOCUMENT_ROOT'].'Ecostat/Vue/sondage/vue_sondage.php';
		require $_SERVER['DOCUMENT_ROOT'].'Ecostat/Vue/gabarit.php';
	}
}
		?>
