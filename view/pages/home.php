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
            <input type="text" class="form-control" id="pseudo" name="reserv_pseudo" placeholder="Pseudo">
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
                'done':'Terminé'
            };

            new DateTimePickerComponent.DateTimePicker( 'select_datetime', {
                start_date: "2030-03-22T14:30:00",
                last_date: new Date( 2030, 2, 29, 22, 30 ),
                first_day_no: 1,
                l10n: fr,
            } );
        </script>

        <div class="col-md-6">
            <label for="date" class="form-label text-white-50">Date de réservation</label>
            <input type="date" class="form-control" id="date" name="reserv_date">
        </div>

        <div class="col-md-6">
            <label for="horaire" class="form-label text-white-50">Plage horaire</label>
            <select class="form-select" id="horaire" name="reserv_time">
                <option value="08:00:00">08:00 - 08:30</option>
                <option value="08:30:00">08:30 - 09:00</option>
                <option value="09:00:00">09:00 - 09:30</option>
                <option value="09:30:00">09:30 - 10:00</option>
                <option value="10:00:00">10:00 - 10:30</option>
                <option value="10:30:00">10:30 - 10:00</option>
                <option value="11:00:00">11:00 - 11:30</option>
                <option value="11:30:00">11:30 - 11:00</option>
                <option value="12:00:00">12:00 - 12:30</option>
                <option value="12:30:00">12:30 - 12:00</option>
                <option value="13:00:00">13:00 - 13:30</option>
                <option value="13:30:00">13:30 - 13:00</option>
                <option value="14:00:00">14:00 - 14:30</option>
                <option value="14:30:00">14:30 - 14:00</option>
                <option value="15:00:00">15:00 - 15:30</option>
                <option value="15:30:00">15:30 - 15:00</option>
                <option value="16:00:00">16:00 - 16:30</option>
                <option value="16:30:00">16:30 - 17:00</option>
                <option value="17:00:00">17:00 - 17:30</option>
                <option value="17:30:00">17:30 - 18:00</option>
                <option value="18:00:00">18:00 - 18:30</option>
                <option value="18:30:00">18:30 - 19:00</option>
                <option value="19:00:00">19:00 - 19:30</option>
                <option value="19:30:00">19:30 - 20:00</option>
                <option value="20:00:00">20:00 - 20:30</option>
                <option value="20:30:00">20:30 - 21:00</option>
            </select> 
        </div>

        <div class="col-12">
            <label for="pastir" class="form-label text-white-50">Pas de tir</label>
            <select class="form-select" id="pastir" name="reserv_pas_de_tir">
                <option value="1">Pas de tir 1</option>
                <!--<option value="2">Pas de tir 2</option>
                <option value="3">Pas de tir 3</option>
                <option value="4">Pas de tir 4</option>
                <option value="5">Pas de tir 5</option>
                <option value="6">Pas de tir 6</option>
                <option value="7">Pas de tir 7</option>
                <option value="8">Pas de tir 8</option>
                <option value="9">Pas de tir 9</option>
                <option value="10">Pas de tir 10</option>
                <option value="11">Pas de tir 11</option>
                <option value="12">Pas de tir 12</option>
                <option value="13">Pas de tir 13</option>
                <option value="14">Pas de tir 14</option>
                <option value="15">Pas de tir 15</option>
                <option value="16">Pas de tir 16</option>
                <option value="17">Pas de tir 17</option>
                <option value="18">Pas de tir 18</option>
                <option value="19">Pas de tir 19</option>
                <option value="20">Pas de tir 20</option>-->
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
