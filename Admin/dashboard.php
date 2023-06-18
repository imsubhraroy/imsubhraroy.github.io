<?php

session_start();
define('PAGE', 'dashboard'); //definr page value which declare in adminheader.php
define('TITLE', 'dashboard'); //define page title
include('../DBConnection.php'); //database connection
include('layout/adminheader.php');   //header file
include('layout/isadmin.php');


//Total no. of Requested service
$sql1="SELECT COUNT(id) AS total FROM servicerequest";
$result=mysqli_query($conn,$sql1);
$row=mysqli_fetch_assoc($result);
$submitrequest=$row['total'];

//Total no. of Assign service
$sql1="SELECT COUNT(rid) AS assign FROM serviceassign";
$result=mysqli_query($conn,$sql1);
$row=mysqli_fetch_assoc($result);
$assignwork=$row['assign'];

//Total no of Technician
$sql1="SELECT COUNT(id) AS emp FROM technician_tb";
$result=mysqli_query($conn,$sql1);
$row=mysqli_fetch_assoc($result);
$totaltech=$row['emp'];


?>
<div class="col-sm-9 col-md-10"> <!--Start Main column-->
  <div class="row mx-5 text-center"> <!--start of secondary row-->
    <div class="col-sm-4 mt-5"> 
      <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
        <div class="card-header">Requests Received</div>
        <div class="card-body">
          <h4 class="card-title">
            <?php echo $submitrequest; ?>
          </h4>
          <a class="btn text-white" href="user-request.php">View</a>
        </div>
      </div>
    </div>
    <div class="col-sm-4 mt-5">
      <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
        <div class="card-header">Assigned Work</div>
        <div class="card-body">
          <h4 class="card-title">
            <?php echo $assignwork; ?>
          </h4>
          <a class="btn text-white" href="work-order.php">View</a>
        </div>
      </div>
    </div>
    <div class="col-sm-4 mt-5">
      <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
        <div class="card-header">No. of Technician</div>
        <div class="card-body">
          <h4 class="card-title">
            <?php echo $totaltech; ?>
          </h4>
          <a class="btn text-white" href="technician.php">View</a>
        </div>
      </div>
    </div>
  </div> <!--end of secondary row-->
  <div class="mx-5 mt-5 text-center"> <!--start of div-->
  <p class=" bg-dark text-white p-2">List of Requesters</p>
  <?php 
    $sql="SELECT * FROM servicerequest";
    $result=mysqli_query($conn,$sql);
    if($result){
        if(mysqli_num_rows($result)>0){
            
          //Table start
            echo '
                <table class="table">
                    <thead>
                        <tr>
                            <th>Request Id</th>
                            <th>Requester Name</th>
                            <th>Requester Email</th>
                        </tr>
                    </thead> ';
                    while($rows=mysqli_fetch_assoc($result))
                     {
                     echo '<tbody>
                        <tr>
                            <td>'.$rows['id'].'</td>
                            <td>'.$rows['name'].'</td>
                            <td>'.$rows['email'].'</td>
                        </tr>
                    
            ';
            }
            echo'</tbody>
            </table>';
            //end table
          }
        else{
            echo 'No Result';
        }
    }
    else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> Something went wrong. Try again.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
  ?>
  </div> <!--end of div-->
</div>  <!--end of main column-->
</div>  <!--end of primary row-->
</div>  <!--end of main container-->

<?php include('../layout/footer.php'); ?> <!--footer-->
