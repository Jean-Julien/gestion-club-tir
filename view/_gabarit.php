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

    <body class="bg-light">
        <!-- ma page -->
        <?php
            echo $contentPage;
        ?>

        <div class="footer fixed-bottom sticky-bottom">
            <div class="text-center p-3 bg-dark text-white">
                © 2021 Copyright:
                <a class="text-reset fw-bold">TKT</a>
            </div>
        </div>
    </body>
</html>