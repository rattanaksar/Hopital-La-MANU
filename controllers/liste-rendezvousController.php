<?php
include 'models/dataBase.php';
include 'models/appointments.php';

$success = false;
if (isset($_GET['del'])) {
    $deleteAppointment = new appointments();
    $deleteAppointment->id = $_GET['del'];
    if ($deleteAppointment->deleteAppointmentById()){
        $success = true;
    }
        
}
$appointments = new appointments();
$appointmentsList = $appointments->getAppointmentsList();
