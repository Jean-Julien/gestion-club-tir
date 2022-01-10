
<div class="container p-4 mt-3" style="margin-bottom: 60px;">
    <div class="shadow py-3 px-3 mb-5 bg-dark bg-gradient rounded row g-3">
        <div class="mb-1">
            <h3 class="text-white">Liste des utilisateurs à activer</h3>
        
            <div class="table-responsive border-secondary">
                <table class="table table striped border-secondary shadow">
                    <thead class="bg-primary text-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Email</th>
                            <th scope="col" class="col-1"></th>
                            <th scope="col" class="col-1"></th>
                        </tr>
                    </thead>
                    <br>
                    <tbody class="bg-dark text-light">
                        <?php foreach ($params as $user) : ?>
                            <form action="index.php?r=admin/activateUser" method="POST">
                                <?php if($user->getIsActive() == '0'): ?>
                                    <tr>
                                        <td><?php echo $user->getId(); ?></td>
                                        <td><?php echo $user->getName(); ?></td>
                                        <td><?php echo $user->getFirstName(); ?></td>
                                        <td><?php echo $user->getMail(); ?></td>
                                        <td class="text-end"><input type="hidden" name="idUser" value="<?php echo $user->getId(); ?> "></input></td>
                                        <td class="text-end"><input type="submit" class="btn btn-success" value="Activer"></input></td>
                                    </tr>
                                <?php endif ?>
                            </form>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="shadow py-3 px-3 bg-dark bg-gradient rounded row g-3">
        <div class="mb-1">
            <h3 class="text-white">Liste des utilisateurs actifs</h3>
        
            <div class="table-responsive border-secondary">
                <table class="table table striped border-secondary shadow">
                    <thead class="bg-primary text-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Email</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col" class="col-1"></th>
                            <th scope="col" class="col-1"></th>
                        </tr>
                    </thead>
                    <br>
                    <tbody class="bg-dark text-light">
                        <?php foreach ($params as $user) : ?>
                            <form action="" method="POST">
                                <?php if($user->getIsActive() == '1'): ?>
                                    <tr>
                                        <td><?php echo $user->getId(); ?></td>
                                        <td><?php echo $user->getName(); ?></td>
                                        <td><?php echo $user->getFirstName(); ?></td>
                                        <td><?php echo $user->getMail(); ?></td>
                                        <td><input type="hidden" name="idUser" value="<?php echo $user->getId(); ?> "></input></td>
                                        <td class="text-end">
                                            <input type="submit" class="btn btn-primary" value="Voir"></input>
                                        </td>
                                        <td class="text-end">
                                            <input type="submit" class="btn btn-success" value="Modifier"></input>
                                        </td>
                                        <td class="text-end">
                                            <input type="submit" class="btn btn-danger" value="Supprimer"></input>
                                        </td>
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