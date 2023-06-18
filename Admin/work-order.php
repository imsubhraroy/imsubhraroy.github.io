<?php

session_start();

define('PAGE', 'work');
define('TITLE', 'workorder');
include('../DBConnection.php');
include('layout/adminheader.php');
include('layout/isadmin.php');


//Fetching serviceassign table data
$sql = "SELECT * FROM serviceassign";
$result = mysqli_query($conn, $sql);
if ($result) {
  if (mysqli_num_rows($result) > 0) {

    echo '<div class="col-sm-9 col-md-10">      <!--start column-->
      <p class=" bg-dark text-white p-2 text-center">List of Work Order</p>
      <table class="table table table-success table-striped">   <!--start table-->
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
          <th scope="row"> <?php if(isset($rows['rid'])) { echo $rows['rid']; } ?> </th>
          <td><?php if(isset($rows['request_info'])) { echo $rows['request_info']; } ?></td>
          <td><?php if(isset($rows['request_desc'])) { echo $rows['request_desc']; } ?></td>
          <td><?php if(isset($rows['email'])) { echo $rows['email']; } ?></td>
          <td><?php if(isset($rows['state'])) { echo $rows['state']; } ?></td>
          <td><?php if(isset($rows['mobile'])) { echo $rows['mobile']; } ?></td>
          <td><?php if(isset($rows['technician'])) { echo $rows['technician']; } ?></td>
          <td><?php if(isset($rows['assign_date'])) { echo $rows['assign_date']; } ?></td>
          <td><form method="POST" action=""> <input type="hidden" name="rid" value="<?php  echo $rows['rid']; ?>"> <button class="btn btn-primary me-2" name="view"><i class="fa-solid fa-eye"></i></button><button class="btn btn-danger" name="delete"><i class="fa-solid fa-trash"></i></button> </form></td>
        </tr>

  <?php }
    echo ' </tbody>
    </table>   <!--end table-->
    </div>     <!--end column-->
  </div>       <!--end primary row-->
  </div>';     // end main container
  } else {
    echo 'No data found';
  }
} else {
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> Something went wrong. Try again.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}


//To view serviceassign table row
if(isset($_REQUEST['view'])){
  $viewid=$_REQUEST['rid'];
  $_SESSION['viewid']=$viewid;

  echo '<script> location.href="view/view-assignwork.php";</script>';
}


//To delete serviceassign table row
if(isset($_REQUEST['delete'])){
  $rid=$_REQUEST['rid'];

  $sql1="DELETE FROM serviceassign WHERE rid=$rid";
  $result1=mysqli_query($conn,$sql1);
  if($result1){
    echo '<script> window.alert("Data delete successfuly");</script>';
    echo '<script> location.href="work-order.php";</script>';
  }
}

  ?>

  <?php include('../layout/footer.php'); ?>