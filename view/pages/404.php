<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

    <body class="bg-dark bg-gradient">
        <div class="container">
            <div class="col-12">
                <div class="row justify-content-center align-items-center" style="height:100vh">
                    <div class="col-6 mb-1">
                        <h1 class="text-white mb-2" style="font-size:7rem">OUPS</h1>
                        <h3 class="text-white mb-5">La page que vous rechercher semble introuvable</h3>
                        <p class="text-white mb-4">Code d'erreur : 404</p>
                        <p class="text-white mb-2">Cliquez sur le bouton ci-dessous pour retourner à la page d'accueil</p>
                        <a class="btn btn-primary mt-3" href="index.php?r=home">Accueil</a>
                    </div>

                    <div class="col-6 mb-1">
                        <img src="<?php echo IMG ?>404.png" class="img-fluid" alt="logo">
                    </div>
                </div>
            </div>
        </div>

        <div class="footer fixed-bottom sticky-bottom">
            <div class="text-center p-3 bg-primary text-white">
                © 2021 Copyright:
                <a class="text-reset fw-bold">TKT</a>
            </div>
        </div>
    </body>
</html>

