<?php
include 'controllers/liste-rendezvousController.php';
include 'header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="divList">
                <br>
                <h1>Liste des rendez-vous</h1>
                <a href="ajout-rendezvous.php" class="btn btn-outline-primary float-end" style="margin-bottom:0.2em"><i>Ajouter un rendez-vous</i></a><br>
                <table table-bordered="1" class="table table-rdv">
                    <thead>
                        <tr> 
                            <th>Nom du patient</th>
                            <th>Prénom du patient</th>
                            <th>Date du rendez-vous</th>
                            <th>Heure du rendez-vous</th>
                            <th>Modifier le rendez-vous</th>
                            <th>Supprimer le rendez-vous</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($appointmentsList as $appointments) { ?>
                            <tr>
                                <td><?= $appointments->lastname; ?></td>
                                <td><?= $appointments->firstname; ?></td>
                                <td><?= $appointments->date; ?></td>
                                <td><?= $appointments->hour; ?></td>
                                <td><a href="rendezvous.php?appointmentId=<?= $appointments->id ?>" class="btn btn-outline-secondary"><i>Modifier</i></a></td>
                                <td><a href="liste-rendezvous.php?del=<?= $appointments->id ?>" class="btn btn-outline-danger"><i>Supprimer</i></button></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>               
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>