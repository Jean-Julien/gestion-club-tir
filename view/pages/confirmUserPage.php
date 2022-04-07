<div class="container p-4 mt-3" style="margin-bottom: 70px;">
    <div class="shadow py-3 px-3 mb-5 bg-dark bg-gradient rounded row g-3">
        <div class="mb-1">
            <h3 class="text-white">Liste des utilisateurs à activer</h3>
        
            <div class="container table-responsive px-0 py-3">
                <table id="example" class="table table-bordered border-secondary dt-responsive nowrap" style="width:100%">
                    <thead class="bg-primary text-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-dark text-light">
                        <?php foreach ($params as $user) : ?>
                                <?php if($user->getIsActive() == '0'): ?>
                                    <tr>
                                        <td><?php echo $user->getId(); ?></td>
                                        <td><?php echo $user->getName(); ?></td>
                                        <td><?php echo $user->getFirstName(); ?></td>
                                        <td><?php echo $user->getMail(); ?></td>
                                        <td>
                                            <form action="index.php?r=admin/activateUser" method="POST">
                                                <input type="hidden" name="idUser" value="<?php echo $user->getId(); ?>"></input>
                                                <button type="submit" class="btn btn-success btn-sm">Activer</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endif ?>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot class="bg-primary text-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <div class="shadow py-3 px-3 mb-5 bg-dark bg-gradient rounded row g-3">
        <div class="mb-1">
            <h3 class="text-white">Liste des utilisateurs actifs</h3>
        
            <div class="container table-responsive px-0 py-3">
                <table id="example2" class="table table-bordered border-secondary dt-responsive nowrap" style="width:100%">
                    <thead class="bg-primary text-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-dark text-light">
                        <?php foreach ($params as $user) : ?>
                                <?php if($user->getIsActive() == '1'): ?>
                                    <tr>
                                        <td><?php echo $user->getId(); ?></td>
                                        <td><?php echo $user->getName(); ?></td>
                                        <td><?php echo $user->getFirstName(); ?></td>
                                        <td><?php echo $user->getMail(); ?></td>
                                        <td>
                                            <form action="index.php?r=admin/desactivateUser" method="POST">
                                                <a class="btn btn-secondary btn-sm" href="#">Voir</a>
                                                <a class="btn btn-primary btn-sm" href="#">Modifier</a>
                                                <input type="hidden" name="idUser" value="<?php echo $user->getId(); ?> "></input>
                                                <button type="submit" class="btn btn-danger btn-sm">Désactiver</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endif ?>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot class="bg-primary text-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>