<?php
include('../../DBConnection.php'); //Database connection
session_start();

include('../layout/isadmin.php');

$id = $_SESSION['product_id'];

//Fetching signup table row
$sql3="SELECT * FROM product where id=$id ";

$result=mysqli_query($conn,$sql3);

$row = mysqli_fetch_assoc($result);
$file_name=$row['image'];
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>product</title>

    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
<div class="container pt-5" id="registration"> <!--start of container-->
        <h2 class="text-center">Product</h2>
        <div class="row mt-4 mb-4 loginformwidth"> <!--start of row-->
            <div class="col-md-6 offset-md-3 bg-success bg-opacity-25 py-3"> <!--start of column-->
            <!--start of form-->
            <div>
                <img src="../products_Image/<?php if(isset( $row['image'])){echo $row['image']; } ?>" alt="" class="card-img-top mb-5 mt-3" style="height: 400px;">
            </div>    
            <form class="row g-3" method="POST" enctype="multipart/form-data">  <!-- start form-->
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Product Id</label>
                        <input type="text" class="form-control" name="pid" placeholder="Name" value="<?php if (isset($row['id'])) {
                                                                                                            echo $row['id'];
                                                                                                        } ?>" readonly>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="<?php if (isset($row['name'])) {
                                                                                                            echo $row['name'];
                                                                                                        } ?>" >
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Quantity</label>
                        <input type="text" class="form-control" name="quantity" value="<?php if (isset($row['quantity'])) {
                                                                                                            echo $row['quantity'];
                                                                                                        } ?>" >
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Price</label>
                        <input type="text" class="form-control" name="price" value="<?php if (isset($row['price'])) {
                                                                                                            echo $row['price'];
                                                                                                        } ?>" >
                    </div>
                    <div class="col-md-2">
                        <label for="inputZip" class="form-label">Selling Price</label>
                        <input type="text" class="form-control" name="sprice" value="<?php if (isset($row['selling_price'])) {
                                                                                                            echo $row['selling_price'];
                                                                                                        } ?>" >
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Assign Date</label>
                        <input type="date" class="form-control" name="assign_date" value="<?php if (isset($row['dop'])) {
                                                                                                            echo $row['dop'];
                                                                                                        } ?>"  >
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Upload File</label>
                        <input type="file" class="form-control" name="myfile" value="../products_image/<?php echo $file_name; ?>">
                        <!-- <button class="btn btn-primary mt-2 ms-3" name="upload">Upload</button> -->
                    </div>
                    <div class="col-12 float-right mt-5" style=" margin-left: 480px;">
                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                        <button type="submit" class="btn btn-danger" name="close">close</button>
                    </div>
                </form>   <!-- end form-->
                <p class="mt-2"><b>Note*</b>If you want to change the image, you have to delete the then insert it as a new row.</p>
        </div> <!--end of column-->
  </div>    <!--end of row-->
</div>   <!--end of container-->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>


<?php
//To close the page
if (isset($_REQUEST['close'])) {
    echo '<script> location.href="asset.php";</script>';
}

//To update the signup table row
if(isset($_REQUEST['update'])){
    $id=$_REQUEST['pid'];
    $name = $_REQUEST['name'];
    $quantity = $_REQUEST['quantity'];
    $price = $_REQUEST['price'];
    $sprice = $_REQUEST['sprice'];
    $date = $_REQUEST['assign_date'];
    // $file_name = $_FILES['myfile']['name'];
    // $file_tmp_name = $_FILES['myfile']['tmp_name'];
    // if(move_uploaded_file($file_tmp_name,'../products_image'.$file_name)){

    $sql="UPDATE product SET name='$name', quantity='$quantity', price='$price', selling_price='$sprice', dop='$date' WHERE id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo '<script> window.alert("Data Updated Successfully")</script>';
        echo '<script> location.href="asset.php";</script>';
    }
    else{
        echo '<script> window.alert("Unable to Update")</script>';
        echo '<script> location.href="asset.php";</script>';
    }
// }
// else{
//     echo '<script> window.alert("Unable to Update file")</script>';

// }
}

?>