<?php
include 'models/dataBase.php';
include 'models/appointments.php';
include 'models/patients.php';

$patients = new Patients();
$appointments = new Appointments();
$insertSuccess = false;
$patientsList = $patients->getPatientsList();

$formError = array();

if (isset($_POST['date']) && isset($_POST['hour'])) {
    $appointments->dateHour = htmlspecialchars($_POST['date']) . ' ' . htmlspecialchars($_POST['hour']);
}
if (isset($_POST['idPatients'])) {
    $appointments->idPatients = htmlspecialchars($_POST['idPatients']);
}
if (isset($_POST['submit']) && count($formError) == 0) {
    if (! $appointments->addAppointments()) {
        $formError['add'] = 'Erreur lors de l\'ajout';
    } else {
        $insertSuccess = true;
    }
}
?>