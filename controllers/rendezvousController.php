<?php
include 'models/dataBase.php';
include 'models/appointments.php';
include 'models/patients.php';

$patients = new Patients();
$patientsList = $patients->getPatientsList();
$appointments = new Appointments();
if (isset($_GET['appointmentId'])) {
    $appointments->id = $_GET['appointmentId'];
}
$regDate = '/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/';
$regHour = '/^(?:2[0-3]|[01]\d|\d):[0-5]\d$/';
$formError = array();





if (isset($_POST['submit'])) {

    if (!empty($_POST['date'])) {
        $appointments->date = ($_POST['date']);
    } if (!preg_match($regDate, $_POST['date'])) {
        $formError['date'] = 'La date n\'est pas correcte';
    }

    if (!empty($_POST['hour'])) {
        $appointments->hour = ($_POST['hour']);
    } if (!preg_match($regHour, $_POST['hour'])) {
        $formError['hour'] = 'L\'heure n\'est pas correcte';
    }

    if (!empty($_POST['idPatients'])) {
        $appointments->idPatients = ($_POST['idPatients']);
    } else {
        $formError['idPatients'] = 'Veuillez sélectionner un patient.';
    }

    if (!isset($formError['date']) && !isset($formError['hour'])) {
        $appointments->dateHour = $date = htmlspecialchars($_POST['date']) . ' ' . $hour = htmlspecialchars($_POST['hour']);
    }
    //On vérifie qu'il n'y a pas eu d'erreur
    if (count($formError) == 0) {
        if (!$appointments->updateAppointments()) {
            $formError['submit'] = 'Erreur lors de l\'ajout';
        } else {
            $updateSuccess = true;
            $appointments->idPatients = '';
            $appointments->dateHour = '';
        }
    }
}
$appointmentInfo = $appointments->getAppointmentById();
?>