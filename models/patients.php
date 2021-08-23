<?php

class Patients {

    public $id = 0;
    public $lastname = '';
    public $firstname = '';
    public $birthdate = '01/01/1900';
    public $phone = '';
    public $mail = '';
    private $pdo = null;

    public function __construct() {
        $this->pdo = DataBase::getPdo();
    }

    public function checkPatientExist(){
        $query = 'SELECT COUNT(*) AS `isExist` FROM `patients` WHERE `id` = :id';
        $checkPatientExistRequest = $this->pdo->prepare($query);
        $checkPatientExistRequest->bindValue(':id', $this->id, PDO::PARAM_INT);
        $checkPatientExistRequest->execute();
        $result = $checkPatientExistRequest->fetch(PDO::FETCH_OBJ);// result = objet
        return $result->isExist; 
    }

    public function addPatient() {
        //On prépare la requête sql qui insert dans les champs selectionnés, les valeurs sont des marqueurs nominatifs
        $query = 'INSERT INTO `patients`(`lastname`, `firstname`, `birthdate`, `phone`, `mail`) VALUES(:lastname, :firstname, :birthdate, :phone, :mail)';
        $responseRequest = $this->pdo->prepare($query);
        $responseRequest->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $responseRequest->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $responseRequest->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $responseRequest->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $responseRequest->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        //Si l'insertion s'est correctement déroulée on retourne vrai
        $responseRequest->execute();
        return $this->pdo->lastInsertId();
    }

    public function getPatientsList() {
        $patientsList = array();
        $query = ('SELECT `id`, `lastname`, `firstname` FROM `patients`');
        $patientsResult = $this->pdo->query($query);
        if (is_object($patientsResult)) {
            $patientsList = $patientsResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $patientsList;
    }

    public function getPatientById() {
        $isCorrect = false;
        $query = 'SELECT `id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail` FROM `patients` WHERE `id` = :id';
        $patientResult = $this->pdo->prepare($query);
        $patientResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($patientResult->execute()) {
            $patientInfo = $patientResult->fetch(PDO::FETCH_OBJ);
            if (is_object($patientInfo)) {
                $this->lastname = $patientInfo->lastname;
                $this->firstname = $patientInfo->firstname;
                $this->birthdate = $patientInfo->birthdate;
                $this->phone = $patientInfo->phone;
                $this->mail = $patientInfo->mail;
                $isCorrect = true;
            }
        }
        return $isCorrect;
    }

    public function updatePatient() {
        $query = 'UPDATE patients SET lastname=:lastname, firstname=:firstname, birthdate=:birthdate, phone=:phone, mail=:mail WHERE id = :id';
        $patientResult = $this->pdo->prepare($query);
        $patientResult->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $patientResult->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $patientResult->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $patientResult->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $patientResult->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $patientResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $patientResult->execute();
    }

    public function deletePatientById() {
            $queryPatient = 'DELETE FROM `patients` WHERE `id` = :id';
            $deletePatientResult = $this->pdo->prepare($queryPatient);
            $deletePatientResult->bindValue(':id', $this->id, PDO::PARAM_INT);
            $deletePatientResult->execute();
            return !$this->checkPatientExist();// Le point d'exclamation devant $this renvoie un false
    }

     public function searchPatients($search){
        $searchPatientResult = array();
        $query = 'SELECT `id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail` FROM `patients` WHERE `lastname` LIKE :search OR `firstname` LIKE :search';
        $searchPatient = $this->pdo->prepare($query);
        $searchPatient->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
        if ($searchPatient->execute()){
            $searchPatientResult = $searchPatient->fetchAll(PDO::FETCH_OBJ);
        }
        return $searchPatientResult;
    }
    public function getCount() {
        $query = 'SELECT COUNT(`id`) as nbPatients FROM  `patients`;';
        $count = $this->pdo->prepare($query);
        $count -> execute();
        
        $resultQuery = $count -> fetch(PDO::FETCH_ASSOC);
        if (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }
    public function pagination($startValue, $perPage) {
        $query = 'SELECT * FROM `patients` LIMIT :perPage OFFSET :startValue;';
        $pagination = $this->pdo-> prepare($query);

        $pagination -> bindvalue('startValue', $startValue, PDO::PARAM_INT);
        $pagination -> bindvalue('perPage', $perPage, PDO::PARAM_INT);
        

        $pagination -> execute();
        $resultQuery = $pagination -> fetchAll(PDO::FETCH_OBJ);
        if (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }

    public function __destruct() {
        
    }
}
