<?php

session_start();

include('../../DBConnection.php');
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>workdone</title>

    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <div class="container pt-5" id="registration">  <!-- start container-->
        <h2 class="text-center">Assign Request</h2>
        <div class="row mt-4 mb-4 loginformwidth">  <!-- start row-->
            <div class="col-md-6 offset-md-3 bg-success bg-opacity-25 py-3">  <!-- start column-->
                <form class="row g-3" method="POST" enctype="multipart/form-data">  <!-- start form-->
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" name="quantity" >
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Price</label>
                        <input type="text" class="form-control" name="price" >
                    </div>
                    <div class="col-md-2">
                        <label for="inputZip" class="form-label">Selling Price</label>
                        <input type="text" class="form-control" name="sprice" >
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Assign Date</label>
                        <input type="date" class="form-control" name="assign_date" >
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Upload File</label>
                        <input type="file" class="form-control" name="myfile">
                        <!-- <button class="btn btn-primary mt-2 ms-3" name="upload">Upload</button> -->
                    </div>
                    <div class="col-12 float-right mt-5" style=" margin-left: 480px;">
                        <button type="submit" class="btn btn-primary" name="done">Done</button>
                        <button type="submit" class="btn btn-danger" name="close">close</button>
                    </div>
                </form>   <!-- end form-->
            </div>  <!-- end column-->
        </div>  <!-- end row-->
    </div> <!-- end container-->

    <!-- Bootstrap Js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>


<?php

//To insert data into servicedone table
if (isset($_REQUEST['done'])) {
    $name = $_REQUEST['name'];
    $quantity = $_REQUEST['quantity'];
    $price = $_REQUEST['price'];
    $sprice = $_REQUEST['sprice'];
    $date = $_REQUEST['assign_date'];
    $file_name = $_FILES['myfile']['name'];
    $file_tmp_name = $_FILES['myfile']['tmp_name'];
    if (move_uploaded_file($file_tmp_name, "../../products_image/" . $file_name)) {

        $sql = "INSERT INTO product(name,quantity,price,selling_price,dop,image) VALUES ('$name','$quantity','$price','$sprice','$date','$file_name')";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            // $sql = "DELETE FROM serviceassign where rid=$rid";   //To delete row from serviceassign table
            // $result = mysqli_query($conn, $sql);
            echo '<script> window.alert("Data Update Succesfully")</script>';
            echo '<script> location.href="../products.php";</script>';
        } else {
            echo '<script> window.alert("Unable to update data")</script>';
            echo '<script> location.href="../products.php";</script>';
        }
    } else {
        echo '<script> window.alert("Unable to upload file")</script>';
    }
}


//To close the page
if (isset($_REQUEST['close'])) {
    echo '<script> location.href="../products.php";</script>';
}

?>