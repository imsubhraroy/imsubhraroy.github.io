<?php
define('PAGE', 'checkstatus');
define('TITLE', 'checkstatus');
include('../DBConnection.php');
include('layout/profileheader.php');

// session_start();


//enter id section
if (isset($_SESSION['is_login'])) { ?>
    <div class="col-sm-9 col-md-10">
        <?php if (!isset($_REQUEST['status'])) { ?>
            <div class="col-sm-6 mt-5 me-5 mb-5">
                <form class="mx-5" method="POST">
                    <div class="form-group">
                        <label for="inputEmail">Enter Your Request ID:</label>
                        <input type="text" class="form-control" id="inputEmail" name="requestid" onkeypress="isInputNumber(event)" required>
                    </div>
                    <button type="submit" class="btn btn-danger mt-4" name="status">Search</button>

                </form>
            </div>
            <?php }
    } else {
        echo '<script> window.alert("You are not login")</script>';
        echo '<script> location.href="index.php"</script>';
    }

    //Fetching row from serviceassign table
    if (isset($_REQUEST['status'])) {
        $rid = $_REQUEST['requestid'];
        $uid = $_SESSION['is_login'];

        $sql = "SELECT * FROM servicerequest WHERE  uid=$uid AND id=$rid";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $rows = mysqli_fetch_assoc($result);
            ?>

                <h3 class="text-center mt-5">Assigned Work Details</h3>
                <!-- start table-->
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Request ID</td>
                            <td>
                                <?php if (isset($rows['id'])) {
                                    echo $rows['id'];
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
                                <?php if (isset($rows['request_desription'])) {
                                    echo $rows['request_desription'];
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
                                <?php if (isset($rows['rdate'])) {
                                    echo $rows['rdate'];
                                } ?>
                            </td>
                        </tr>

                    </tbody>
                </table>   <!--end table-->
                <div class="text-center mb-5">
                    <form class="d-print-none d-inline mr-3 "><input class="btn btn-primary" type="submit" value="Print" onClick="window.print()"></form>
                    <form class="d-print-none d-inline " action="#">
                        <p class="btn btn-warning mt-3">Request Pending</p>
                    </form>
                    <form class="d-print-none d-inline " action="#"> <input type="hidden" name="id" value="<?php
                                                                                                            echo $rows['id'];
                                                                                                            ?>"> <input class="btn btn-danger" type="submit" name="cancel" value="Cancel Request"></form>
                </div>

    <?php } else {
                include('approve-request.php');
            }
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        <strong>Holy guacamole!</strong> Unable to submit request, Try again after some times.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
    }

    //To delete row from servicerequest
    if (isset($_REQUEST['cancel'])) {
        $id = $_REQUEST['id'];

        $sql2 = "DELETE FROM servicerequest WHERE id=$id";
        $result = mysqli_query($conn, $sql2);

        if ($result) {
            echo '<script> location.href="checkstatus.php"</script>';
        } else {
            $msg = '<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            <strong>Holy guacamole!</strong> Unable to submit request, Try again after some times.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    }


    ?>
    </div> <!-- end column-->
    </div> <!-- end primary row-->
    </div> <!-- end main container-->

    <?php include('../layout/footer.php') //footer
    ?>