<?php

session_start();

define('PAGE', 'technician');  //definr page value which declare in adminheader.php
define('TITLE', 'technician'); //define page title
include('../DBConnection.php'); //database connection
include('layout/adminheader.php');
include('layout/isadmin.php');

echo '<div class="col-sm-9 col-md-10">'; //start column
include('Add/add-technician.php');            //add technician modal
echo '  <p class=" bg-dark text-white p-2 text-center">List of Technician</p>'; 


//Fetching technician table data
$sql = "SELECT * FROM technician_tb";
$result = mysqli_query($conn, $sql);
if ($result) {
  if (mysqli_num_rows($result) > 0) {

    //start table
    echo '
        <table class="table table table-success table-striped">
        <thead>
          <tr>
            <th scope="col">Emp ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">City</th>
            <th scope="col">Mobile</th>
            <th scope="col">Action</th>
          </tr>
        </thead>';

    while ($rows = mysqli_fetch_assoc($result)) {
?>
      <tbody>
        <tr>
          <th scope="row"> <?php if(isset($rows['id'])) { echo $rows['id']; } ?> </th>
          <th> <?php if(isset($rows['name'])) { echo $rows['name']; } ?> </th>
          <td><?php if(isset($rows['email'])) { echo $rows['email']; } ?></td>
          <td><?php if(isset($rows['city'])) { echo $rows['city']; } ?></td>
          <td><?php if(isset($rows['mobile'])) { echo $rows['mobile']; } ?></td>
          <td><form method="POST" action=""> <input type="hidden" name="tid" value="<?php  echo $rows['id']; ?>"> <button class="btn btn-primary me-2" name="view"><i class="fa-solid fa-eye"></i></button><button class="btn btn-danger" name="delete"><i class="fa-solid fa-trash"></i></button> </form></td>
        </tr>

  <?php }
    echo ' </tbody>
    </table>
    </div>
  '; //end table & end column
  } else {
    echo 'No data found';
  }
} else {
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> Something went wrong. Try again.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}

//For view table data
if(isset($_REQUEST['view'])){
  $tid=$_REQUEST['tid'];
  $_SESSION['tid']=$tid;
  echo '<script> location.href="view/view-technician.php";</script>';
}

//For delete table data
if(isset($_REQUEST['delete'])){
  $tid=$_REQUEST['tid'];

  $sql1="DELETE FROM technician_tb WHERE id=$tid";
  $result1=mysqli_query($conn,$sql1);
  if($result1){
    echo '<script> window.alert("Data delete successfuly");</script>';
    echo '<script> location.href="technician.php";</script>';
  }
  else{
    echo '<script> window.alert("Unable to delete data");</script>';
    echo '<script> location.href="technician.php";</script>';
  }
}

  ?>
  </div> <!--end primary row-->
  </div> <!--end main container-->

  <?php include('../layout/footer.php'); ?>  <!--footer-->