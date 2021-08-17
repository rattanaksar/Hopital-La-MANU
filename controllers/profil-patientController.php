<?php
include 'models/dataBase.php';
include 'models/patients.php';
include 'models/appointments.php';

$errors = array();
$patient = new Patients();
if (isset($_GET['patientId'])) {
    $patient->id = $_GET['patientId'];
}

$isFind = $patient->getPatientById();

if (count($_POST) > 0) {

    if (!empty($_POST['lastname'])) {
        $patient->lastname = $_POST['lastname'];
    } else {
        $errors['lastname'] = 'Veuillez renseigner votre nom';
    }

    if (!empty($_POST['firstname'])) {
        $patient->firstname = $_POST['firstname'];
    } else {
        $errors['firstname'] = 'Veuillez renseigner votre prénom';
    }

    if (!empty($_POST['birthdate'])) {
        $patient->birthdate = $_POST['birthdate'];
    } else {
        $errors['birthdate'] = 'Veuillez renseigner votre date de naissance';
    }

    if (!empty($_POST['phone'])) {
        $patient->phone = $_POST['phone'];
    } else {
        $errors['phone'] = 'Veuillez renseigner votre numéro de téléphone';
    }

    if (!empty($_POST['mail'])) {
        $patient->mail = $_POST['mail'];
    } else {
        $errors['mail'] = 'Veuillez renseigner votre adresse e-mail';
    }

    if (count($errors) == 0) {
        $patient->updatePatient();
    }
}
//si l'id existe on le récupère pour afficher les infos du patient
if (isset($_GET['patientId'])) {
    $patients = new Patients();
    $patients->id = $_GET['patientId'];
    //affichage de la liste des rendez-vous du patient sélectionné
    $listAppointmentsPatient = new Appointments();
    $listAppointmentsPatient->idPatients = $patients->id;
    $listInfoAppointments = $listAppointmentsPatient->listAppointmentsByIdPatient();
}
?>