<div class="container p-4 mt-3" style="margin-bottom: 70px;">
    <div class="shadow py-3 px-3 bg-dark bg-gradient rounded row g-3">
        <div class="mb-1">
            <form method="POST" action="<?php echo changePswBdd ?>">
                <div class="mt-1 mb-3">
                    <h3 class="text-white">Formulaire de changement de password</h3>
                </div>

                <?php
                    if (!empty($_SESSION['reserv_error'])) {
                        echo "<div class='alert alert-danger' role='alert'>" . $_SESSION['reserv_error'] . "</div>";
                    }

                    if (!empty($_SESSION['succes'])) {
                        echo "<div class='alert alert-success' role='alert'>" . $_SESSION['succes'] . "</div>";
                    }
                ?>

                <div class="mb-3">
                    <label for="exampleInputNom1" class="form-label text-white-50">Ancien password</label>
                    <input type="text" class="form-control" id="exampleInputNom1" name="oldPassword" placeholder="Ancien password">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPrenom1" class="form-label text-white-50">Nouveau password</label>
                    <input type="text" class="form-control" id="exampleInputPrenom1" name="newPassword" placeholder="Nouveau password">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label text-white-50">Confirmer votre nouveau password</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="confirmPassword" placeholder="Confirmer Password">
                </div>

                <hr>

                <div class="d-grid gap-2 mb-3">
                    <button type="submit" class="btn btn-primary">Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    if (!empty($_SESSION['reserv_error'])) {
        unset($_SESSION['reserv_error']);
    }

    if (!empty($_SESSION['succes'])) {
        unset($_SESSION['succes']);;
    }
?>
