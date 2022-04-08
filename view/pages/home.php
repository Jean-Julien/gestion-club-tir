<div class="container p-4 mt-3" style="margin-bottom: 60px;">
    <div class="shadow py-3 px-3 mb-5 bg-dark bg-gradient rounded row g-3">
        <div class="mb-1">
            <h3 class="text-white">Nos news</h3>

            <div class="container table-responsive px-0 py-3">
                <table id="example" class="table table-bordered border-secondary dt-responsive nowrap" style="width:100%">
                    <tbody class="bg-dark text-light">
                        <?php foreach ($params as $blog) : ?>
                            <tr>

                                <h3 style="color:white"><?php echo $blog->getTitle(); ?></h3>
                                <img src="data:<?php echo $data["Type"]; ?>;base64,<?php echo base64_encode($blog->getImage()); ?>" width="20%">
                                <p style="color:white"><?php echo $blog->getContent(); ?></p>
                                <p style="color:white"><?php echo date("d-m-Y", strtotime($blog->getDatePublish())); ?></p>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>