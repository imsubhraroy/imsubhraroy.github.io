<?php
    include('DBConnection.php'); //database connection
    session_start();

    //To check the value is present in the signup table or not
    if(isset($_REQUEST['rlogin'])){
        $email=$_REQUEST['rEmail'];
        $pass=$_REQUEST['rPassword'];

        $sql="SELECT id FROM signup WHERE Email='$email' and Password='$pass'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) == 1){
            $rows=mysqli_fetch_assoc($result);
            $_SESSION['is_login']=$rows['id'];
            if($email == 'admin@gmail.com' && $pass == 'admin123'){
                $_SESSION['is_admin']=$rows['id'];
                echo '<script> location.href="Admin/dashboard.php"</script>';
            }
            echo '<script> location.href="index.php"</script>';
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

    <!-- custom css -->
    <link rel="stylesheet" href="CSS/custom.css">
    
    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    

</head>

<body>
    <div class="container pt-5" id="registration"> <!--start container-->
        <h2 class="text-center">Login To Your Account</h2>
        <div class="row mt-4 mb-4 loginformwidth">  <!--start row-->
            <div class="col-md-6 offset-md-3 col-sm-auto">    <!--start column-->            
            <!--start form-->
                <form action="" class="shadow-lg p-4" method="POST">
                    <div class="form-group mb-4">
                        <i class="fas fa-user"></i><label for="email" class="pl-2 font-weight-bold">Email</label><input type="email" class="form-control" placeholder="Email" name="rEmail" require>
                        <!--Add text-white below if want text color white-->
                    </div>
                    <div class="form-group">
                        <i class="fas fa-key"></i><label for="pass" class="pl-2 font-weight-bold">New
                            Password</label><input type="password" class="form-control" id="checkpass" placeholder="Password" name="rPassword" require>
                    </div>
                    <div class="form-group mt-2">
                        <input type="checkbox"  onclick="showpass()">Show Password</input>
                    </div>
                    <div class="login">
                            <a class="mt-5 text-primary forforgetpass" href="#">Forget Password?</a>
                            <div>
                            <button type="submit" class="btn btn-danger  forlgbtn ms-5" name="rlogin">Login</button>
                            </div>
                        <!--Add text-white below if want text color white-->
                    </div>

                </form> <!--end form-->
            </div>  <!--end column-->
        </div>  <!--end row-->
    </div>  <!--end container-->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    
    <script>
        function showpass()
        {
            let show = document.getElementById("checkpass");

            if(show.type == "password"){
                show.type = "text";
            }
            else{
                show.type = "password";
            }
        }
    </script>
</body>

</html>