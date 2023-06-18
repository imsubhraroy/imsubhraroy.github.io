<?php
define('PAGE', 'servicedone');
define('TITLE', 'servicedone');
include('../DBConnection.php');
include('layout/profileheader.php');

// session_start();
echo '<div class="col-sm-9 col-md-10 mt-5 ms-5">
    <div>
        <p class="mb-5"><b>Note:</b><small> Shows only services that are completed by our Technicians</small></p>
    </div>';

$uid=$_SESSION['is_login'];

$sql="SELECT * from servicedone where uid=$uid";
$result=mysqli_query($conn,$sql);

while($rows=mysqli_fetch_assoc($result)){
 ?>
        <div class="row shadow py-2">
            <div class="col-md-1">
                <p><?php echo $rows['request_id'] ?></p>
            </div>
            <div class="col-md-2">
                <p><?php echo $rows['request_info'] ?></p>
            </div>
            <div class="col-md-2">
                <p><?php echo $rows['request_desc'] ?></p>
            </div>
            <div class="col-md-2">
                <p><?php echo $rows['technician'] ?></p>
            </div>
            <div class="col-md-2">
                <p>$<?php  echo $rows['money'] ?></p>
            </div>
            <div class="col-md-1">
                <p><?php echo $rows['assign_date'] ?></p>
            </div>
            <div class="col-md-auto">
                 <a download="<?php echo $rows['done_file'];  ?>" href="../Upload/<?php echo $rows['done_file']; ?>">Click Here to download</a>
            </div>
        </div>
    <?php } ?>
    </div> <!-- end column-->
    </div> <!-- end primary row-->
    </div> <!-- end main container-->

    <?php include('../layout/footer.php') //footer
    ?>