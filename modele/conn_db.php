<?php

class Bdd {

    private $mysqli;

    public function connexionbdd() {

        $host = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'ecostat';

        $this->mysqli = new mysqli($host, $user, $password, $database);

        if (!$this->mysqli) {
            echo "Erreur dans la connexion à la base de données.";
        }

        $this->mysqli->select_db($database);
        return $this->mysqli;
    }

}

?>
