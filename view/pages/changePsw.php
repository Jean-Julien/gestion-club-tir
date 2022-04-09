<div class="container p-4 mt-3" style="margin-bottom: 70px;">
    <div class="shadow py-1 px-3 bg-dark bg-gradient rounded row g-3">
        <div class="mb-1">
            <form method="POST" action="<?php echo changePswBdd ?>">
                <div class="mt-1 mb-3">
                    <h3 class="text-white">Formulaire de changement de password</h3>
                </div>

                <?php if (!empty($_SESSION['password_error'])) { ?>
                    <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
                        <strong>Oups ! </strong><?php echo $_SESSION['password_error'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>

                <?php if (!empty($_SESSION['password_success'])) { ?>
                    <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
                        <strong>Youpie ! </strong><?php echo $_SESSION['password_success'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>

                <div class="mb-3">
                    <label for="exampleInputNom1" class="form-label text-white-50">Ancien password</label>
                    <input type="text" class="form-control" id="exampleInputNom1" name="oldPassword" placeholder="Ancien password">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPrenom1" class="form-label text-white-50">Nouveau password</label>
                    <input type="text" class="form-control" id="exampleInputPrenom1" name="newPassword" placeholder="Nouveau password">
                </div>

                <div class="mb-4">
                    <label for="exampleInputEmail1" class="form-label text-white-50">Confirmer votre nouveau password</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="confirmPassword" placeholder="Confirmer Password">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    <a href="/" type="button" class="btn btn-secondary">Retour</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    if (!empty($_SESSION['password_error'])) {
        unset($_SESSION['password_error']);
    }

    if (!empty($_SESSION['password_success'])) {
        unset($_SESSION['password_success']);
    }
?>
