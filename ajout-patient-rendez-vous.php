<?php
include 'controllers/ ajout-patient-rendez-vousController.php';
include 'header.php';
?>
<div class="container">
    <div class="divList">
        <div class="row main">
                <h1>Ajouter patient & RDV</h1>

                <form action="ajout-patient-rendez-vous.php" method="POST">

                    <div class="row">
                        <div class="col text-center fw-bold">
                            <label for="lastname" class="form-label">Nom :</label>
                        </div>
                        <div class="col-9">
                            <input type="text" id="lastname" name="lastname" class="form-control" value="<?= isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : "" ?>" placeholder="ex : Dupont">
                            <p class="text-center fst-italic text-danger"><?= isset($formError['lastname']) ? $formError['lastname'] : "" ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col text-center fw-bold">
                            <label for="firstname" class="form-label">Prénom :</label>
                        </div>
                        <div class="col-9">
                            <input type="text" id="firstname" name="firstname" class="form-control" placeholder="ex : Jean" value="<?= isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : "" ?>">
                            <p class="text-danger fst-italic text-center"><?= isset($formError['firstname']) ? $formError['firstname'] : "" ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col text-center fw-bold">
                            <label for="birthdate" class="form-label">Date de naissance :</label>
                        </div>
                        <div class="col-9">
                            <input type="date" id="birthdate" name="birthdate" class="form-control" value="<?= isset($_POST['birthdate']) ? $_POST['birthdate'] : "" ?>">
                            <p class="text-center text-danger fst-italic"><?= isset($formError['birthdate']) ? $formError['birthdate'] : "" ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col text-center fw-bold">
                            <label for="phone" class="form-label">Numéro de téléphone :</label>
                        </div>
                        <div class="col-9">
                            <input type="number" id="phone" name="phone" class="form-control" placeholder="ex : 0601010101" value="<?= isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : "" ?>">
                            <p class="text-danger text-center fst-italic"><?= isset($formError['phone']) ? $formError['phone'] : "" ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col text-center fw-bold">
                            <label for="mail" class="form-label">Mail :</label>
                        </div>
                        <div class="col-9">
                            <input type="email" name="mail" id="mail" class="form-control" placeholder="ex : dupont.jean@gmail.com" value="<?= isset($_POST['mail']) ? htmlspecialchars($_POST['mail']) : "" ?>">
                            <p class="text-center fst-italic text-danger"><?= isset($formError['mail']) ? $formError['mail'] : "" ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col text-center fw-bold">
                            <label for="date" class="form-label">Date du rendez-vous :</label>
                        </div>
                        <div class="col-9">
                            <input type="date" class="form-control" name="date" id="date" value="<?= isset($_POST['date']) ? htmlspecialchars($_POST['date']) : "" ?>">
                            <p class="text-center text-danger fst-italic"><?= isset($formError['date']) ? $formError['date'] : "" ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col text-center fw-bold">
                            <label for="hour" class="form-label">Heure du rendez-vous :</label>
                        </div>
                        <div class="col-9">
                            <input type="time" class="form-control" name="hour" id="hour" value="<?= isset($_POST['hour']) ? htmlspecialchars($_POST['hour']) : "" ?>">
                            <p class="text-danger text-center fst-italic"><?= isset($formError['hour']) ? $formError['hour'] : "" ?></p>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-outline-primary">Enregistrer</button>
                    </div>
                </form>
                <?php
                if ($insertSuccess) {
                    echo 'Votre profil a bien été enregistré';
                }
                ?>
        </div>
        <div class="text-center mt-3">
            <a href="liste-patients.php" class="btn btn-outline-primary">Liste patients</a>
            <a href="liste-rendezvous.php" class="btn btn-outline-primary">Liste RDV</a>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
