<?php

require "models/Database.php";
require "models/appointments.php";
require "models/patients.php";

$patients = new Patients();
$appointments = new Appointments();
$regName = '#^[A-Z]{1}[a-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ]+[-\']?[a-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ]+$#';
$regBirthDate = '/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/';
$regPhone = '#^0[1-9]((-[0-9]{2}){4}|(([0-9]{2})){4}|(\/[0-9]{2}){4}|(\\[0-9]{2}){4}|(_[0-9]{2}){4}|(\s[0-9]{2}){4})$#';
$regMail = '#[A-Z-a-z-0-9-.éàèîÏôöùüûêëç]{2,}@[A-Z-a-z-0-9éèàêâùïüëç]{2,}[.][a-z]{2,6}$#';
$insertSuccess = true;
$formError = [];

//début contrôle infomations saisies du patient
if (isset($_POST['submit'])) {
    if (isset($_POST['lastname'])) {
        $patients->lastname = htmlspecialchars($_POST['lastname']);
        if (!preg_match($regName, $patients->lastname)) {
            $formError['lastname'] = 'Le nom n\'est pas correct';
            $patients->lastname = '';
        }
    }
    if (isset($_POST['firstname'])) {
        $patients->firstname = htmlspecialchars($_POST['firstname']);
        if (!preg_match($regName, $patients->firstname)) {
            $formError['firstname'] = 'Le prenom n\'est pas correct';
            $patients->firstname = '';
        }
    }
    if (isset($_POST['birthdate'])) {
        $patients->birthdate = htmlspecialchars($_POST['birthdate']);
        if (!preg_match($regBirthDate, $patients->birthdate)) {
            $formError['birthdate'] = 'La date de naissance n\'est pas correcte';
            $patients->birthdate = '';
        }
    }
    if (isset($_POST['phone'])) {
        $patients->phone = htmlspecialchars($_POST['phone']);
        if (!preg_match($regPhone, $patients->phone)) {
            $formError['phone'] = 'Le numéro de tel n\'est pas correct';
            $patients->phone = '';
        }
    }
    if (isset($_POST['mail'])) {
        $patients->mail = htmlspecialchars($_POST['mail']);
        if (!preg_match($regMail, $patients->mail)) {
            $formError['mail'] = 'L\'adresse mail n\'est pas correcte';
            $patients->mail = '';
        }
    }
    //fin contrôle informations saisies du patient

    //début contrôle informations saisies pour le rendez vous
    if (isset($_POST['date']) && isset($_POST['hour'])) {
        $appointments->dateHour = htmlspecialchars($_POST['date']) . ' ' . htmlspecialchars($_POST['hour']);
    }
    if (isset($_POST['idPatients'])) {
        $appointments->idPatients = htmlspecialchars($_POST['idPatients']);
    }
    if (empty($formError)){
        $arrayParameter = [];

        $arrayParameter['lastname'] = htmlspecialchars($_POST['lastname']);
        $arrayParameter['firstname'] = htmlspecialchars($_POST['firstname']);
        $arrayParameter['birthdate'] = htmlspecialchars($_POST['birthdate']);
        $arrayParameter['phone'] = htmlspecialchars($_POST['phone']);
        $arrayParameter['mail'] = htmlspecialchars($_POST['mail']);

        $newPatient = $patients->addPatient($arrayParameter);
        $getId = $patients->getPdo()->lastInsertId();
        
        $arrayParameter['dateHour'] = htmlspecialchars($_POST['date'] . " " . $_POST['hour']);
        $arrayParameter['idPatients'] = $getId;

        $newAppointment = $appointments->addAppointments($arrayParameter);

        $_POST = [];

    } else {
    $insertSuccess = false;
}
}
