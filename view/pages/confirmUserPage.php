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
                    <a class="nav-link" href="index.php?r=reservation">Réservation</a>
                </li>
            </ul>
            <div class="flex-shrink-0 dropdown">
                <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo "Bienvenue " . $_SESSION['prenom']; ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg-end dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser2">
                    <li><a class="dropdown-item" href="#">Mon profil</a></li>
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
            <h3 class="text-white text-center">Liste des utilisateur a activer : </h3>
        </div>
    </div>

    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Email</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <br>
        <tbody>
            <?php

            foreach ($params as $user) : ?>
                <form action="index.php?r=admin/activateUser" method="POST">
                    <tr>
                        <td><?php echo $user->getId(); ?></td>
                        <td><?php echo $user->getName(); ?></td>
                        <td><?php echo $user->getFirstName(); ?></td>
                        <td><?php echo $user->getMail(); ?></td>
                        <input type="hidden" name="idUser" value="<?php echo $user->getId(); ?> "><?php echo $user->getId(); ?></input>
                        <td><input type="submit" class="btn btn-success" value="Activer"></input></td>
                    </tr>
                </form>
            <?php endforeach; ?>
        </tbody>
    </table>


</div>