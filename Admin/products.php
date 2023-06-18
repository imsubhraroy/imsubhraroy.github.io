<?php

session_start();
define('PAGE', 'assets');        //define page name
define('TITLE', 'assets');       //define page title
include('../DBConnection.php');  //database connection
include('layout/adminheader.php');      //Side navbar
include('layout/isadmin.php');

echo '<div class="col-sm-9 col-md-10">'; //Column start
echo '    <a class="btn btn-primary mt-3 mb-4" href="Add/add-product.php">Add Product</a>   <!-- add product Modal -->
              <p class=" bg-dark text-white p-2 text-center">List of Product</p>';
// include('addproduct.php');

 
//Fetching row from product table
$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql);
if ($result) {
  if (mysqli_num_rows($result) > 0) {

    //Start Table
    echo '
        <table class="table table table-success table-striped">
        <thead>
          <tr>
            <th scope="col">Product ID</th>
            <th scope="col">Name</th>
            <th scope="col">DOP</th>
            <th scope="col">Avaliable</th>
            <th scope="col">Total</th>
            <th scope="col">Original Price</th>
            <th scope="col">Selling Price</th>
            <th scope="col">Action</th>
          </tr>
        </thead>';

    while ($rows = mysqli_fetch_assoc($result)) {
?>
      <tbody>
        <tr>
          <th scope="row"> <?php if(isset($rows['id'])) { echo $rows['id']; } ?> </th>
          <th> <?php if(isset($rows['name'])) { echo $rows['name']; } ?> </th>
          <td><?php if(isset($rows['dop'])) { echo $rows['dop']; } ?></td>
          <td><?php if(isset($rows['quantity'])) { echo $rows['quantity']; } ?></td>
          <td><?php if(isset($rows['quantity'])) { echo $rows['quantity']; } ?></td>
          <td><?php if(isset($rows['price'])) { echo $rows['price']; } ?></td>
          <td><?php if(isset($rows['selling_price'])) { echo $rows['selling_price']; } ?></td>
          <td><form method="POST" action=""> <input type="hidden" name="pid" value="<?php  echo $rows['id']; ?>"> <button class="btn btn-primary me-2" name="view"><i class="fa-solid fa-eye"></i></button><button class="btn btn-danger" name="delete"><i class="fa-solid fa-trash"></i></button> </form></td>
        </tr>

  <?php }
    echo ' </tbody>
    </table>
    </div>'; //end table & End Column
  } else {
    echo 'No data found'; 
  }
} else {
  // if sql query was not executed
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> Something went wrong. Try again.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}

//view table data
if(isset($_REQUEST['view'])){
  $pid=$_REQUEST['pid'];
  $_SESSION['product_id']=$pid;
  echo '<script> location.href="view/view-product.php";</script>';
}

//Delete Table data
if(isset($_REQUEST['delete'])){
  $pid=$_REQUEST['pid'];

  $sql1="DELETE FROM product WHERE id=$pid";
  $result1=mysqli_query($conn,$sql1);
  if($result1){
    echo '<script> window.alert("Data delete successfuly");</script>';
    echo '<script> location.href="products.php";</script>';
  }
  else{
    echo '<script> window.alert("Unable to delete data");</script>';
    echo '<script> location.href="products.php";</script>';
  }
}

  ?>
  </div> <!--end row-->
</div> <!--end Main container-->
</div>
<?php include('../layout/footer.php'); ?> <!--footer-->
