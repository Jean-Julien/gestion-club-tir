<div class="container">
    <div class="row justify-content-center align-items-center" style="height:100vh">
        <div class="col-md-5 col-sm-12 my-2">
            <form accept="" class="shadow p-4 bg-dark bg-gradient rounded" method="POST" action="<?php echo insertMember ?>">
                <div class="mt-2 mb-5 text-center">
                    <h3 class="text-white">Formulaire de changement de password</h3>
                </div>

                <?php
                if (!empty($_SESSION['register_error'])) {
                    echo "<div class='alert alert-danger' role='alert'>" . $_SESSION['register_error'] . "</div>";
                }
                ?>

                <div class="mb-3">
                    <label for="exampleInputNom1" class="form-label text-white-50">Ancien password</label>
                    <input type="text" class="form-control" id="exampleInputNom1" name="nomRegister" placeholder="Ancien password">
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

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Valider</button>
                </div>

            </form>
        </div>
    </div>
</div>