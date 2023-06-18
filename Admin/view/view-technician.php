<?php
include('../../DBConnection.php'); //database connection
session_start();
include('../layout/isadmin.php');

 $id = $_SESSION['tid'];

//Fetching data from technician table 
$sql2 = "SELECT * FROM technician_tb WHERE id=$id";

$result2 = mysqli_query($conn, $sql2);

$row = mysqli_fetch_assoc($result2);
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>technicians</title>

    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
<div class="container pt-5" id="registration"> <!--container-->
        <h2 class="text-center">Technician</h2>
        <div class="row mt-4 mb-4 loginformwidth">  <!--row-->
            <div class="col-md-6 offset-md-3 bg-success bg-opacity-25 py-3">  <!--column-->
            <!--form-->
            <form class="row g-3" method="POST">
                <div class="col-12">
                    <label for="inputAddress2" class="form-label">Request ID</label>
                    <input type="text" class="form-control px-3" name="tid" placeholder="Request Id" value="<?php if (isset($row['id'])) {
                                                                                                            echo $row['id'];
                                                                                                        } ?>" readonly>
                </div>
                
                <div class="col-12">
                    <label for="inputAddress2" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" value="<?php if (isset($row['name'])) {
                                                                                                        echo $row['name'];
                                                                                                    } ?>">
                </div>

                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php if (isset($row['email'])) {
                                                                                        echo $row['email'];
                                                                                    } ?>">
                </div>

                <div class="col-md-6">
                    <label for="inputCity" class="form-label">City</label>
                    <input type="text" class="form-control" name="city" value="<?php if (isset($row['city'])) {
                                                                                    echo $row['city'];
                                                                                } ?>">
                </div>
                
                
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Mobile</label>
                    <input type="text" class="form-control" name="mobile" value="<?php if (isset($row['mobile'])) {
                                                                                        echo $row['mobile'];
                                                                                    } ?>">
                </div>
                   
                <div class="col-12 float-right mt-5" style=" margin-left: 480px;">
                    <button type="submit" class="btn btn-primary" name="update">Update</button>                                                               
                    <button type="submit" class="btn btn-danger" name="close">Close</button>
                </div>
            </form> <!--end form-->
        </div>  <!--end column-->
  </div>   <!--end row-->
</div> <!--end container-->

    <!--Bootstrap js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>


<?php
if (isset($_REQUEST['close'])) {
    echo '<script> location.href="../technician.php";</script>';
}

//To update technician_tb table data
if(isset($_REQUEST['update'])){
    $id=$_REQUEST['tid'];
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $city=$_REQUEST['city'];
    $mobile=$_REQUEST['mobile'];
    $sql="UPDATE technician_tb SET name='$name', email='$email', city='$city', mobile='$mobile' WHERE id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo '<script> window.alert("Data Updated Successfully")</script>';
        echo '<script> location.href="technician.php";</script>';
    }
    else{
        echo '<script> window.alert("Unable to Update")</script>';
        echo '<script> location.href="technician.php";</script>';
    }
}

?>