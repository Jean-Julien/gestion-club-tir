<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Connexion</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    </head>

    <body class="bg-secondary">
        <div class="container">
            <div class="row justify-content-center align-items-center" style="height:100vh">
                <div class="col-md-5 col-sm-12 my-2">
                    <form accept="" class="shadow p-4 bg-dark bg-gradient rounded" method="POST" action="index.php?r=connection">
                        <div class="mt-2 mb-5 text-center">
                            <h3 class="text-white">Connexion</h3>
                            <h6 class="text-white-50">Veuillez entrer votre email et votre mot de passe</h6>
                        </div>

                        <?php if (!empty($_SESSION['login_error'])) { ?>
                            <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
                                <strong>Oups ! </strong><?php echo $_SESSION['login_error'] ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php } ?>

                        <?php if (!empty($_SESSION['login_success'])) { ?>
                            <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
                                <strong>Youpie ! </strong><?php echo $_SESSION['login_success'] ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php } ?>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label text-white-50">Adresse email</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="emailLogin" aria-describedby="emailHelp" placeholder="Email">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label text-white-50">Mot de passe</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="passwordLogin" placeholder="Password">
                        </div>

                        <div class="mb-4 text-center">
                            <a href="index.php?r=forgotpassword" class="text-decoration-none text-error text-center">Mot de passe oublié ?</a>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Se connecter</button>
                        </div>

                        <hr>

                        <p class="text-center mb-2 text-white-50">Si vous n'avez pas de compte, <a href="index.php?r=register">enregistrez-vous ici</a>.</p>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

<?php
    unset($_SESSION['login_error']);
    unset($_SESSION['login_success']);
?>