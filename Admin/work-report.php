<?php

session_start();

define('PAGE', 'workreport');
define('TITLE', 'workreport');
include('../DBConnection.php');
include('layout/adminheader.php');
include('layout/isadmin.php');


//Fetching no. of service that done from servicedone table
$sql1="SELECT COUNT(id) AS total FROM servicedone";
$result=mysqli_query($conn,$sql1);
$row=mysqli_fetch_assoc($result);
$servicedone=$row['total'];

//Fetching total money from servicedone table
$sql1="SELECT sum(money) AS price FROM servicedone";
$result=mysqli_query($conn,$sql1);
$row=mysqli_fetch_assoc($result);
$totalprofit=$row['price'];

//Fetching no. of technician from technician_tb table
$sql1="SELECT COUNT(id) AS emp FROM technician_tb";
$result=mysqli_query($conn,$sql1);
$row=mysqli_fetch_assoc($result);
$totaltech=$row['emp'];

?>


<div class="col-sm-9 col-md-10">  <!--start column-->
  <div class="row mx-5 text-center">  <!--start row-->
    <div class="col-sm-4 mt-5">
      <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
        <div class="card-header">No of Technician</div>
        <div class="card-body">
          <h4 class="card-title">
            <?php echo $totaltech; ?>
          </h4>
          <a class="btn text-white" href="technician.php">View</a>
        </div>
      </div>
    </div>
    <div class="col-sm-4 mt-5">
      <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
        <div class="card-header">Service Done</div>
        <div class="card-body">
          <h4 class="card-title">
            <?php echo $servicedone; ?>
          </h4>
          <a class="btn text-white" href="workorder.php">View</a>
        </div>
      </div>
    </div>
    <div class="col-sm-4 mt-5">
      <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
        <div class="card-header">Total Profit</div>
        <div class="card-body">
          <h4 class="card-title">
            <?php echo $totalprofit; ?>
          </h4>
          <a class="btn text-white" href="technician.php">View</a>
        </div>
      </div>
    </div>
  </div> <!--end roww-->
  <div class="mx-5 mt-5 text-center"> <!--start div-->
  <p class=" bg-dark text-white p-2">List of service completed</p>
  <?php 
    $sql="SELECT * FROM servicedone";
    $result=mysqli_query($conn,$sql);
    if($result){
        if(mysqli_num_rows($result)>0){
            

          //start table
            echo '
                <table class="table">
                    <thead>
                        <tr>
                            <th>Request Id</th>
                            <th>Technician Id</th>
                            <th>Technician Name</th>
                            <th>Requester Name</th>
                            <th>Requester Email</th>
                            <th>Assign Date</th>
                            <th>File</th>
                            <th>Money</th>
                            <th>Action</th>
                        </tr>
                    </thead> ';
                    while($rows=mysqli_fetch_assoc($result))
                     {
                      $file_name=$rows['done_file'];
                     echo '<tbody>
                        <tr>
                            <td>'.$rows['request_id'].'</td>
                            <td>'.$rows['tid'].'</td>
                            <td>'.$rows['technician'].'</td>
                            <td>'.$rows['name'].'</td>
                            <td>'.$rows['email'].'</td>
                            <td>'.$rows['assign_date'].'</td>    
                            <td> <a download="'.$file_name.'" href="../Upload/'.$file_name.'">Click Here to download</a></td>
                            <td>'.$rows['money'].'</td>
                            <td><form method="POST" action=""> <input type="hidden" name="tid" value="'.$rows['id'].'"> <button class="btn btn-primary me-2" name="view"><i class="fa-solid fa-eye"></i></button><button class="btn btn-danger" name="delete"><i class="fa-solid fa-trash"></i></button> </form></td>
                        </tr>
                    
            ';
            }
            echo'</tbody>
            </table>';   //end table
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

    if(isset($_REQUEST['view'])){
        $id=$_REQUEST['tid'];
        $_SESSION['servicedone_id']=$id;

        echo '<script> location.href="view/view-done-services.php";</script>';
      
    }
    if(isset($_REQUEST['delete'])){
      $id=$_REQUEST['tid'];

      $sql="DELETE FROM servicedone WHERE id=$id";
      $result=mysqli_query($conn,$sql);
      if($result){
        echo '<script> window.alert("Data Deleted Succesfully")</script>';
        echo '<script> location.href="work-report.php";</script>';
      }
      else{
        echo '<script> window.alert("Unable to delete data")</script>';
        echo '<script> location.href="work-report.php";</script>';
      }
    }
  ?>
  </div> <!--end div-->
</div>   <!--end column-->
</div>   <!--end primary row-->
</div>   <!--end main container-->

<?php include('../layout/footer.php'); ?>   <!--footer-->
