<?php
session_start();

define('PAGE', 'request');
define('TITLE', 'request');
include('../DBConnection.php');
include('layout/adminheader.php');
include('layout/isadmin.php');


echo ' <div class="col-sm-4 mb-5 mt-4">'; //start column

//Fetching all data from servicerequest 
$sql = "SELECT * FROM servicerequest";
$result = mysqli_query($conn, $sql);
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($rows = mysqli_fetch_assoc($result)) {
?>
            <!--start card-->
            <div class="card mt-3">
                <h5 class="card-header">Request ID: <?php echo $rows['id'];  ?></h5>
                <div class="card-body">
                    <p class="card-text">Request Info: <?php echo $rows['request_info'];  ?></p>
                    <p class="card-text"><?php echo $rows['request_desription'];  ?></p>
                    <p class="card-text">Request Date: <?php echo $rows['rdate'];  ?></p>
                    <form action="" style=" margin-left: 300px;" method="POST"> <input type="hidden" name="rid" value="<?php echo $rows['id']; ?>"><input type="submit" class="btn btn-danger me-2" name="view" value="View">
                    <!-- <input type="submit" class="btn btn-secondary" name="close" value="Close"> -->
                </form>

                </div>
            </div>
            <!--end card-->
           
<?php }
    }
}
?>


    </div>   <!--End column-->
    <?php
        if (isset($_REQUEST['close'])) {
            $id = $_REQUEST['rid'];

            $sql = "DELETE FROM servicerequest where id=$id";   //To delete row from servicerequest table
            $result = mysqli_query($conn, $sql);
        }
    ?>

<!--start jumbotron-->
<div class="col-sm-5 jumbotron mt-5 ms-4 bg-success bg-opacity-25">
    <?php include('assignwork.php');  ?>
    <!--Assignwork.php page-->
</div>
<!--end jumbtron-->
</div>
<!--end primary row-->
</div>
<!--end main container-->



<?php include('../layout/footer.php'); ?>
<!--footter-->