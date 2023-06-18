<?php

// session_start();

include('../DBConnection.php');
include('layout/header.php');

$pid = $_GET['id'];
$_SESSION['product_details']=$pid;

echo '<div class="container text-center">
        <div class="row">';
$sql = "SELECT * FROM product where id=$pid";
$result = mysqli_query($conn, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $file_name = $row['image'];  ?>
    <div class="col-md-12 col-11 shadow mt-1 mb-3">
        <div class="row g-0">
            <div class="col-md-4 ms-5 mt-2">
                <img src="../products_Image/<?php echo $file_name; ?>" class="img-fluid rounded-start shadow-sm" alt="...">
            </div>
            <div class="col-1"></div>
            <div class="col-md-6 mt-3 text-start">
                <p><?php echo $row['name']; ?></p>
                <p class="bg-success text-white col-md-1">4.3*</p>
                <p> <b>$<?php echo $row['selling_price']; ?></b></p>
                <p><b>Avaliable Offer</b></p>
                <p><b>Bank Offer </b>5% Cashback on Flipkart Axis Bank Card</p>
                <p><b>First purchase </b>10% Cashback on first purchase</p>
                <p><b>Special Offer </b>20% Cashback on purchase of 10000*</p>
                <p><b>Description</b></p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod inventore possimus temporibus minus, deleniti ut quidem laborum voluptas, delectus qui molestias dignissimos expedita et ducimus velit culpa maxime vitae aliquam? Est ex nobis pariatur enim dolor consequuntur beatae natus autem dolore possimus. Vero ad ipsam nesciunt incidunt, est modi facere.</p>

                <a href="buy.php" class="btn btn-warning px-3 py-2 mt-5 mb-5" style="margin-left:500px;"><b>Buy Now</b></a>
            </div>
        </div>
    </div>
<?php

} else {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> Something went wrong!.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}

?>

<hr class="mt-5">

<?php include('layout/home2.php');
?>
</div>
</div>
</div>

<?php include('../layout/footer.php'); ?>