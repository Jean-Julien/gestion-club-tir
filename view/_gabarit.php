
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion club de tir</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <link href="<?php echo CSS ?>date-time-picker-component.min.css" rel="stylesheet">
    <script src="<?php echo JS ?>date-time-picker-component.min.js"></script>
    <link href="<?php echo CSS ?>calendar.css" rel="stylesheet">
    <link href="<?php echo CSS ?>style.css" rel="stylesheet">
</head>

<body class="bg-secondary">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="<?php echo IMG ?>logo.png" alt="logo" width="32" height="32">
            Projet TKT
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?r=home">Accueil</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="index.php?r=contact">Contact</a>
                    </li>
                <?php if (isset($_SESSION['loggedin'])) { ?>
                        <li class="nav-item">
                             <a class="nav-link" href="index.php?r=reservation">Réservation</a>
                        <?php }else{ ?>
                        <li class="nav-item">
                             <a class="nav-link" href="index.php?r=login">login</a>
                        </li>
                        <?php } ?>
            </ul>
            <?php if (isset($_SESSION['loggedin'])) {?>
                
                
            <div class="flex-shrink-0 dropdown">
                <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                   <?php if(isset($_SESSION['prenom'])){echo "Bienvenue " . $_SESSION['prenom'];} ?>  
                </a>
                <ul class="dropdown-menu dropdown-menu-lg-end dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser2">
                    <li><a class="dropdown-item" href="index.php?r=profil">Mon profil</a></li>
                    <?php if ($_SESSION['idRole'] == '1') { ?>
                        <li><a class="dropdown-item" href="index.php?r=admin/confirmuser">Confirmation users</a></li>
                        <li><a class="dropdown-item" href="index.php?r=admin/managePlatform">gérer pas de tir</a></li>
                    <?php } ?>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="index.php?r=logout">Se déconnecter</a></li>
                </ul>
            </div><?php }?>
        </div>
    </div>
</nav>

    <!-- ma page -->
    <?php
    echo $contentPage;
    ?>

    <div class="footer fixed-bottom sticky-bottom">
        <div class="text-center p-3 bg-dark text-white">
            © 2021 Copyright:
            <a class="text-reset fw-bold">TKT</a>
            <a class="text-reset fw-bold" padding=90px href="index.php?r=feedback">Donnez-nous votre avis</a>
        </div>
    </div>
</body>


</html>

