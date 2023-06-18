<?php

define('PAGE', 'userprofile');
define('TITLE', 'userprofile');
include('../DBConnection.php');
include('layout/profileheader.php');
include('layout/islogin.php');

$id = $_SESSION['is_login'];

//fetching row from signup table
$sql1 = "SELECT name,email FROM signup WHERE id=$id";
$result1 = mysqli_query($conn, $sql1);
if (mysqli_num_rows($result1) > 0) {
    $rows = mysqli_fetch_assoc($result1);
    $email = $rows['email'];
    $name = $rows['name'];
}

//To update user name
if (isset($_REQUEST['nameupdate'])) {
    $name = $_REQUEST['rName'];

    $sql = "UPDATE  signup set Name='$name' where id=$id";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        $passmsg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> Name updated successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';

        echo '<script> location.href="userprofile.php"</script>';
    } else {
        $passmsg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> Something went wrong. Try again.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';

        echo '<script> location.href="userprofile.php"</script>';
    }
}

?>

<div class="col-sm-6 mt-5">
    <!--start column-->
    <!--start form-->
    <form class="mx-5" method="POST">
        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail" value=" <?php echo $email; ?>" disabled>
        </div>
        <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" class="form-control" id="inputName" name="rName" value=" <?php echo $name; ?>">
        </div>
        <button type="submit" class="btn btn-danger mt-4" onclick="checkname()" name="nameupdate">Update</button>
        <?php if (isset($passmsg)) {
            echo $passmsg;
        } ?>
    </form>
    <!--end form-->
</div>
<!--end column-->
</div>
<!--end primary row-->
</div> <!-- end main container-->

<?php include('../layout/footer.php')  ?>