<div class="text-start shadow-sm">
    <h3>Related Products</h3>
</div>
<?php $sql1 = "SELECT * FROM product";
$result1 = mysqli_query($conn, $sql1);
if ($result) {
    while ($rows = mysqli_fetch_assoc($result1)) {
        $file_name = $rows['image']; ?>
        <div class="col-md-2 col-6">
            <div class="card mt-4 mb-4" style="width: 10rem; border:none; ">
                <a href="product_details.php?id=<?php echo $rows['id'] ?>" class="text-reset text-decoration-none"> <img src="../products_Image/<?php echo $file_name; ?>" class="card-img-top" alt=" <?php echo $row['name']; ?>"></a>
                <div class="card-body">
                    <a href="#" class="text-reset text-decoration-none">
                        <p class="card-text text-center text-success"><?php echo $rows['name']; ?></p>
                    </a>
                    <a href="#" class="text-reset text-decoration-none">
                        <p class="card-text text-center text-success"> 10%off</p>
                    </a>
                </div>
            </div>
        </div>
<?php
    }
}

?>