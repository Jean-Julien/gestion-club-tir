<h2>platform management</h2>
<h3>add new platform</h3>
<form action="" method="POST">
    <label for="id"></label> <input type="text" name="" id="id">
    <label for="id"></label> <input type="text" name="" id="id">
    <label for="id"></label> <input type="text" name="" id="id">
    <button type="submit">submit</button>
</form>

<h4>platform board</h4>
<table>
    <thead>
        <tr>
            <td>pas_de_tir</td>
            <td>distance</td>
            <td>delete</td>
            <td>modify</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $pas) { ?>
            <?php if (isset($_GET['modify']) && $pass['id'] == $_GET['modify']) { ?>

                <form action="" method="POST">
                    <label for="id"></label> <input type="text" name="" value="<?php echo $data['id'] ?>" id="" id">
                    <label for="id"></label> <input type="text" name="" value="<?php echo $data['id'] ?> id=" id">
                    <label for="id"></label> <input type="text" name="" value="<?php echo $data['id'] ?> id=" id">
                    <button type="submit">modify</button>
                </form>



            <?php } else { ?>
            <tr>
                <td> <?php echo $pas['pas_de_tir']?></td>
                <td><?php echo $pas['distance']?></td>
                <td><button><a href="">delete</a></button></td>
                <td><button><a href="">edit</a></button></td>
            </tr>
            <?php }?>

        <?php }?>
    </tbody>

</table>