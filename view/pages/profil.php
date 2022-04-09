<div class="container p-4 mt-4" style="margin-bottom: 60px;">
    <div class="shadow py-2 px-3 bg-dark bg-gradient rounded row g-3">
        <div class="mb-1">
            <form method="POST" action="index.php?r=modifProfile">
                <div class="mt-1 mb-3">
                    <h3 class="text-white">Mes informations</h3>
                </div>

                <?php if (!empty($_SESSION['profile_error'])) { ?>
                    <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
                        <strong>Oups ! </strong><?php echo $_SESSION['profile_error'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>

                <?php if (!empty($_SESSION['profile_success'])) { ?>
                    <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
                        <strong>Youpie ! </strong><?php echo $_SESSION['profile_success'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>

                <div class="pb-3">
                    <label for="inputEmail" class="form-label text-white-50">Email</label>
                    <input type="text" class="form-control" id="inputEmail" name="email" value="<?php echo $params->getMail(); ?>" placeholder="Email" disabled>
                </div>

                <div class="row pb-3">
                    <div class=" col pb-3">
                        <label for="inputNom" class="form-label text-white-50">Nom</label>
                        <input type="text" class="form-control" id="inputNom" name="nom" value="<?php echo $params->getName(); ?>" placeholder="Nom">
                    </div>

                    <div class="col pb-3">
                        <label for="inputPrenom" class="form-label text-white-50">Prénom</label>
                        <input type="text" class="form-control" id="inputPrenom" name="prenom" value="<?php echo $params->getFirstname(); ?>" placeholder="Prénom">
                    </div>
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
    unset($_SESSION['profile_error']);
    unset($_SESSION['profile_success']);
?>