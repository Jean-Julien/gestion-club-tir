<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="<?php echo IMG ?>logo.png" alt="logo" width="32" height="32">
            TKT
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

<div class="container shadow p-4 mt-4 rounded bg-dark bg-gradient">
    <form class="rounded row g-3" role="form" action="<?php echo insertReservation ?>" method="post">
        <div class="mb-1">
            <h3 class="text-white">Réservation pas de tir</h3>
        </div>

        <?php
        if (!empty($_SESSION['reserv_error'])) {
            echo "<div class='alert alert-danger' role='alert'>" . $_SESSION['reserv_error'] . "</div>";
        }
        ?>

        <?php
        if (!empty($_SESSION['reserv_success'])) {
            echo "<div class='alert alert-success' role='alert'>" . $_SESSION['reserv_success'] . "</div>";
        }
        ?>

        <div class="col-12">
            <label for="pseudo" class="form-label text-white-50">Pseudo</label>
            <input type="text" class="form-control" id="pseudo" name="reserv_pseudo" placeholder="Insérez votre Pseudo">
        </div>

        <div class="col-12">
            <label for="select_datetime" class="form-label text-white-50">Date et heure de réservation</label>
            <div id="select_datetime" class="datetime-container fix-float">
                <div class="buttons-container fix-float">
                    <input type="hidden" name="select_datetime_value" class="date_output" value="">
                </div>
            </div>
        </div>

        <script>
            const fr = {
                'jan':'Jan',
                'feb':'Fev',
                'mar':'Mar',
                'apr':'Avr',
                'may':'Mai',
                'jun':'Jui',
                'jul':'Jui',
                'aug':'Aou',
                'sep':'Set',
                'oct':'Oct',
                'nov':'Nov',
                'dec':'Dec',
                'jan_':'Janvier',
                'feb_':'Février',
                'mar_':'Mars',
                'apr_':'Avril',
                'may_':'Mai',
                'jun_':'Juin',
                'jul_':'Juillet',
                'aug_':'Août',
                'sep_':'Septembre',
                'oct_':'Octobre',
                'nov_':'Novembre',
                'dec_':'Décembre',
                'mon':'Lun',
                'tue':'Mar',
                'wed':'Mer',
                'thu':'Jeu',
                'fri':'Ven',
                'sat':'Sam',
                'sun':'Dim',
                'mon_':'Lundi',
                'tue_':'Mardi',
                'wed_':'Mercredi',
                'thu_':'Jeudi',
                'fri_':'Vendredi',
                'sat_':'Samedi',
                'sun_':'Dimanche',
                'done':'ok'
            };

            new DateTimePickerComponent.DateTimePicker( 'select_datetime', {
                //first_date: new Date(),
                start_date: new Date(),
                last_date: new Date( 2030, 2, 29, 22, 30 ),
                first_day_no: 1,
                l10n: fr,
                min_range_hours: 18
            } );
        </script>

        <div class="col-12">
            <label for="pastir" class="form-label text-white-50">Pas de tir</label>
            <select class="form-select" id="pastir" name="reserv_pas_de_tir">
                <option selected disabled>Selectionnez un pas de tir</option>
                <?php foreach($params as $pasdetir) : ?>
					<option value="<?php echo $pasdetir->idPasDeTir; ?>"><?php echo $pasdetir->nomPasDeTir; ?></option>
				<?php endforeach; ?>
            </select>  
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary col-2">Réserver</button>
        </div>
    </form>
</div>

<?php
    unset($_SESSION['reserv_error']);
    unset($_SESSION['reserv_success']);
?>
