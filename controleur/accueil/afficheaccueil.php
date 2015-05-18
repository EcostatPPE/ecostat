<?php

class Accueil {

	public function afficher() {
		$titre = 'ECOSTAT • Accueil';
		require $_SERVER['DOCUMENT_ROOT'].'Ecostat/Vue/vue_accueil.php';
		require $_SERVER['DOCUMENT_ROOT'].'Ecostat/Vue/gabarit.php';
	}
}
