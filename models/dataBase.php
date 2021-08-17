<?php

class DataBase {
    //L'attribut $pdo sera disponible dans ses enfants
    public $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=hospitalE2N;charset=utf8', 'root', 'root');

        } catch (PDOException $Exception) {
            die('Erreur : ' . $$Exception->getMessage());
        }
    }

    public function __destruct() {
        
    }

}

?>