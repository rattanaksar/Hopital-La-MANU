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
                <a href="ajout-patient.php" class="btn btn-outline-primary float-end" style="margin:0.2em"><i>Ajouter un patient</i></a>
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
                        <input type="search" name="search" placeholder="Saisir un nom ou un prénom..."value="<?= isset($q) ? $q :""?>"/>
                        <input type="submit" value="Rechercher">
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
                        <?php
                            if (isset($search) && !empty($search) && !empty($q)) {
                                foreach ($patientsList as $patients) { ?>
                            <tr>
                                <td><?= $patients->lastname ?></td>
                                <td><?= $patients->firstname ?></td>
                                <td><a href="profil-patient.php?patientId=<?= $patients->id; ?>" class="btn btn-outline-secondary"><i>Voir la fiche du patient</i></a></td>
                                <td><a href="liste-patients.php?del=<?= $patients->id ?>" class="btn btn-outline-danger"><i>Supprimer</i></button></td>
                            </tr>
                        <?php } ?>
                        <?php }?>
                        <?php
                            if (!isset($search) || empty($q)) {
                            foreach ($patientPerPage as $patients) { ?>
                            <tr>
                                <td><?= $patients->lastname ?></td>
                                <td><?= $patients->firstname ?></td>
                                <td><a href="profil-patient.php?patientId=<?= $patients->id; ?>" class="btn btn-outline-secondary"><i>Voir la fiche du patient</i></a></td>
                                <td><a href="liste-patients.php?del=<?= $patients->id ?>" class="btn btn-outline-danger"><i>Supprimer</i></button></td>
                            </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table><?php } ?>
                </a>
            </div>
        </div>
    </div>
        <nav>
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a href="./?page=<?= $currentPage - 1 ?>" class="page-link">Précédent</a>
                </li>
                <?php for($page = 1; $page <= $nbPage; $page++): ?>
                    <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                    <a href="liste-patients.php?page=<?= $page ?>"class="page-link"><?= $page ?></a>
                    </li>
                <?php endfor ?>
            </ul>
        </nav>
</div>               
<?php include 'footer.php'; ?>
