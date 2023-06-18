<?php
  include('DBConnection.php');  //database connection
  session_start();


  if(isset($_REQUEST['rSignup'])){
    $name=$_REQUEST['rName'];
    $email=$_REQUEST['rEmail'];
    $password=$_REQUEST['rPassword'];

    //To check if the email already exits or not
    $sql="SELECT email from signup where email='$email'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) == 1){
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Holy guacamole!</strong> Email already exits.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }

    //To insert the data in sigup table
    else{
      $sql="INSERT INTO signup(name,email,password) VALUES('$name','$email','$password')";
      $result=mysqli_query($conn,$sql);
      echo '<script> location.href="login.php"</script>';
    }
  }
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>registration</title>

    <!--Bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>

  <div class="container pt-5" id="registration"> <!--start container-->
  <h2 class="text-center">Create an Account</h2>
  <div class="row mt-4 mb-4">   <!--start row-->
    <div class="col-md-6 offset-md-3">  <!--start column-->
    <!--start form-->
      <form action="" class="shadow-lg p-4" method="POST">
        <div class="form-group">
          <i class="fas fa-user"></i><label for="name" class="pl-2 font-weight-bold">Name</label><input type="text"
            class="form-control" placeholder="Name" name="rName" require>
        </div>
        <div class="form-group">
          <i class="fas fa-user"></i><label for="email" class="pl-2 font-weight-bold">Email</label><input type="email"
            class="form-control" placeholder="Email" name="rEmail" require>
          <!--Add text-white below if want text color white-->
          <small class="form-text">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <i class="fas fa-key"></i><label for="pass" class="pl-2 font-weight-bold">New
            Password</label><input type="password" class="form-control" placeholder="Password" id="checkpass" name="rPassword"  require>
        </div>
        <div class="form-group mt-2">
          <input type="checkbox" onclick="showpass()">Show Password</input>
        </div>
        <button type="submit" class="btn btn-danger mt-5 btn-block shadow-sm font-weight-bold"  name="rSignup">Sign Up</button>
        <em style="font-size:10px;">Note - By clicking Sign Up, you agree to our Terms, Data
          Policy and Cookie Policy.</em>
      </form> <!--end form-->
    </div>  <!--end column-->
  </div>  <!--end row-->
</div> <!--end container-->

  <!--Bootstrap Js-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

  <!--custom Js-->
  <script src="JS/custom.js"></script>
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