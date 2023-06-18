<?php 

include('layout/islogin.php');

//fetching service assign table row
    $sql1="SELECT * FROM serviceassign where rid=$rid and uid=$uid";
    $result2=mysqli_query($conn,$sql1);
    if($result2)
    {
        if(mysqli_num_rows($result2)>0){
            $row=mysqli_fetch_assoc($result2); ?>
                <h3 class="text-center mt-5">Assigned Work Details</h3>
                <!--start table--->
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Request ID</td>
                            <td>
                                <?php if (isset($row['rid'])) {
                                    echo $row['rid'];
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Request Info</td>
                            <td>
                                <?php if (isset($row['request_info'])) {
                                    echo $row['request_info'];
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Request Description</td>
                            <td>
                                <?php if (isset($row['request_desc'])) {
                                    echo $row['request_desc'];
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>
                                <?php if (isset($row['name'])) {
                                    echo $row['name'];
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Address Line 1</td>
                            <td>
                                <?php if (isset($row['add1'])) {
                                    echo $row['add1'];
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Address Line 2</td>
                            <td>
                                <?php if (isset($ro['add2'])) {
                                    echo $row['add2'];
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>
                                <?php if (isset($row['city'])) {
                                    echo $row['city'];
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>State</td>
                            <td>
                                <?php if (isset($row['state'])) {
                                    echo $row['state'];
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Pin Code</td>
                            <td>
                                <?php if (isset($row['zip'])) {
                                    echo $row['zip'];
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                <?php if (isset($row['email'])) {
                                    echo $row['email'];
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Mobile</td>
                            <td>
                                <?php if (isset($row['mobile'])) {
                                    echo $row['mobile'];
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Assigned Date</td>
                            <td>
                                <?php if (isset($row['assign_date'])) {
                                    echo $row['assign_date'];
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Technician Name</td>
                            <td><?php if (isset($row['technician'])) {
                                    echo $row['technician'];
                                } ?></td>
                        </tr>
                        <tr>
                            <td>Customer Sign</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Technician Sign</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>  <!-- end table-->
                <div class="text-center">
                    <form class="d-print-none d-inline mr-3"><input class="btn btn-primary" type="submit" value="Print" onClick="window.print()"></form>
                    <form class="d-print-none d-inline" action="#"><input class="btn btn-success" type="submit" value="Request Approve"></form>
                    <form class="d-print-none d-inline" action="#"><input type="hidden" name="id" value="<?php
                                                                                                echo $row['rid'];
                                                                                                ?>"><input class="btn btn-danger" name="delete" type="submit" value="Cancel Request"></form>
                </div>
                


       <?php 
        //To delete row from requestassign table
            if(isset($_REQUEST['delete'])){
                $id=$_REQUEST['rid'];
                $sql3="DELETE FROM serviceassign WHERE rid=$id";
                $res=mysqli_query($conn,$sql3);
                if($res){
                    echo '<script> location.href="checkstatus.php"</script>';
                }
                else{
                    $msg='<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    <strong>Holy guacamole!</strong> Unable to submit request, Try again after some times.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
            }                    
                                
    }
        else{
            echo '<div class="mt-3">No data found</div>';
        }
    }
    else{
        echo '<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        <strong>Holy guacamole!</strong> Unable to submit request, Try again after some times.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }

?>

