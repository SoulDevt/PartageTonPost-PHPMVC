<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Connexion à votre compte</h2>
            <p>Remplissez ce formulaire avec vos informations de connexion</p>
            <form action="<?= URLROOT; ?>/users/login" method='POST'>

                <div class="form-group">
                    <label for="email"> Email: <sup>*</sup></label>
                    <input type="email" name='email' class='form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>' value="<?= $data['email']; ?>">
                    <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                </div>

                <div class="form-group">
                    <label for="password"> Mot de passe: <sup>*</sup></label>
                    <input type="password" name='password' class='form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>' value="<?= $data['password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                </div>

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Connexion" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="<?= URLROOT; ?>/users/register" class="btn btn-light btn-block">Pas encore de compte ? S'enregistrer</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>