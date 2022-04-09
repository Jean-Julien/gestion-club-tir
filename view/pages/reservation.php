<div class="container p-4 mt-3" style="margin-bottom: 60px;">
    <div class="shadow pt-2 pb-4 px-3 bg-dark bg-gradient rounded row g-3">
        <div class="mb-1">
            <h3 class="text-white">Réservation pas de tir </h3>
        </div>

        <?php
            if (!empty($_SESSION['reserv_error'])) {
                echo "<div class='alert alert-danger' role='alert'>" . $_SESSION['reserv_error'] . "</div>";
            }

            if (!empty($_SESSION['reserv_success'])) {
                echo "<div class='alert alert-success' role='alert'>" . $_SESSION['reserv_success'] . "</div>";
            }
        ?>

        <form action="index.php?r=reservation" method="POST">
            <label for="pastir" class="form-label text-white-50">Type de pas de tir</label>
            <select class="form-select" id="pastir" name="taille_pas_de_tir" onChange="this.form.submit();">
                <option value="" <?php if(empty($_SESSION['taillePdt'])) { echo 'selected="selected"'; } ?> disabled>Selectionnez un type de pas de tir</option>
                <option value="all" <?php if(!empty($_SESSION['taillePdt']) && $_SESSION['taillePdt'] == "all") { echo 'selected="selected"'; } ?>>Tous</option>
                <?php foreach ($params1 as $taillepasdetir) : ?>
                    <option value="<?php echo $taillepasdetir->getIdTaillePdt(); ?>" <?php if(!empty($_SESSION['taillePdt']) && $_SESSION['taillePdt'] == $taillepasdetir->getIdTaillePdt()) { echo 'selected="selected"'; } ?>><?php echo $taillepasdetir->getDescription(); ?></option>
                <?php endforeach; ?>
            </select>
        </form>

        <form class="" role="form" action="<?php echo insertReservation ?>" method="post">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">

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
                    'jan': 'Jan',
                    'feb': 'Fev',
                    'mar': 'Mar',
                    'apr': 'Avr',
                    'may': 'Mai',
                    'jun': 'Jui',
                    'jul': 'Jui',
                    'aug': 'Aou',
                    'sep': 'Set',
                    'oct': 'Oct',
                    'nov': 'Nov',
                    'dec': 'Dec',
                    'jan_': 'Janvier',
                    'feb_': 'Février',
                    'mar_': 'Mars',
                    'apr_': 'Avril',
                    'may_': 'Mai',
                    'jun_': 'Juin',
                    'jul_': 'Juillet',
                    'aug_': 'Août',
                    'sep_': 'Septembre',
                    'oct_': 'Octobre',
                    'nov_': 'Novembre',
                    'dec_': 'Décembre',
                    'mon': 'Lun',
                    'tue': 'Mar',
                    'wed': 'Mer',
                    'thu': 'Jeu',
                    'fri': 'Ven',
                    'sat': 'Sam',
                    'sun': 'Dim',
                    'mon_': 'Lundi',
                    'tue_': 'Mardi',
                    'wed_': 'Mercredi',
                    'thu_': 'Jeudi',
                    'fri_': 'Vendredi',
                    'sat_': 'Samedi',
                    'sun_': 'Dimanche',
                    'done': 'ok'
                };

                let date_ob = new Date();

                // adjust 0 before single digit date
                let date = ("0" + date_ob.getDate()).slice(-2);

                // current month
                let month = ("0" + (date_ob.getMonth() + 1)).slice(-2);

                // current year
                let year = date_ob.getFullYear();

                // current hours
                let hours = date_ob.getHours();

                // current minutes
                let minutes = date_ob.getMinutes();

                // current seconds
                let seconds = date_ob.getSeconds();

                new DateTimePickerComponent.DateTimePicker('select_datetime', {
                    first_date: year + "-" + month + "-" + date + "T" + hours + ":" + minutes + ":" + seconds,
                    start_date: year + "-" + month + "-" + date + "T" + hours + ":" + minutes + ":" + seconds,
                    last_date: new Date(2030, 0, 29, 16),
                    first_day_no: 1,
                    l10n: fr
                });
            </script>

            <div class="col-12">
                <label for="pastir" class="form-label text-white-50">Pas de tir</label>
                <select class="form-select" id="pastir" name="reserv_pas_de_tir">
                    <option selected disabled>Selectionnez un pas de tir</option>
                    <?php foreach ($params2 as $pasdetir) : ?>
                        <option value="<?php echo $pasdetir->getId(); ?>"><?php echo $pasdetir->getName(); ?> - <?php echo $pasdetir->getDescriptionPdt(); ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary px-4">Réserver</button>
            </div>
        </form>
    </div>
</div>

<?php
    unset($_SESSION['reserv_error']);
    unset($_SESSION['reserv_success']);
    unset($_SESSION['taillePdt']);
?>