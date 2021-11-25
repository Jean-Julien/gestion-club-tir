<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

    <body class="bg-secondary">
        <div class="container">
            <div class="row justify-content-center align-items-center" style="height:100vh">
                <div class="col-5">
                    <form accept="" class="shadow p-4 bg-dark bg-gradient rounded" method="POST" action="index.php?r=connection">
                        <div class="mb-3">
                            <h3 class="text-white">Connexion</h3>
                        </div>

                        <?php
                        if (!empty($_SESSION['error'])) {
                            echo "<div class='alert alert-danger' role='alert'>" . $_SESSION['error'] . "</div>";
                        }
                        ?>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label text-white-50">Adresse email (TKT)</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="emailLogin" aria-describedby="emailHelp" placeholder="Email">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label text-white-50">Mot de passe (RoK0)</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="passwordLogin" placeholder="Password">
                        </div>

                        <label class="mb-3 text-white-50">
                            <input class="form-check-input" type="checkbox" name="RememberMe"> Se souvenir de moi
                        </label>

                        <a href="#" class="float-end text-decoration-none text-error">Mot de passe oublié ?</a>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Se connecter</button>
                        </div>

                        <hr>

                        <p class="text-center mb-0 text-white-50">Si vous n'avez pas de compte, <a href="#">enregistrez-vous ici</a>.</p>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

<?php
    unset($_SESSION['error']);
?>