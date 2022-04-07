<div class="container p-4 mt-3" style="margin-bottom: 60px;">
    <div class="shadow py-3 px-3 mb-5 bg-dark bg-gradient rounded row g-3">
        <div class="mb-1">
            <h3 class="text-white">Liste des feedbacks à lire</h3>

            <div class="container table-responsive px-0 py-3">
                <table id="example" class="table table-bordered border-secondary dt-responsive nowrap" style="width:100%">
                    <thead class="bg-primary text-light">
                        <tr>
                            <th scope="col">FeedBack</th>
                            <th scope="col">Date de création</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-light">
                        <?php foreach ($params as $feedback) : ?>
                                <?php if ($feedback->getIsRead() == '0') : ?>
                                    <tr>
                                        <td><?php echo $feedback->getFeedback(); ?></td>
                                        <td><?php echo $feedback->getCreated_at(); ?></td>
                                        <td>
                                            <form action="index.php?r=admin/isReadFeedback" method="POST">
                                                <input type="hidden" name="idFeedback" value="<?php echo $feedback->getIdFeedback(); ?> "></input>
                                                <input type="submit" class="btn btn-success btn-sm" value="Marquer comme lu"></input>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endif ?>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot class="bg-primary text-light">
                        <tr>
                            <th scope="col">FeedBack</th>
                            <th scope="col">Date de création</th>
                            <th scope="col">Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <div class="shadow py-3 px-3 mb-5 bg-dark bg-gradient rounded row g-3">
        <div class="mb-1">
            <h3 class="text-white">Liste des feedbacks lus</h3>

            <div class="container table-responsive px-0 py-3">
                <table id="example2" class="table table-bordered border-secondary dt-responsive nowrap" style="width:100%">
                    <thead class="bg-primary text-light">
                        <tr>
                            <th scope="col" class="col-4">FeedBack</th>
                            <th scope="col" class="col-2">Date de création</th>
                            <th scope="col" class="col-2">Date de lecture</th>
                            <th scope="col" class="col-2">Lecteur</th>
                        </tr>
                    </thead>
                    <tbody class="bg-dark text-light">
                        <?php foreach ($params as $feedback) : ?>
                            <form action="index.php?r=admin/isReadFeedback" method="POST">
                                <?php if ($feedback->getIsRead() == '1') : ?>
                                    <tr>
                                        <td><?php echo $feedback->getFeedback(); ?></td>
                                        <td><?php echo $feedback->getCreated_at(); ?></td>
                                        <td><?php echo $feedback->getReadAt(); ?></td>
                                        <td><?php echo $feedback->getNomUserRead(); ?></td>
                                    </tr>
                                <?php endif ?>
                            </form>

                        <?php endforeach; ?>
                    </tbody>
                    <tfoot class="bg-primary text-light">
                        <tr>
                            <th scope="col" class="col-4">FeedBack</th>
                            <th scope="col" class="col-2">Date de création</th>
                            <th scope="col" class="col-2">Date de lecture</th>
                            <th scope="col" class="col-2">Lecteur</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>