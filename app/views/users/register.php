<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Création de compte</h2>
            <p>Remplissez SVP ce formulaire afin de vous enregistrez</p>
            <form action="<?= URLROOT; ?>/users/register" method='POST'>
                <div class="form-group">
                    <label for="name"> Nom: <sup>*</sup></label>
                    <input type="text" name='name' class='form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>' value="<?= $data['name']; ?>">
                    <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
                </div>

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

                <div class="form-group">
                    <label for="confirm_password"> Confirmer le mot de passe: <sup>*</sup></label>
                    <input type="password" name='confirm_password' class='form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>' value="<?= $data['confirm_password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
                </div>

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Register" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="<?= URLROOT; ?>/users/login" class="btn btn-light btn-block">Vous avez déjà un compte ? Se connecter</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>