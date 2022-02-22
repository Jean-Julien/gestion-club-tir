
<h2 style="color: white; text-align:center;">Gestion de plateforme</h2>
<h5 style="color: blue; text-align:center;">ajouter une nouvelle pas de tir</h5>
<form action="index.php?r=admin/managePlatform" method="POST" style=" text-align:center;">
        <input type="text" name="p_name" id="a" style="margin:0.5em;" placeholder="p_name">
        <select name="id_taille" id="">
                <?php foreach($params[1] as $item) { ?>
                <option value="<?php echo $item['id_taille_pdt']?>"> <?php echo $item['description'] ?> </option>
                <?php } ?>
        </select>
        <p><?php echo $_SESSION['error_add_pt']?></p>
        <p style="margin:1em;"><button type="submit" name="add" value="addPlatform"
                        style="background-color:green">ajouter</button>
                <button type="reset" style="background-color:red">Annuler</button>
        </p>

</form>


<div class="shadow py-3 px-3 bg-dark bg-gradient rounded row g-3" style="margin: .5em;">
        <div class="mb-1">
                <h4 class="text-white" style="text-align:center; margin-top:20px;">Dashboard</h4> </h4>
                 <h5 style="color:red; text-align:center;"><?=$_SESSION['delete'] ?></h5>
                <div class="table-responsive border-secondary">
                        <table class="table table striped border-secondary shadow">
                                <thead class="bg-primary text-light">
                                        <tr>
                                                <th scope="col">pas de tir</th>
                                                <th scope="col">description</th>


                                                <th scope="col" class="col-1"></th>
                                                <th scope="col" class="col-1"></th>
                                        </tr>
                                </thead>
                                <br>
                                <tbody class="bg-primary text-light">


                                        <?php foreach ($params[0] as $items) {?>

                                        <?php if (isset($_GET['e']) && $items['p_id'] == $_GET['e']) {?>
                                        <tr>
                                                <form action="index.php?r=admin/managePlatform" method="POST">
                                                        <td><input type="text" name="p_name"
                                                                        value="<?php echo $items['p_name'] ?>"></td>
                                                        <td> <select name="id_taille" id="">
                                                                        <?php foreach($params[1] as $item) { ?>
                                                                        <option
                                                                                value="<?php echo $item['id_taille_pdt']?>">
                                                                                <?php echo $item['description'] ?>
                                                                        </option>
                                                                        <?php } ?>
                                                                </select></td>

                                                        <td><button><a href="index.php?r=admin/managePlatform" style='text-decoration:none;'>Annuler</a></button>
                                                        </td>
                                                        <td><button type="submit" name="modify" style="background-color:green; color:white;"
                                                                        value="<?php echo $items['p_id']?>">modifier</button>
                                                        </td>
                                                </form>
                                        </tr>


                                        <?php } else {?>
                                        <tr>
                                                <td> <?php echo $items['p_name'] ?></td>
                                                <td><?php echo $items['description'] ?></td>
                                                <td><button style="background-color:red; color:white;text-decoration:none;"><a
                                                                        href="index.php?r=admin/managePlatform&d=<?php echo $items['p_id']; ?>">supprimée</a></button>
                                                </td>
                                                <td><button style="background-color:green; color:white;"><a
                                                                        href="index.php?r=admin/managePlatform&e=<?php echo $items['p_id']; ?>"
                                                                        style="text-decoration:none; color:white;">Éditer</a></button>
                                                </td>

                                        </tr>
                                        <?php }?>

                                        <?php }?>
                                </tbody>
                        </table>
                </div>
        </div>
</div>
<br>
<br>