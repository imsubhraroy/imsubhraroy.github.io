<?php

session_start();

define('PAGE', 'sellreport');
define('TITLE', 'sellreport');
include('../DBConnection.php');
include('layout/adminheader.php');
include('layout/isadmin.php');


//Fetching no. of service that done from servicedone table
$sql1="SELECT COUNT(id) AS total FROM delivary_details";
$result=mysqli_query($conn,$sql1);
$row=mysqli_fetch_assoc($result);
$delivery_pending=$row['total'];

//Fetching total money from servicedone table
$sql1="SELECT sum(price) AS price FROM delivary_done";
$result=mysqli_query($conn,$sql1);
$row=mysqli_fetch_assoc($result);
$totalprofit=$row['price'];

//Fetching no. of technician from technician_tb table
$sql1="SELECT COUNT(id) AS delivered FROM delivary_done";
$result=mysqli_query($conn,$sql1);
$row=mysqli_fetch_assoc($result);
$delivered=$row['delivered'];

?>


<div class="col-sm-9 col-md-10">  <!--start column-->
  <div class="row mx-5 text-center">  <!--start row-->
    <div class="col-sm-4 mt-5">
      <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
        <div class="card-header">Yet To Delivery</div>
        <div class="card-body">
          <h4 class="card-title">
            <?php echo $delivery_pending; ?>
          </h4>
          <a class="btn text-white" href="booking-details.php">View</a>
        </div>
      </div>
    </div>
    <div class="col-sm-4 mt-5">
      <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
        <div class="card-header">Total Profit</div>
        <div class="card-body">
          <h4 class="card-title">
            <?php echo $totalprofit; ?>
          </h4>
          <a class="btn text-white" href="workorder.php">View</a>
        </div>
      </div>
    </div>
    <div class="col-sm-4 mt-5">
      <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
        <div class="card-header">Delivared Products</div>
        <div class="card-body">
          <h4 class="card-title">
            <?php echo $delivered; ?>
          </h4>
          <a class="btn text-white" href="technician.php">View</a>
        </div>
      </div>
    </div>
  </div> <!--end roww-->
  <div class="mx-5 mt-5 text-center"> <!--start div-->
  <p class=" bg-dark text-white p-2">List of Product Completed</p>
  <?php 
    $sql = "SELECT * FROM delivary_done";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      if (mysqli_num_rows($result) > 0) {
    
        echo '
          <table class="table table table-success table-striped">  <!-- start table-->
            <thead>
              <tr>
                <th scope="col">Delivary ID</th>
                <th scope="col">Product ID</th>
                <th scope="col">User ID</th>
                <th scope="col">Product</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Mobile</th>
                <th scope="col">Price</th>
                <th scope="col">Orderes Date</th>
                <th scope="col">Action</th>
              </tr>
            </thead>';
    
        while ($rows = mysqli_fetch_assoc($result)) {

    ?>
          <tbody>
            <tr>
              <th scope="row"> <?php if (isset($rows['did'])) {
                                  echo $rows['did'];
                                } ?> </th>
              <td><?php if (isset($rows['pid'])) {
                    echo $rows['pid'];
                  } ?></td>
              <td><?php if (isset($rows['uid'])) {
                    echo $rows['uid'];
                  } ?></td>
              <td> <a class="btn btn-primary me-2" href="../Delivary/viewproduct.php?id=<?php echo $rows['pid'] ?>"><i class="fa-solid fa-eye"></i></a>
              </td>
              <td><?php if (isset($rows['email'])) {
                    echo $rows['email'];
                  } ?></td>
              <td><a class="btn btn-primary me-2" href="../Delivary/view-address.php?id=<?php echo $rows['id'] ?>"><i class="fa-solid fa-eye"></i></a></td>
              <td><?php if (isset($rows['mobile'])) {
                    echo $rows['mobile'];
                  } ?></td>
              <td><?php if (isset($rows['price'])) {
                    echo $rows['price'];
                  } ?></td>
              <td><?php if (isset($rows['d_date'])) {
                    echo $rows['d_date'];
                  } ?></td>
              <td>
                <form method="POST" action="">
                  <input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
                  <button class="btn btn-danger" name="delete">
                  <i class="fa-solid fa-trash"></i></button>
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

  ?>
  </div> <!--end div-->
</div>   <!--end column-->
</div>   <!--end primary row-->
</div>   <!--end main container-->

<?php 

if(isset($_REQUEST['delete'])){
  $id= $_REQUEST['id'];

  $sql1="DELETE FROM delivary_done WHERE id=$id";
  $result1=mysqli_query($conn,$sql1);
  if($result1){
    echo '<script> window.alert("Data delete successfuly");</script>';
    echo '<script> location.href="sell-report.php";</script>';
  }
}

include('../layout/footer.php'); ?>   <!--footer-->
