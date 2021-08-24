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
$formError = array();

if (isset($_POST['submit'])) {

    if (!empty($_POST['date'])) {
        $appointments->date = ($_POST['date']);
    } 

    if (!empty($_POST['hour'])) {
        $appointments->hour = ($_POST['hour']);
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
        }
    }
}
$appointmentInfo = $appointments->getAppointmentById();
