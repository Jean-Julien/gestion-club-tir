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
               
                    <?php if (isset($_SESSION['loggedin'])) { ?>
                        <li class="nav-item">
                             <a class="nav-link" href="index.php?r=reservation">Réservation</a>
                        </li>
                        <?php }else{ ?>
                        <li class="nav-item">
                             <a class="nav-link" href="index.php?r=login">login</a>
                        </li>
                        <?php } ?>
                    
                
            </ul>
            <div class="flex-shrink-0 dropdown">
                <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo "Bienvenue " . $_SESSION['prenom']; ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg-end dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser2">
                    <li><a class="dropdown-item" href="index.php?r=profil">Mon profil</a></li>
                    <?php if ($_SESSION['idRole'] == '1') { ?>
                        <li><a class="dropdown-item" href="index.php?r=admin/confirmuser">Confirmation users</a></li>
                        <li><a class="dropdown-item" href="index.php?r=admin/managePlatform">manage Platform</a></li>
                    <?php } ?>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="index.php?r=logout">Se déconnecter</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="container p-4 mt-4" style="margin-bottom: 60px;">
    <div class="shadow py-4 px-3 bg-dark bg-gradient rounded row g-3">
        <div class="mb-1">
            <h3 class="text-white text-center">Mes réservations : </h3>
        </div>
    </div>

    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Pas de tir</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
        <br>
        <tbody>
            <?php

            foreach ($params as $reservation) : ?>
                <tr>
                    <td><?php echo $reservation->getPasTir_id(); ?></td>
                    <td><?php echo $reservation->getDatetime(); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


</div>