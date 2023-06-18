<?php

include('../DBConnection.php'); //database connection
include('layout/isadmin.php');


//To insert row into technician_tb
if (isset($_REQUEST['addemp'])) {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $city = $_REQUEST['city'];
    $mobile = $_REQUEST['mobile'];
    $pass = $_REQUEST['pass'];

    $sql = "INSERT INTO technician_tb(name,email,city,mobile,pass) VALUES ('$name','$email','$city','$mobile','$pass')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script> location.href="technician.php"</script>';
    } else {
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
    <title>addtechnician</title>


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- custom css -->
    <link rel="stylesheet" href="../CSS/custom.css">

</head>

<body>

    <!-- Modal Start -->
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">ADD Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- form start -->
                <form action="" method="POST">
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="form3"> Emp Name</label>
                            <input type="text" id="form3" class="form-control validate" name="name" required>
                            <div class="md-form mb-2">
                                <label data-error="wrong" data-success="right" for="form3">Email</label>

                                <input type="email" id="form3" class="form-control validate" name="email" required>
                            </div>
                            <div class="md-form mb-2">
                                <label data-error="wrong" data-success="right" for="form3">City</label>

                                <input type="text" id="form3" class="form-control validate" name="city" required>
                            </div>
                            <div class="md-form mb-2">
                                <label data-error="wrong" data-success="right" for="form3">Mobile</label>

                                <input type="text" id="form3" class="form-control validate" name="mobile" required>
                            </div>
                            <div class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="form3">Password</label>

                                <input type="password" id="form3" class="form-control validate" name="pass" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" type="submit" name="addemp" data-bs-toggle="modal">ADD</button>
                        </div>
                    </div>
                </form>
                <!-- form end -->
            </div>
        </div>
    </div>
    <!-- Modal end -->

    <!-- Link for modal -->
    <a class="btn btn-primary mt-3 mb-4" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Add Employee</a>

    <!-- Bootstrap Js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>

</html>