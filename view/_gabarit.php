<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link href="assets/css/calendar.css" rel="stylesheet">
    </head>

    <body class="bg-secondary">
        <!-- ma page -->
        <?php
            echo $contentPage;
        ?>

        <div class="footer fixed-bottom sticky-bottom">
            <div class="text-center p-3 bg-success text-white">
                © 2021 Copyright:
                <a class="text-reset fw-bold">TKT</a>
            </div>
        </div>
    </body>
</html>