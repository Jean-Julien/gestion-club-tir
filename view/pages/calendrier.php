<!Doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/calendar.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
        <a href="index.php?r=home" class="navbar-brand">Home</a>
    </nav>

    <?php
    require './src/Date/Month.php';

    try {
        $month = new Month($_GET['month'] ?? null, $_GET['year'] ?? null);
    } catch (\Exception $e) {
        $month = new Month();
    }

    $bookings[] = ['05', '08', '12', '25'];

    $start = $month->getStartingDay()->modify('last monday');
    ?>

    <div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
        <h1><?= $month->toString(); ?></h1>
        <div>
            <a href="/index.php?r=calendar&month=<?= $month->previousMonth()->month; ?>&year=<?= $month->previousMonth()->year; ?>" class="btn btn-primary">&lt;</a>

            <a href="/index.php?r=calendar&month=<?= $month->nextMonth()->month; ?>&year=<?= $month->nextMonth()->year; ?>" class="btn btn-primary">&gt;</a>
        </div>
    </div>

    <table class="calendar__table calendar__table--<?= $month->getWeeks(); ?>weeks">
        <?php for ($i = 0; $i < $month->getWeeks(); $i++) : ?>
            <tr>
                <?php
                foreach ($month->days as $k => $day) :
                    $date = (clone $start)->modify("+" . ($k + $i * 7) . " days")
                ?>
                    <td class="<?= $month->withinMonth($date) ? '' : 'calendar__othermonth'; ?>">
                        <?php if ($i === 0) : ?>
                            <div class="calendar__weekday"><?= $day; ?></div>
                        <?php endif; ?>
                        <div class="calendar__day"><?= $date->format('d'); ?></div>
                        <?php if ($date->format('d') === '05') { ?>
                            <a class="btn btn-danger btn-xs">Booked</a>
                        <?php } else { ?>
                            <a class="btn btn-success btn-xs">Book</a>
                        <?php }

                        ?>
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endfor; ?>
    </table>

</body>

</html>