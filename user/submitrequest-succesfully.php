<?php
define('PAGE', 'Service');
define('TITLE', 'success');
include('../DBConnection.php');
include('layout/profileheader.php');
include('layout/islogin.php');


//Fetching row from servicerequest table
if ($_SESSION['is_login']) {
    $id = $_SESSION['myid'];
    $sql = "SELECT * FROM servicerequest WHERE id=$id";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $rows = mysqli_fetch_assoc($result);

            echo "<div class='col-sm-6 mt-5  ms-5'>   <!--start column-->
            <table class='table'>                     <!--start table-->
             <tbody>
              <tr>
                <th>Request ID</th>
                <td>".$rows['id']."</td>
              </tr>
              <tr>
                <th>Name</th>
                <td>".$rows['name']."</td>
              </tr>
              <tr>
              <th>Email ID</th>
              <td>".$rows['email']."</td>
             </tr>
              <tr>
               <th>Request Info</th>
               <td>".$rows['request_info']."</td>
              </tr>
              <tr>
               <th>Request Description</th>
               <td>".$rows['request_desription']."</td>
              </tr>
           
              <tr>
               <td><form class='d-print-none'><input class='btn btn-danger' type='submit' value='Print' onClick='window.print()'></form></td>
               <td><form class='d-print-none'><input class='btn btn-danger' type='submit' value='Close' name='close'></form></td>
             </tr>
             </tbody>   
            </table>  <!--end table-->
            </div>   <!--end column-->
            </div>   <!--end primary row-->
            </div>  <!--end main container-->
            ";
        } else {
            echo "No Request Found";
        }
    } else {
        $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> Unable to submit request, Try again after some times.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
}

if(isset($_REQUEST['close']))
{
   echo '<script> location.href="../index.php"</script>';

}
include('../layout/footer.php')  //footer
?>