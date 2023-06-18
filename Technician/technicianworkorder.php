<?php

session_start();

define('PAGE', 'work');
define('TITLE', 'workorder');
include('../DBConnection.php');
include('technicianheader.php');
include('istechnician.php');

$id = $_SESSION['is_technician'];

//Fetching technician_tb table data
$sql = "SELECT name FROM technician_tb where id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$tname = $row['name'];

if (!isset($_REQUEST['view'])) {
  $sql = "SELECT * FROM serviceassign where technician='$tname'";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    if (mysqli_num_rows($result) > 0) {

      echo '<div class="col-sm-9 col-md-10 mt-2">                  <!-- start column-->
      <table class="table table table-success table-striped">  <!-- start table-->
        <thead>
          <tr>
            <th scope="col">Request ID</th>
            <th scope="col">Request INFO</th>
            <th scope="col">Request Desc</th>
            <th scope="col">Email</th>
            <th scope="col">State</th>
            <th scope="col">Mobile</th>
            <th scope="col">Technician</th>
            <th scope="col">Assign Date</th>
            <th scope="col">Action</th>
          </tr>
        </thead>';

      while ($rows = mysqli_fetch_assoc($result)) {
?>
        <tbody>
          <tr>
            <th scope="row"> <?php if (isset($rows['rid'])) {
                                echo $rows['rid'];
                              } ?> </th>
            <td><?php if (isset($rows['request_info'])) {
                  echo $rows['request_info'];
                } ?></td>
            <td><?php if (isset($rows['request_desc'])) {
                  echo $rows['request_desc'];
                } ?></td>
            <td><?php if (isset($rows['email'])) {
                  echo $rows['email'];
                } ?></td>
            <td><?php if (isset($rows['state'])) {
                  echo $rows['state'];
                } ?></td>
            <td><?php if (isset($rows['mobile'])) {
                  echo $rows['mobile'];
                } ?></td>
            <td><?php if (isset($rows['technician'])) {
                  echo $rows['technician'];
                } ?></td>
            <td><?php if (isset($rows['assign_date'])) {
                  echo $rows['assign_date'];
                } ?></td>
            <td>
              <form method="POST" action="">
                <input type="hidden" name="rid" value="<?php echo $rows['rid']; ?>">
                <button class="btn btn-primary me-2" name="view"><i class="fa-solid fa-eye"></i></button>
                <button class="btn btn-success" name="done">
                  <ion-icon name="checkmark-circle-outline" style="font-size :14px; margin-top:5px;"></ion-icon>
                </button>
              </form>
            </td>
          </tr>

  <?php }
      echo ' </tbody>
    </table>
    '; // end table
    } else {
      echo 'No data found';
    }
  } else {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> Something went wrong. Try again.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
  }
}

//To view table row
if (isset($_REQUEST['view'])) {
  $tviewid = $_REQUEST['rid'];
  $_SESSION['tviewid'] = $tviewid;
  include('viewwork.php');
}

//To submit table data
if (isset($_REQUEST['done'])) {
  $tviewid = $_REQUEST['rid'];
  $_SESSION['tviewid'] = $tviewid;
  echo '<script> location.href="workdone.php";</script>';
}

  ?>
  </div>
  </div>
  </div>

  <?php include('../layout/footer.php'); ?>