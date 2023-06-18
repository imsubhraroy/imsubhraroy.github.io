<?php
    session_start();
    include('DBConnection.php');
    // include('user/layout/islogin.php');

    if(isset($_REQUEST['contact'])){
        $fname=$_REQUEST['fname'];
        $lname=$_REQUEST['lname'];
        $email=$_REQUEST['email'];
        $phone=$_REQUEST['phone'];
        $description=$_REQUEST['description'];
        $uid=$_SESSION['is_login'];

        $sql="INSERT INTO contact (uid,First_Name,Last_Name,Email,Phone_Number,Description) VALUES($uid,'$fname','$lname','$email','$phone','$description')";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo '<script> location.href="index.php"</script>';
        }
        else{
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> Something went wrong. Try again.
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
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <div class="container pt-5" id="registration">
        <h2 class="text-center">Contact Us</h2>
        <div class="row mt-4 mb-4">
            <div class="col-md-6 offset-md-3">
                <form action="" class="shadow-lg p-4" method="POST">
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="fname" class="pl-2 font-weight-bold">First Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control mb-4" name="fname" placeholder="Enter your First name" aria-label="First name" require>
                            </div>
                            <div class="col">
                                <label for="lname" class="pl-2 font-weight-bold">Last Name<span class="text-danger">*</span> </label>
                                <input type="text" class="form-control mb-4" name="lname" placeholder="Enter your Last name" aria-label="Last name" require>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="email" class="pl-2 font-weight-bold">Email<span class="text-danger">*</span></label>
                                <input type="email" class="form-control mb-4" name="email" placeholder="Emaill" aria-label="email" require>
                            </div>
                            <div class="col">
                                <label for="phpne" class="pl-2 font-weight-bold">Mobile Number<span class="text-danger">*</span></label>
                                <input type="text" class="form-control mb-4" name="phone" placeholder="Enter your Mobile Number" aria-label="phone" require>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="description" class="pl-2 font-weight-bold">Description</label>
                                    <textarea class="form-control mb-4" name="description" placeholder="Enter the Description" aria-label="description"></textarea>
                                </div>
                            </div>
                            <!--Add text-white below if want text color white-->
                        </div>
                        <button type="submit" class="btn btn-danger mt-5 btn-block shadow-sm font-weight-bold" name="contact">Contact Us</button>

                        <!-- <?php if (isset($regmsg)) {
                                    echo $regmsg;
                                } ?> -->
                </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>