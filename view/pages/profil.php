<div class="container p-4 mt-4" style="margin-bottom: 60px;">
    <div class="shadow py-4 px-3 bg-dark bg-gradient rounded row g-3">
        <div class="mb-1">
            <h3 class="text-white text-center">Mes réservations : </h3>
        </div>
    </div>

    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Pas de tir</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
        <br>
        <tbody>
            <?php

            foreach ($params as $reservation) : ?>
                <tr>
                    <td><?php echo $reservation->getPasTir_id(); ?></td>
                    <td><?php echo $reservation->getDatetime(); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>