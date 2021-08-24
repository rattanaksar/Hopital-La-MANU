<?php

class Appointments {

    public $id = 0;
    public $dateHour = '';
    public $idPatients = 0;
    private $pdo = null;

    public function __construct() {
        $this->pdo = DataBase::getPdo();

    }

    public function addAppointments() {
        $query = 'INSERT INTO `appointments` (`dateHour`, `idPatients`) VALUES (:dateHour, :idPatients)';
        $appointmentsResult = $this->pdo->prepare($query);
        $appointmentsResult->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $appointmentsResult->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        return $appointmentsResult->execute();
    }

    public function getAppointmentsList() {
        $appointmentsResult = array();
        $query = 'SELECT `appointments`.`id`, DATE_FORMAT(`dateHour`, "%d/%m/%Y") AS `date`, DATE_FORMAT(`dateHour`, "%H:%i") AS `hour`, `idPatients`, `lastname`,`firstname` FROM `appointments`LEFT JOIN `patients` ON `idPatients`= `patients`.`id`';
        $appointmentsResult = $this->pdo->query($query);
        if (is_object($appointmentsResult)) {
            $appointmentsList = $appointmentsResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $appointmentsList;
    }
    public function checkAppointmentExistByIdPatients(){
        $checkAppointmentExistByIdPatientsQuery = $this->pdo->prepare(
            'SELECT COUNT(`id`) AS `isAppointmentExist`
            FROM `appointments`
            WHERE `idPatients` = :idPatients'
        ); 
        $checkAppointmentExistByIdPatientsQuery->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        $checkAppointmentExistByIdPatientsQuery->execute();
        //stocker l'objet dans la variable data
        $data = $checkAppointmentExistByIdPatientsQuery->fetch(PDO::FETCH_OBJ);
        //retourner l'attribut isAppointmentExist de type booléen (COUNT renvoie 0 ou 1 qui peut etre interpreté comme un booléen) 
        return $data->isAppointmentExist;
    }
    public function getAppointmentById() {
        $query = 'SELECT DATE_FORMAT(`dateHour`, "%Y-%m-%d") AS `date`, DATE_FORMAT(`dateHour`, "%H:%i") AS `hour`, `idPatients` FROM `appointments` WHERE `id` = :id';
        $appointmentResult = $this->pdo->prepare($query);
        $appointmentResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $appointmentResult->execute();
        return $appointmentResult->fetch(PDO::FETCH_OBJ);
    }

    public function updateAppointments() {
        $query = 'UPDATE `appointments` SET `dateHour` = :dateHour, `idPatients` = :idPatients WHERE id = :id';
        $appointmentsResult = $this->pdo->prepare($query);
        $appointmentsResult->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);

        $appointmentsResult->bindValue(':idPatients', $this->idPatients, PDO::PARAM_STR);
        $appointmentsResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        //Si l'insertion s'est correctement déroulée, on retourne vrai
        return $appointmentsResult->execute();
    }
      
    public function listAppointmentsByIdPatient() {
        $listAppointments = array();
        $query = 'SELECT `id`, DATE_FORMAT(`dateHour`, "%d/%m/%Y") AS `date`,DATE_FORMAT(`dateHour`, "%H:%i") AS `hour` FROM `appointments` WHERE `idPatients` = :idPatients;';
        $listAppointmentsById = $this->pdo->prepare($query);
        $listAppointmentsById->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        $listAppointmentsById->execute();
        if (is_object($listAppointmentsById)) {
            $listAppointments = $listAppointmentsById->fetchAll(PDO::FETCH_OBJ);
        }
        return $listAppointments;
    }
    
    public function deleteAppointmentById() {
        $query = 'DELETE FROM `appointments` WHERE `id` = :id';
        $deleteResult = $this->pdo->prepare($query);
        $deleteResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $deleteResult->execute();
    }
    public function deleteAppointmentByPatientId() {
        $query = 'DELETE FROM `appointments` WHERE `idPatients` = :idPatients';
        $deleteResult = $this->pdo->prepare($query);
        $deleteResult->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        return $deleteResult->execute();
    }
    public function __destruct() {
        
    }

}

?>