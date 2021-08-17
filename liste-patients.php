<?php
include 'controllers/liste-patientsController.php';
include 'header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="divList">
                <br>
                <h1>Liste des patients</h1>
                <?php
                if (!empty($success)) {
                    ?>
                    <div class="alert alert-dismissible alert-success col-lg-3 success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?= $success ?>
                    </div>
                    <?php
                } else {
                    ?> <div><?= '' ?></div> <?php
                }
                ?>
                <form action="#" method="POST">
                        <label for="searchPatient"> Recherche </label>
                        <input type="text" name="searchPatient" placeholder="Saisir un nom ou un prénom..."/>
                        <input type="submit" name="submitSearch" value="Valider">
                </form>
                <?php
                        if(isset($_POST['searchPatient'])){
                            ?> <p class="whitetext">Résultat de la recherche : </p> <?php
                        }
                        if(isset($patientsList) && count($patientsList) == 0){
                            ?> <p class="whitetext">Il n'y a aucun patient qui correspond à votre recherche.</p><?php
                        } else { ?>
                <table table-bordered="1" class="table table-rdv">
                    <thead>
                        <tr>
                            <th>Nom du patient</th>
                            <th>Prénom du patient</th>
                            <th>Modifier le patient</th>
                            <th>Supprimer le patient</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($patientsList as $patients) { ?>
                            <tr>
                                <td><?= $patients->lastname ?></td>
                                <td><?= $patients->firstname ?></td>
                                <td><a href="profil-patient.php?patientId=<?= $patients->id; ?>" class="btn btn-outline-secondary"><i>Voir la fiche du patient</i></a></td>
                                <td><a id="delete-button" href="liste-patients.php?del=<?= $patients->id ?>" class="btn btn-outline-danger"><i>Supprimer</i></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table><?php } ?>
                <a href="ajout-patient.php" class="btn btn-outline-primary"><i>Ajouter un patient</i></a>
                </a>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
