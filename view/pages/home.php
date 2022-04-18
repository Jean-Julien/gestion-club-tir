<div class="container p-2 mt-3" style="margin-bottom: 60px;">
    <div class="row">
        <div class="col-sm-9 px-2">
            <div class="shadow py-3 px-3 mb-3 bg-dark bg-gradient rounded">
                <div class="mb-2">
                    <h3 class="text-white">Les actualités</h3>

                    <?php foreach ($params1 as $blog) : ?>
                        <div class="rounded shadow border border-2 border-secondary py-3 px-1 mt-4">
                            <div class="row px-3">
                                <div class="col-sm-4 py-2 d-flex aligns-items-center">
                                    <div class="p-0 rounded">
                                        <img src="data:<?php echo $data["Type"]; ?>;base64,<?php echo base64_encode($blog->getImage()); ?>" class="rounded" style="width: 100%">
                                    </div>
                                </div>
                                <div class="col pt-2">
                                    <h4 class="text-white"><?php echo $blog->getTitle(); ?></h4>
                                    <div class="py-2"><small class="text-white-50">Date de parution : <?php echo date("d-m-Y", strtotime($blog->getDatePublish())); ?></small></div>
                                    <p class="text-white"><?php echo $blog->getContent(); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="col-sm-3 px-2">
            <div class="shadow py-3 px-3 mb-3 bg-dark bg-gradient rounded">
                <div class="mb-2">
                    <h5 class="text-white">Mes réservations futurs</h5>
                </div>

                <?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) { ?>
                
                    <div class="mb-2">
                        <p class="text-white-50">Veuillez vous connecter pour voir vos futurs réservations</p>
                    </div>
                <?php } else { ?>

                    <?php if ($params2 == false) { ?>

                        <div class="mb-2">
                            <p class="text-white-50">Aucune réservation trouvée</p>
                        </div>
                    <?php } else { ?>

                        <div class="table-responsive px-0 pt-2">
                            <table class="table table table-bordered border-secondary text-nowrap">
                                <thead class="bg-primary text-light">
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Heure</th>
                                        <th scope="col">Pas de tir</th>
                                        <th scope="col">Type pas de tir</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-dark text-light">
                                    <?php foreach ($params2 as $myFuturReservations) : ?>
                                        <tr>
                                            <td><?php echo date("d-m-Y", strtotime($myFuturReservations->getDatetime())); ?></td>
                                            <td><?php echo date("H:i", strtotime($myFuturReservations->getDatetime())); ?></td>
                                            <td><?php echo $myFuturReservations->getPasTir_name(); ?></td>
                                            <td><?php echo $myFuturReservations->getTaillePdt_description(); ?></td>
                                        </tr>
                                    <?php endforeach; ?>  
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>

            <div class="shadow py-3 px-3 mb-3 bg-dark bg-gradient rounded">
                <div class="mb-2">
                    <h5 class="text-white">Historiques des réservations</br>(les 5 dernières)</h5>
                </div>

                <?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) { ?>
                
                    <div class="mb-2">
                        <p class="text-white-50">Veuillez vous connecter pour voir votre historique des réservations</p>
                    </div>
                <?php } else { ?>

                    <?php if ($params3 == false) { ?>

                        <div class="mb-2">
                            <p class="text-white-50">Aucune réservation trouvée</p>
                        </div>
                    <?php } else { ?>

                        <div class="table-responsive px-0 pt-2">
                            <table class="table table table-bordered border-secondary text-nowrap">
                                <thead class="bg-primary text-light">
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Heure</th>
                                        <th scope="col">Pas de tir</th>
                                        <th scope="col">Type pas de tir</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-dark text-light">
                                    <?php foreach ($params3 as $myOldReservations) : ?>
                                        <tr>
                                            <td><?php echo date("d-m-Y", strtotime($myOldReservations->getDatetime())); ?></td>
                                            <td><?php echo date("H:i", strtotime($myOldReservations->getDatetime())); ?></td>
                                            <td><?php echo $myOldReservations->getPasTir_name(); ?></td>
                                            <td><?php echo $myOldReservations->getTaillePdt_description(); ?></td>
                                        </tr>
                                    <?php endforeach; ?>  
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
