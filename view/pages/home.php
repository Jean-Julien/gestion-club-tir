

<div class="container p-4 mt-4" style="margin-bottom: 60px;">
    <div class="shadow py-4 px-3 bg-dark bg-gradient rounded row g-3">
        <div class="mb-1">
            <?php foreach ($params as $blog) {?>
                  <div style="display: inline-block; border: 1px solid black; color: white; text-align: center;">
                  <h4><?= $blog["Title"] ?></h4>
                  <?php echo '<img width="125" style="object-fit: cover;" src="data:image;base64,'.base64_encode( $blog["Image"] ).'"/>';?> 
                  <p><?php echo $blog["Content"]?></p>
                  <p><?php echo $blog["date_publish"]?></p>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php if(isset($_SESSION['loggedin'])){?> 
            <div>
                <p>section pour les incrit</p>
            </div>
    <?php } ?> 

</div>
