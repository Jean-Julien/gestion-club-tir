<div class="container shadow p-4 mt-4 rounded bg-dark bg-gradient" style="margin-bottom: 90px;">
    <form class="rounded row g-3" action="index.php?r=sendContact" method="post">

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
            <label for="commentaire" class="form-label text-white-50">Votre message</label>
            <input type="textarea" class="form-control" name="feedback" rows="8" size="30" maxlength="240" required>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary col-2">Envoyer</button>
        </div>
    </form>


</div>

<?php
unset($_SESSION['contact_error']);
unset($_SESSION['contact_success']);
?>