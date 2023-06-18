
    <div class="card mt-4 mb-4 shadow" style="width: 12rem; border:none; ">
        <a href="product_details.php?id=<?php echo $row['id'];  ?>&name=<?php echo $row['name']; ?>&price=<?php echo $row['selling_price'];  ?> " class="text-reset text-decoration-none"><img src="../products_Image/<?php echo $file_name; ?>" class="card-img-top" alt=" <?php echo $row['name']; ?>"></a>
        <div class="card-body">
            <a href="#" class="text-reset text-decoration-none" onclick="store()">
                <p class="card-text text-center text-success"><?php echo $row['name']; ?></p>
            </a>
            <a href="#" class="text-reset text-decoration-none">
                <p class="card-text text-center text-dark">Rs. <?php echo $row['selling_price']; ?>$</p>
            </a>
            <form action="" method="POST"><input type="hidden" id="product_id" value="<?php echo $row['id']; ?>"></form>
            <a href="#" class="text-reset text-decoration-none">
                <p class="card-text text-center text-success"> 10%off on 500* purchase</p>
            </a>
        </div>
    </div>