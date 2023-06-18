<?php
// session_start();

define('PAGE', 'changepassword');
define('TITLE', 'changepassword');
include('../DBConnection.php');
include('layout/profileheader.php');
include('layout/islogin.php');


//get the the value that store in login.php
$id = $_SESSION['is_login'];

//To update password
if (isset($_REQUEST['passupdate'])) {
    $password = $_REQUEST['password'];
    $cpassword = $_REQUEST['cpassword'];
    if ($password == $cpassword) {

        $sql = "UPDATE  signup set password=$password where id=$id";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            $passmsg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> password updated successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';

            echo '<script> location.href="userprofile.php"</script>';
        } else {
            $passmsg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> Something went wrong. Try again.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';

            echo '<script> location.href="user/userprofile.php"</script>';
        }
    }
    $passmsg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
         password did not matched.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
}

?>

<div class="col-sm-6 mt-5"> <!--start column-->
    <!--start form-->
    <form class="mx-5" method="POST">
        <div class="form-group">
            <label for="inputEmail">Enter new Pasword:</label>
            <input type="password" class="form-control" id="inputEmail" name="password" required>
        </div>
        <div class="form-group">
            <label for="inputName">Confirm Password:</label>
            <input type="password" class="form-control" id="inputName" name="cpassword" required>
        </div>
        <button type="submit" class="btn btn-danger mt-4" name="passupdate">Update</button>
        <?php if (isset($passmsg)) {
            echo $passmsg;
        } ?>
    </form>  <!--end form-->
</div>  <!--end column-->
</div>  <!--end primary row-->
</div>  <!--end main container-->

<?php include('../layout/footer.php')  ?> <!--footer-->