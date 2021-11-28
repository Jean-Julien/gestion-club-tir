<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

    <body class="bg-secondary">
        <!--<section class="vh-100" style="background-color: #508bfc;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <h3 class="mb-5">Sign in</h3>

                        <div class="form-outline mb-4">
                        <input type="email" id="typeEmailX-2" class="form-control form-control-lg" />
                        <label class="form-label" for="typeEmailX-2">Email</label>
                        </div>

                        <div class="form-outline mb-4">
                        <input type="password" id="typePasswordX-2" class="form-control form-control-lg" />
                        <label class="form-label" for="typePasswordX-2">Password</label>
                        </div>

                        <div class="form-check d-flex justify-content-start mb-4">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            value=""
                            id="form1Example3"
                        />
                        <label class="form-check-label" for="form1Example3"> Remember password </label>
                        </div>

                        <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

                        <hr class="my-4">

                        <button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;" type="submit"><i class="fab fa-google me-2"></i> Sign in with google</button>
                        <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;" type="submit"><i class="fab fa-facebook-f me-2"></i>Sign in with facebook</button>

                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>-->



        <div class="container">
            <div class="row justify-content-center align-items-center" style="height:100vh">
                <div class="col-5">
                    <form accept="" class="shadow p-4 bg-dark bg-gradient rounded" method="POST" action="index.php?r=connection">
                        <div class="mt-3 mb-5 text-center">
                            <h3 class="text-white">Connexion</h3>
                            <h6 class="text-white-50">Veuillez entrer votre email et votre mot de passe</h6>
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

                        <div class="mb-4 text-center">
                            <a href="#" class="text-decoration-none text-error text-center">Mot de passe oublié ?</a>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Se connecter</button>
                        </div>

                        <hr>

                        <p class="text-center mb-2 text-white-50">Si vous n'avez pas de compte, <a href="#">enregistrez-vous ici</a>.</p>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

<?php
    unset($_SESSION['error']);
?>