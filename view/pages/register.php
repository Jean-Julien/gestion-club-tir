<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>S'enregistrer</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

    <body class="bg-secondary">
        <div class="container">
            <div class="row justify-content-center align-items-center" style="height:100vh">
                <div class="col-md-5 col-sm-12 my-2">
                    <form accept="" class="shadow p-4 bg-dark bg-gradient rounded" method="POST" action="<?php echo insertMember ?>">
                        <div class="mt-2 mb-5 text-center">
                            <h3 class="text-white">Formulaire d'enregistrement</h3>
                            <h6 class="text-white-50">Veuillez entrer vos informations pour vous enregistrer</h6>
                        </div>

                        <?php if (!empty($_SESSION['register_error'])) { ?>
                            <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
                                <strong>Oups ! </strong><?php echo $_SESSION['register_error'] ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php } ?>

                        <?php if (!empty($_SESSION['register_success'])) { ?>
                            <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
                                <strong>Youpie ! </strong><?php echo $_SESSION['register_success'] ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php } ?>

                        <div class="mb-3">
                            <label for="exampleInputNom1" class="form-label text-white-50">Nom</label>
                            <input type="text" class="form-control" id="exampleInputNom1" name="nomRegister" placeholder="Nom">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPrenom1" class="form-label text-white-50">Prénom</label>
                            <input type="text" class="form-control" id="exampleInputPrenom1" name="prenomRegister" placeholder="Prénom">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label text-white-50">Adresse email</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="emailRegister" aria-describedby="emailHelp" placeholder="Email">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputBirthday1" class="form-label text-white-50">Date de naissance</label>
                            <input type="date" class="form-control" id="exampleInputBirthday1" name="datenaissanceRegister">
                        </div>

                        <hr>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">S'enregistrer</button>
                        </div>

                        <hr>

                        <p class="text-center mb-2 text-white-50">Si vous avez déjà un compte, <a href="index.php?r=login">connectez-vous ici</a>.</p>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

<?php
    unset($_SESSION['register_error']);
    unset($_SESSION['register_success']);
?>