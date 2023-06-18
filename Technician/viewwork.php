<?php

if(!isset($_SESSION['is_technician'])){
    header('location: technicianlogin.php');
}

$tid=$_SESSION['tviewid'];

//Fetching serviceassign table data
$sql1="SELECT * FROM serviceassign where rid=$tid";
$result = mysqli_query($conn, $sql1);
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $rows = mysqli_fetch_assoc($result);
?>
        <div class="col-sm-9 col-md-10">   <!-- start column-->
        <h3 class="text-center mt-5">Assigned Work Details</h3>
        <table class="table table-bordered">  <!-- start table-->
            <tbody>
                <tr>
                    <td>Request ID</td>
                    <td>
                        <?php if (isset($rows['rid'])) {
                            echo $rows['rid'];
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td>Request Info</td>
                    <td>
                        <?php if (isset($rows['request_info'])) {
                            echo $rows['request_info'];
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td>Request Description</td>
                    <td>
                        <?php if (isset($rows['request_desc'])) {
                            echo $rows['request_desc'];
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>
                        <?php if (isset($rows['name'])) {
                            echo $rows['name'];
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td>Address Line 1</td>
                    <td>
                        <?php if (isset($rows['add1'])) {
                            echo $rows['add1'];
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td>Address Line 2</td>
                    <td>
                        <?php if (isset($rows['add2'])) {
                            echo $rows['add2'];
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td>City</td>
                    <td>
                        <?php if (isset($rows['city'])) {
                            echo $rows['city'];
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td>State</td>
                    <td>
                        <?php if (isset($rows['state'])) {
                            echo $rows['state'];
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td>Pin Code</td>
                    <td>
                        <?php if (isset($rows['zip'])) {
                            echo $rows['zip'];
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <?php if (isset($rows['email'])) {
                            echo $rows['email'];
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td>Mobile</td>
                    <td>
                        <?php if (isset($rows['mobile'])) {
                            echo $rows['mobile'];
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td>Requested Date</td>
                    <td>
                        <?php if (isset($rows['assign_date'])) {
                            echo $rows['assign_date'];
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td>Pay Rs.</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Technician Sign</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Customer Sign</td>
                    <td></td>
                </tr>

            </tbody>
        </table> <!-- end table-->
        <div class="text-center">
            <form class="d-print-none d-inline mr-3"><input class="btn btn-primary" type="submit" value="Print" onClick="window.print()"></form>
            <form class="d-print-none d-inline" action="#"> <input type="hidden" name="id" value="<?php
                                                                                                    echo $rows['rid'];
                                                                                                    ?>"> <input class="btn btn-danger" type="submit" name="close" value="close"></form>
        </div>
        </div>  <!-- end column-->
<?php }
}


//To close the table
if(isset($_REQUEST['close'])){
    echo '<script> location.href="technicianworkorder.php";</script>';

}
?>