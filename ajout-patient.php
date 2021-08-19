<?php
include 'controllers/ajout-patientController.php';
include 'header.php';
?>
<div class="container">
    <div class="row main">
        <div class="main-login main-center divAdd">
            <h1>Ajouter un patient</h1>
            <?php foreach ($formError as $Error) { ?>
                <p><?= $Error ?></p>
            <?php } ?>
            <form method="post" action="ajout-patient.php">
                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label <?= isset($formError['lastname']) ? 'inputError' : '' ?>">Votre nom</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon" style="padding:0.9em"><i class="fa fa-user fa" style="color:white" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="lastname" id="name"  placeholder="Entrer votre nom" value="<?= $patients->lastname ?>" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label <?= isset($formError['firstname']) ? 'inputError' : '' ?>">Votre prénom</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon" style="padding:0.9em"><i class="fa fa-user fa" style="color:white" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="firstname" id="name"  placeholder="Entrer votre prénom" value="<?= $patients->firstname ?>" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="cols-sm-2 control-label <?= isset($formError['birthdate']) ? 'inputError' : '' ?>">Votre date de naissance</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"style="padding:0.9em"><i class="fa fa-calendar" style="color:white" aria-hidden="true"></i></span>
                            <input type="date" class="form-control" name="birthdate" id="email"  placeholder="Entrer votre date de naissance" value="<?= $patients->birthdate ?>" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="username" class="cols-sm-2 control-label <?= isset($formError['phone']) ? 'inputError' : '' ?>">Votre numéro de téléphone</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"style="padding:0.9em"><i class="fa fa-phone" style="color:white" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="phone" id="username"  placeholder="Entrer votre numéro de téléphone" value="<?= $patients->phone ?>" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label <?= isset($formError['mail']) ? 'inputError' : '' ?>">Votre adresse e-mail</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"style="padding:0.9em"><i class="fa fa-envelope fa" style="color:white" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="mail" id="password"  placeholder="Entrer votre adresse email" value="<?= $patients->mail ?>" />
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <input name="submit" type="submit" value="Enregistrer" id="button" class="btn btn-outline-primary login-button" />
                </div>
            </form>
            <p class="formValid">
                <?php
                if ($insertSuccess) {
                    echo 'Votre profil a bien été enregistré';
                }
                ?>
            </p>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
