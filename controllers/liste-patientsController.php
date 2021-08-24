<?php
include 'models/dataBase.php';
include 'models/patients.php';
include 'models/appointments.php';


$patients = new patients();
$appointments = new Appointments();
// Controlleur suppression patient
if (isset($_GET['del'])) {
    $appointments->idPatients = $_GET['del'];
    $patients->id = $_GET['del'];
    if ($patients->checkPatientExist()) {
        try {
            $patients->beginTransaction();
            $appointments->deleteAppointmentByPatientId();
            $patients->deletePatientById();
            $patients->commit();
            }catch (PDOException $e){
                $patients->rollBack();
            }
        }
}
// Controlleur recherche patient
if (isset($_GET['search'])) {

    $q = htmlspecialchars($_GET['search']); 
    $search = $Patients -> search('%'.$q.'%');

}
$patientsList = $patients->getPatientsList();

$perPage = 2;
if (isset($_GET['page']) && !empty($_GET['page'])) {
    $currentPage = (int) htmlspecialchars($_GET['page']);
} else {
    $currentPage = 1;
}
$getCount = $patients -> getCount();
$nbPatients = $getCount['nbPatients'];
$nbPage = ceil($nbPatients/$perPage);

$startValue = (int)($currentPage*$perPage);

$patientPerPage = $patients -> pagination($startValue, $perPage);
