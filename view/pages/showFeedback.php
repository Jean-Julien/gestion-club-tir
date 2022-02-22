<div class="container p-4 mt-3" style="margin-bottom: 60px;">
    <div class="shadow py-3 px-3 mb-5 bg-dark bg-gradient rounded row g-3">
        <div class="mb-1">
            <h3 class="text-white">Liste des feedbacks à lire</h3>

            <div class="table-responsive border-secondary">
                <table class="table table striped border-secondary shadow">
                    <thead class="bg-primary text-light">
                        <tr>
                            <th scope="col">FeedBack</th>
                            <th scope="col">Date de création</th>

                            <th scope="col" class="col-1"></th>
                            <th scope="col" class="col-1"></th>
                        </tr>
                    </thead>
                    <br>
                    <tbody class="bg-dark text-light">
                        <?php foreach ($params as $feedback) : ?>
                            <form action="index.php?r=admin/isReadFeedback" method="POST">
                                <?php if ($feedback->getIsRead() == '0') : ?>
                                    <tr>
                                        <td><?php echo $feedback->getFeedback(); ?></td>
                                        <td><?php echo $feedback->getCreated_at(); ?></td>

                                        <td class="text-end"><input type="hidden" name="idFeedback" value="<?php echo $feedback->getIdFeedback(); ?> "></input></td>
                                        <td class="text-end"><input type="submit" class="btn btn-success" value="Marquer comme lu"></input></td>
                                    </tr>
                                <?php endif ?>
                            </form>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="shadow py-3 px-3 mb-5 bg-dark bg-gradient rounded row g-3">
        <div class="mb-1">
            <h3 class="text-white">Liste des feedbacks lu</h3>

            <div class="table-responsive border-secondary">
                <table class="table table striped border-secondary shadow">
                    <thead class="bg-primary text-light">
                        <tr>
                            <th scope="col">FeedBack</th>
                            <th scope="col">Date de création</th>
                            <th scope="col">ID du lecteur</th>
                        </tr>
                    </thead>
                    <br>
                    <tbody class="bg-dark text-light">
                        <?php foreach ($params as $feedback) : ?>
                            <form action="index.php?r=admin/isReadFeedback" method="POST">
                                <?php if ($feedback->getIsRead() == '1') : ?>
                                    <tr>
                                        <td><?php echo $feedback->getFeedback(); ?></td>
                                        <td><?php echo $feedback->getCreated_at(); ?></td>
                                        <td><?php echo $feedback->getId_user_read(); ?></td>
                                    </tr>
                                <?php endif ?>
                            </form>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>