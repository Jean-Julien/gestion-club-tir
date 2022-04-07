<div class="container p-4 mt-3" style="margin-bottom: 60px;">
    <div class="shadow py-3 px-3 mb-5 bg-dark bg-gradient rounded row g-3">
        <div class="mb-1">
            <h3 class="text-white">Mes réservations</h3>
        
            <div class="container table-responsive px-0 py-3">
                <table id="example" class="table table-bordered border-secondary dt-responsive nowrap" style="width:100%">
                    <thead class="bg-primary text-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date</th>
                            <th scope="col">Heure</th>
                            <th scope="col">Pas de tir</th>
                            <th scope="col">Type pas de tir</th>
                        </tr>
                    </thead>
                    <tbody class="bg-dark text-light">
                        <?php foreach ($params as $reservation) : ?>
                            <tr>
                                <td><?php echo $reservation->getId(); ?></td>
                                <td><?php echo date("d-m-Y", strtotime($reservation->getDatetime())); ?></td>
                                <td><?php echo date("H:i", strtotime($reservation->getDatetime())); ?></td>
                                <td><?php echo $reservation->getPasTir_name(); ?></td>
                                <td><?php echo $reservation->getTaillePdt_description(); ?></td>
                            </tr>
                        <?php endforeach; ?>  
                    </tbody>
                    <tfoot class="bg-primary text-light">
                        <tr>
                            <th scope="col">#</th>    
                            <th scope="col">Date</th>
                            <th scope="col">Heure</th>
                            <th scope="col">Pas de tir</th>
                            <th scope="col">Type pas de tir</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>