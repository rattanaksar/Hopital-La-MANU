<?php


class DataBase {
    //L'attribut $pdo sera disponible dans ses enfants
    public $pdo = null;
    private static $instance = null;


   
    public function __construct() {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=hospitalE2N;charset=utf8', 'root', 'root');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $Exception) {
            die('Erreur : ' . $Exception->getMessage());
        }
    }

    public static function getPdo()
    {
        if(is_null(self::$instance)){
            self::$instance = new DataBase();
        }
        return self::$instance->pdo;
    }

    public function __destruct() {

        $this->pdo = null;
        
    }

}

?>