<?php

session_start();

define('PAGE', 'bookingdetails');
define('TITLE', 'Booking-Details');
include('../DBConnection.php');
include('layout/adminheader.php');


$sql = "SELECT * FROM delivary_details";
$result = mysqli_query($conn, $sql);
if ($result) {
  if (mysqli_num_rows($result) > 0) {

    echo '<div class="col-sm-9 col-md-10">                  <!-- start column-->
    <p class=" bg-dark text-white p-2 text-center">List of Products that has been purchase but yet to delivary</p>
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

      $did = $rows['id'];
      $pid = $rows['pid'];
      $uid = $rows['uid'];
      $u_name = $rows['u_name'];
      $p_price = $rows['p_price'];
      $u_email = $rows['u_email'];
      $u_add1 = $rows['u_add1'];
      $u_add2 = $rows['u_add2'];
      $u_city = $rows['u_city'];
      $u_state = $rows['u_state'];
      $u_zip = $rows['u_zip'];
      $u_mobile = $rows['u_mobile'];
      $o_date = $rows['o_date'];
?>
      <tbody>
        <tr>
          <th scope="row"> <?php if (isset($rows['id'])) {
                              echo $rows['id'];
                            } ?> </th>
          <td><?php if (isset($rows['pid'])) {
                echo $rows['pid'];
              } ?></td>
          <td><?php if (isset($rows['uid'])) {
                echo $rows['uid'];
              } ?></td>
          <td> <a class="btn btn-primary me-2" href="../Delivary/viewproduct.php?id=<?php echo $rows['pid'] ?>"><i class="fa-solid fa-eye"></i></a>
          </td>
          <td><?php if (isset($rows['u_email'])) {
                echo $rows['u_email'];
              } ?></td>
          <td><a class="btn btn-primary me-2" href="../Delivary/view-address.php?id=<?php echo $rows['id'] ?>"><i class="fa-solid fa-eye"></i></a></td>
          <td><?php if (isset($rows['u_mobile'])) {
                echo $rows['u_mobile'];
              } ?></td>
          <td><?php if (isset($rows['p_price'])) {
                echo $rows['p_price'];
              } ?></td>
          <td><?php if (isset($rows['o_date'])) {
                echo $rows['o_date'];
              } ?></td>
          <td>
            <form method="POST" action="">
              <input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
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

//To submit table data
if (isset($_REQUEST['done'])) {


  $d_date = date("Y-m-d");

  $sql = "INSERT INTO delivary_done (did,pid,uid,name,price,email,add1,add2,city,state,zip,mobile,d_date,delivary_date) VALUES ($did,$pid,$uid,'$u_name','$p_price','$u_email','$u_add1','$u_add2','$u_city','$u_state','$u_zip','$u_mobile','$o_date','$d_date')";

  $result = mysqli_query($conn, $sql);
  if ($result) {
    $sql = "DELETE FROM delivary_details where id=$did";
    $result1 = mysqli_query($conn, $sql);

    echo '<script>location.href="booking-details.php"</script>';
  }
}

  ?>
  </div>
  </div>
  </div>

  <?php include('../layout/footer.php'); ?>