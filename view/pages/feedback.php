<div class="container shadow p-4 mt-4 rounded bg-dark bg-gradient" style="margin-bottom: 90px;">
    <form class="rounded row g-3" action="index.php?r=sendFeedback" method="post">
        <div class="mb-1">
            <h3 class="text-white">Votre avis nous interresse</h3>
        </div>

        <?php if (!empty($_SESSION['contact_error'])) { ?>
            <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
                <strong>Oups ! </strong><?php echo $_SESSION['contact_error'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>

        <?php if (!empty($_SESSION['contact_success'])) { ?>
            <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
                <strong>Youpie ! </strong><?php echo $_SESSION['contact_success'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>

        <div class="col-12">
            <label for="commentaire" class="form-label text-white-50">Votre message</label>
            <textarea class="form-control" name="feedback" rows="8" size="30" maxlength="240" required></textarea>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Envoyer</button>
            <a type="button" class="btn btn-secondary" href="/">Retour</a>
        </div>
    </form>
</div>

<?php
    unset($_SESSION['contact_error']);
    unset($_SESSION['contact_success']);
?>