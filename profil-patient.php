<?php
include 'controllers/profil-patientController.php';
include 'header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="divProfil">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="imgUser">
                            <img class="fa fa-user-circle fa-5x"></i>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                        <div class="infoUser">
                            <?php if ($isFind) {
                                ?> 
                                <h1>Informations du patient</h1>
                                <?php foreach ($errors as $error) { ?>
                                    <p><?= $error ?><br></p>
                                <?php } ?>
                                <form action="profil-patient.php?patientId=<?= $_GET['patientId']->id ?>" method="post">
                                    <div><h2>Nom : </h2>
                                    <input type="text" name="lastname" value="<?= $patient->lastname ?>" />
                                    <h2>Prénom : </h2>
                                    <input type="text" name="firstname" value="<?= $patient->firstname ?>" /></div>
                                    <div><h2>Date de naissance : </h2>
                                    <input type="date" name="birthdate" value="<?= $patient->birthdate ?>" />
                                    <h2>Numéro de téléphone : </h2>
                                    <input type="text" name="phone" value="<?= $patient->phone ?>" /></div>
                                    <div><h2>Adresse e-mail : </h2>
                                    <input type="email" name="mail" value="<?= $patient->mail ?>" /></div>
                                    <br>
                                    <input type="submit" name="submit" class="btn btn-outline-secondary" value="Enregistrer les modifications" />
                                </form>
                            <?php } else { ?>
                                <p>Le patient n'a pas été trouvé.</p>
                            <?php } ?>
                            <h1>Liste des rendez-vous</h1>
                            <table table-bordered="2" class="rdvList table table-hover">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Heure</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($listInfoAppointments as $appointmentsPatient) {
                                        ?>
                                        <tr>
                                            <td><?= $appointmentsPatient->date; ?></td>
                                            <td><?= $appointmentsPatient->hour; ?></td>
                                            <td><a class="btn btn-outline-primary" href="rendezvous.php?appointmentId=<?= $appointmentsPatient->id; ?>">Voir / Modifier ce RDV</a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                                <a href="ajout-rendezvous.php" class="btn btn-outline-primary">
                                    <i>Ajouter un rendez-vous</i><br>
                                </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
