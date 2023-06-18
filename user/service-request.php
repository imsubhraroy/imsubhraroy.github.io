<?php
// session_start();

define('PAGE', 'servicerequest');
define('TITLE', 'Request_Setvice');
include('../DBConnection.php');
include('layout/header.php');
include('layout/islogin.php');


//To insert data to servicerequest table
if (isset($_REQUEST['submitrequest'])) {
  $rinfo = $_REQUEST['requestinfo'];
  $rdes = $_REQUEST['requestdesc'];
  $name = $_REQUEST['requestername'];
  $add1 = $_REQUEST['requesteradd1'];
  $add2 = $_REQUEST['requesteradd2'];
  $city = $_REQUEST['requestercity'];
  $sate = $_REQUEST['requesterstate'];
  $zip = $_REQUEST['requesterzip'];
  $email = $_REQUEST['requesteremail'];
  $mobile = $_REQUEST['requestermobile'];
  $date = date("Y-m-d");
  $uid = $_SESSION['is_login'];

  $sql = "INSERT INTO servicerequest(uid,request_info,request_desription,name,add1,add2,city,state,zip,email,mobile,rdate) VALUES($uid,'$rinfo','$rdes','$name','$add1','$add2','$city','$sate','$zip','$email','$mobile','$date')";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    $genid = mysqli_insert_id($conn);  //last inserted id of servicerequest table
    $_SESSION['myid'] = $genid;

    $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong> Your Request Submitted Successfully. Your Id is ' . $genid . '
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    echo '<script> location.href="submitrequest-succesfully.php"</script>';
  } else {
    $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong> Unable to submit request, Try again after some times.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
}
if (isset($msg)) {
  echo $msg;
}
?>


<div class="col-md-12 col-11  mt-1 mb-3 ms-1 ">
        <div class="row g-0">
            <div class="col-md-4  mx-sm-auto mt-2">
                <img src="../IMAGES/Banner.png" class="img-fluid rounded-start shadow-sm" alt="...">
            </div>
            <div class="col-md-6 mt-3 text-start ">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia repellat quis minus eligendi modi iusto, odio facilis itaque quaerat fugiat veniam? Nobis nam deserunt dolore facere impedit delectus ducimus alias soluta consequatur reiciendis, exercitationem dignissimos laborum aperiam error voluptatem animi rerum dolores? Quo velit suscipit commodi vel. Eveniet, officiis ducimus nostrum animi repudiandae perspiciatis earum! Perspiciatis voluptates maiores odio repellendus!</p>
            </div>
        </div>
    </div>
    <hr>
<div class="col-md-12 col-11  mt-1 mb-3 ms-1 ">
        <div class="row g-0">
            <div class="col-md-4  mx-sm-auto mt-2">
                <img src="../IMAGES/homeservice.jpg" class="img-fluid rounded-start shadow-sm" alt="...">
            </div>
            <div class="col-md-6 mt-3 text-start ">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia repellat quis minus eligendi modi iusto, odio facilis itaque quaerat fugiat veniam? Nobis nam deserunt dolore facere impedit delectus ducimus alias soluta consequatur reiciendis, exercitationem dignissimos laborum aperiam error voluptatem animi rerum dolores? Quo velit suscipit commodi vel. Eveniet, officiis ducimus nostrum animi repudiandae perspiciatis earum! Perspiciatis voluptates maiores odio repellendus!</p>
            </div>
        </div>
    </div>

    <hr>

    <div class="col-md-12 col-11  mt-1 mb-3 ms-1 ">
    <h4 class="text-warning text-center">You can Request for Service by fill up the below form</h4>  
  </div>


    <div class="col-md-11 col-11  mt-1 mb-5 mx-4">
      <!--start column-->
      <div class="row">
        <!--start form-->
        <form class="row g-3" action="" method="POST">
          <div class="col-md-12">
            <label for="inputRequestInfo">Request Info</label>
            <input type="text" class="form-control" id="inputRequestInfo" placeholder="Request Info" name="requestinfo" required>
          </div>
          <div class="col-md-12">
            <label for="inputRequestDescription">Description</label>
            <input type="text" class="form-control" id="inputRequestDescription" placeholder="Write Description" name="requestdesc" required>
          </div>
          <div class="col-md-12">
            <label for="inputName">Name</label>
            <input type="text" class="form-control" id="inputName" placeholder="Rahul" name="requestername" required>
          </div>
          <div class=" col-md-6">
            <label for="inputAddress">Address Line 1</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="House No. 123" name="requesteradd1" required>
          </div>
          <div class=" col-md-6">
            <label for="inputAddress2">Address Line 2</label>
            <input type="text" class="form-control" id="inputAddress2" placeholder="Railway Colony" name="requesteradd2" required>
          </div>
          <div class=" col-md-5">
            <label for="inputCity">City</label>
            <input type="text" class="form-control" id="inputCity" name="requestercity" required>
          </div>
          <div class=" col-md-4">
            <label for="inputState">State</label>
            <input type="text" class="form-control" id="inputState" name="requesterstate" required>
          </div>
          <div class=" col-md-3">
            <label for="inputZip">Zip</label>
            <input type="text" class="form-control" id="inputZip" name="requesterzip" onkeypress="isInputNumber(event)" onkeypress="validatezip()" required>
            <p id="zip"></p>
          </div>

          <div class=" col-md-6">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail" name="requesteremail" required>
          </div>
          <div class=" col-md-6">
            <label for="inputMobile">Mobile</label>
            <input type="text" class="form-control" id="inputMobile" name="requestermobile" onkeypress="isInputNumber(event)" required>
          </div>
          <!-- <div class=" col-md-2">
              <label for="inputDate">Date</label>
              <input type="date" class="form-control" id="inputDate" name="requestdate" required>
            </div> -->
          <div class="col-12 text-end">
            <button type="submit" class="btn btn-danger mt-4" name="submitrequest">Submit</button>
            <button type="reset" class="btn btn-secondary mt-4">Reset</button>
          </div>
        </form> <!-- end form-->
    </div>
    <!--end column-->
  </div>
  <!--end primary row-->

  <?php include('../layout/footer.php')  ?>