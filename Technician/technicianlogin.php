<?php
    include('../DBConnection.php');

    session_start();

    if(isset($_REQUEST['tlogin'])){
        $email=$_REQUEST['tEmail'];
        $pass=$_REQUEST['tPassword'];

        $sql="SELECT id FROM technician_tb WHERE email='$email' and pass='$pass'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) == 1){
            $rows=mysqli_fetch_assoc($result);
            $_SESSION['is_technician']=$rows['id'];
            echo '<script> location.href="technicianworkorder.php"</script>';
        }
        else{
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> Enter Email or Password correctly.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }

    }
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- custom css -->
    <link rel="stylesheet" href="CSS/custom.css">
</head>

<body>
    <div class="container pt-5" id="registration">  <!-- start container-->
        <h2 class="text-center">Login To Your Account</h2>
        <div class="row mt-4 mb-4 loginformwidth"> <!-- start row-->
            <div class="col-md-6 offset-md-3">     <!--start column-->
            <!--start form-->
                <form action="" class="shadow-lg p-4" method="POST">
                    <div class="form-group mb-4">
                        <i class="fas fa-user"></i><label for="email" class="pl-2 font-weight-bold">Email</label><input type="email" class="form-control" placeholder="Email" name="tEmail" require>
                        <!--Add text-white below if want text color white-->
                    </div>
                    <div class="form-group">
                        <i class="fas fa-key"></i><label for="pass" class="pl-2 font-weight-bold">New
                            Password</label><input type="password" class="form-control" placeholder="Password" name="tPassword" require>
                    </div>
                    <div class="login">
                            <div>
                            <button type="submit" class="btn btn-danger forlgbtn mt-3" name="tlogin" style="margin-left:450px ;">Login</button>
                            </div>
                        <!--Add text-white below if want text color white-->
                    </div>
                    <!-- <?php if (isset($regmsg)) {
                                echo $regmsg;
                            } ?> -->
                </form>  <!-- end form-->
            </div>   <!-- end column-->
        </div>   <!-- end row-->
    </div>  <!-- end container-->

    <!-- Bootstrap Js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>