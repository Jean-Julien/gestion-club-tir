<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="<?php echo IMG ?>logo.png" alt="logo" width="32" height="32">
            Projet TKT
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?r=home">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?r=reservation">Réservation</a>
                </li>
            </ul>
            <div class="flex-shrink-0 dropdown">
                <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo "Bienvenue " . $_SESSION['prenom']; ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg-end dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser2">
                    <li><a class="dropdown-item" href="index.php?r=profil">Mon profil</a></li>
                    <?php if ($_SESSION['idRole'] == '1') { ?>
                        <li><a class="dropdown-item" href="index.php?r=admin/confirmuser">Confirmation users</a></li>
                        <li><a class="dropdown-item" href="index.php?r=admin/managePlatform">manage Platform</a></li>
                    <?php } ?>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="index.php?r=logout">Se déconnecter</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<h2 style="color: white; text-align:center;">platform management</h2>
<h5 style="color: white; text-align:center;">add new platform</h5>
<form action="index.php?r=admin/managePlatform" method="POST" style=" text-align:center;">
        <input type="text" name="p_name" id="a" style="margin:0.5em;" placeholder="p_name">
        <select name="id_taille" id="">
                <?php foreach($params[1] as $item) { ?>
                <option value="<?php echo $item['id_taille_pdt']?>"> <?php echo $item['description'] ?> </option>
                <?php } ?>
        </select>
        <p><?php echo $_SESSION['error_add_pt']?></p>
        <p style="margin:1em;"><button type="submit" name="add" value="addPlatform"
                        style="background-color:green">addPlatform</button>
                <button type="reset" style="background-color:red">reset</button>
        </p>

</form>


<div class="shadow py-3 px-3 bg-dark bg-gradient rounded row g-3" style="margin: .5em;">
        <div class="mb-1">
                <h4 class="text-white" style="text-align:center; margin-top:20px;">management board </h4>
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

                                                        <td><button><a
                                                                                href="index.php?r=admin/managePlatform">cancel</a></button>
                                                        </td>
                                                        <td><button type="submit" name="modify"
                                                                        value="<?php echo $items['p_id']?>">modify</button>
                                                        </td>
                                                </form>
                                        </tr>


                                        <?php } else {?>
                                        <tr>
                                                <td> <?php echo $items['p_name'] ?></td>
                                                <td><?php echo $items['description'] ?></td>
                                                <td><button style="background-color:red; color:white;"><a
                                                                        href="index.php?r=admin/managePlatform&d=<?php echo $items['p_id']; ?>">delete</a></button>
                                                </td>
                                                <td><button style="background-color:green; color:white;"><a
                                                                        href="index.php?r=admin/managePlatform&e=<?php echo $items['p_id']; ?>"
                                                                        style="text-decoration:none; color:white;">edit</a></button>
                                                </td>

                                        </tr>
                                        <?php }?>

                                        <?php }?>
                                </tbody>
                        </table>
                </div>
        </div>
</div>