<?php
include 'controllers/ajout-rendezvousController.php';
include 'header.php';
?>
<div class="container">
    <div class="row main">
        <div class="main-login main-center divAdd">
            <h1>Ajouter un rendez-vous</h1>
            <form method="post" action="ajout-rendezvous.php">
                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Date du rendez-vous</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon" style="padding:0.9em"><i class="fa fa-calendar-o fa"  aria-hidden="true"></i></span>
                            <input type="date" class="form-control" name="date" id="name" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Heure du rendez-vous</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon" style="padding:0.9em"><i class="fa fa-clock-o fa"style="color:white" aria-hidden="true"></i></span>
                            <input type="time" class="form-control" name="hour" id="name" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Sélection du patient</label>
                    <div class="cols-sm-10">
                        <select name="idPatients" style="color: black">
                            <?php foreach ($patientsList as $patients) { ?>
                                <option value="" selected disable hidden>Choisissez le patient</option>
                                <option value="<?= $patients->id ?>"><?= $patients->lastname . ' ' . $patients->firstname ?></option>  
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" value="Enregistrer" name="submit" id="button" class="btn btn-outline-primary login-button" />
                </div>
            </form>
            <p class="formValid">
                <?php
                if ($insertSuccess) {
                    echo 'Votre rendez-vous a bien été enregistré';
                }
                ?>
            </p>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>