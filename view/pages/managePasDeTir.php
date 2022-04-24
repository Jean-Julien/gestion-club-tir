<div class="container p-4 mt-3" style="margin-bottom: 70px;">
    <div class="shadow py-3 px-3 mb-5 bg-dark bg-gradient rounded row g-3">
        <div class="mb-1">
            <h3 class="text-white">Ajout de pas de tir</h3>

            <?php if (!empty($_SESSION['pasdetir_error'])) { ?>
                <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
                    <strong>Oups ! </strong><?php echo $_SESSION['pasdetir_error'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>

            <?php if (!empty($_SESSION['pasdetir_success'])) { ?>
                <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
                    <strong>Youpie ! </strong><?php echo $_SESSION['pasdetir_success'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>
        
            <div class="container px-0 py-2">
                <form action="index.php?r=admin/addPasDeTir" method="POST">
                    <div class="col-12" style="height: 90px;">
                        <label for="nompastir" class="form-label text-white-50">Nom du pas de tir</label>  
                        <input type="text" class="form-control" id="nompastir" name="nom_pas_de_tir" placeholder="Nom du pas de tir"></input>
                    </div>

                    <div class="col-12" style="height: 100px;">
                        <label for="taillepastir" class="form-label text-white-50">Type de pas de tir</label>
                        <select class="form-select" id="taillepastir" name="taille_pas_de_tir">
                            <option selected disabled>Selectionnez un type de pas de tir</option>
                            <?php foreach ($params2 as $taillepasdetir) : ?>
                                <option value="<?php echo $taillepasdetir->getIdTaillePdt(); ?>"><?php echo $taillepasdetir->getDescription(); ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                        <button type="reset" class="btn btn-secondary">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="shadow py-3 px-3 mb-5 bg-dark bg-gradient rounded row g-3">
        <div class="mb-1">
            <h3 class="text-white">Liste des pas de tir</h3>
        
            <div class="container table-responsive px-0 py-3">
                <table id="example2" class="table table-bordered border-secondary dt-responsive nowrap" style="width:100%">
                    <thead class="bg-primary text-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Type</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-dark text-light">
                        <?php foreach ($params1 as $pasdetir) : ?>
                            <tr>
                                <td><?php echo $pasdetir->getId(); ?></td>
                                <td><?php echo $pasdetir->getName(); ?></td>
                                <td><?php echo $pasdetir->getDescriptionPdt(); ?></td>
                                <td>
                                    <form action="" method="POST">
                                        <a class="btn btn-primary btn-sm" href="#">Modifier</a>
                                        <input type="hidden" name="idUser" value="<?php echo $pasdetir->getId(); ?> "></input>
                                        <button type="submit" class="btn btn-danger btn-sm">Désactiver</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot class="bg-primary text-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Type</th>
                            <th scope="col">Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
    unset($_SESSION['pasdetir_error']);
    unset($_SESSION['pasdetir_success']);
?>