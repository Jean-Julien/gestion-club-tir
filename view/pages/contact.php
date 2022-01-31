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
                    <a class="nav-link" href="index.php?r=calendar">Calendrier</a>
                </li>
            </ul>
            <div class="flex-shrink-0 dropdown">
                <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo IMG ?>user.png" alt="user" width="32" height="32" class="rounded-circle">
                    <?php echo $_SESSION['nom']." ". $_SESSION['prenom']; ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end text-small shadow" aria-labelledby="dropdownUser2">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="index.php?r=logout">Se déconnecter</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="container shadow p-4 mt-4 rounded bg-dark bg-gradient" style="margin-bottom: 90px;">
    <form class="rounded row g-3" action="<?php echo sendContact ?>" method="post">

        <div class="mb-1">
            <h3 class="text-white">Formulaire de contact</h3>
        </div>

        <?php
        if (!empty($_SESSION['contact_error'])) {
            echo "<div class='alert alert-danger' role='alert'>" . $_SESSION['contact_error'] . "</div>";
        }

        if (!empty($_SESSION['contact_success'])) {
            echo "<div class='alert alert-success' role='alert'>" . $_SESSION['contact_success'] . "</div>";
        }
        ?>

        <div class="col-12">
            <input type="text" class="form-control" name="mail" readonly="readonly" value="<?php echo $_SESSION['mail']?>">
        </div>


        <div class="col-12">
            <label for="commentaire" class="form-label text-white-50">Votre message</label>
            <input type="textarea" class="form-control" name="message" rows="8" size="30" maxlength="240" required> 
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary col-2">Envoyer</button>
        </div>
        <div class="mt-4">
        <button type="reset" class="btn btn-primary col-2">Annuler</button>
        </div>
    </form>

    
</div>

<?php
    unset($_SESSION['contact_error']);
    unset($_SESSION['contact_success']);
?>
