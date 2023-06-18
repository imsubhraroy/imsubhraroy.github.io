<?php
include('../../DBConnection.php'); //Database connection
session_start();
include('../layout/isadmin.php');


$id = $_SESSION['uid'];

//Fetching signup table row
$sql2 = "SELECT * FROM signup WHERE id=$id";

$result2 = mysqli_query($conn, $sql2);

$row = mysqli_fetch_assoc($result2);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>requester</title>

    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
<div class="container pt-5" id="registration"> <!--start of container-->
        <h2 class="text-center">Requester</h2>
        <div class="row mt-4 mb-4 loginformwidth"> <!--start of row-->
            <div class="col-md-6 offset-md-3 bg-success bg-opacity-25 py-3"> <!--start of column-->
            <!--start of form-->    
            <form class="row g-3" method="POST">
                <div class="col-12">
                    <label for="inputAddress2" class="form-label">ID</label>
                    <input type="text" class="form-control px-3" name="uid" placeholder="Request Id" value="<?php if (isset($row['id'])) {
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
                   
                <div class="col-12 float-right mt-5" style=" margin-left: 480px;">
                    <button type="submit" class="btn btn-primary" name="update">Update</button>                                                               
                    <button type="submit" class="btn btn-danger" name="close">Close</button>
                </div>
            </form> <!--end of form-->
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
    echo '<script> location.href="requester.php";</script>';
}

//To update the signup table row
if(isset($_REQUEST['update'])){
    $id=$_REQUEST['uid'];
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $sql="UPDATE signup SET name='$name', email='$email' WHERE id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo '<script> window.alert("Data Updated Successfully")</script>';
        echo '<script> location.href="requester.php";</script>';
    }
    else{
        echo '<script> window.alert("Unable to Update")</script>';
        echo '<script> location.href="requester.php";</script>';
    }
}

?>