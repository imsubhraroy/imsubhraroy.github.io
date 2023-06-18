<?php

include('layout/isadmin.php');


//Fetching servicerequest table row
if (isset($_REQUEST['view'])) {
    $id = $_REQUEST['rid'];
    $sql2 = "SELECT * FROM servicerequest WHERE id=$id";

    $result2 = mysqli_query($conn, $sql2);
    
            $row = mysqli_fetch_assoc($result2);
            $uid=$row['uid'];
         } ?>
         <div class="pb-4 "> <!--start of the div-->
                <h5 class="text-center text-dark mb-3 pt-5">Assign Work Order Request</h5>
                <!-- Forn start -->
                <form class="row g-3" method="POST">
                    <div class="col-12">
                        <input type="hidden" name="uid" value="<?php if(isset($row['uid'])){ echo $row['uid'];} ?>">
                        <label for="rid" class="form-label">Request ID</label>
                        <input type="text" class="form-control" name="rid" placeholder="Request Id" value="<?php if(isset($row['id'])){ echo $row['id'];} ?>" readonly>
                    </div>
                    <div class="col-12">
                        <label for="request_info" class="form-label">Request INFO</label>
                        <input type="text" class="form-control" name="request_info" placeholder="Request Info" value="<?php if(isset($row['request_info'])) {echo $row['request_info']; }?>">
                    </div>
                    <div class="col-12">
                        <label for="request_desc" class="form-label">Request Description</label>
                        <input type="text" class="form-control" name="request_desc" placeholder="Request Description" value="<?php if(isset($row['request_desription'])) {echo $row['request_desription']; }?>">
                    </div>
                    <div class="col-12">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="<?php if(isset($row['name'])) {echo $row['name']; }?>">
                    </div>

                    <div class="col-12">
                        <label for="add1" class="form-label">Address</label>
                        <input type="text" class="form-control" name="add1" placeholder="1234 Main St" value="<?php if(isset($row['add1'])) {echo $row['add1']; }?>">
                    </div>
                    <div class="col-12">
                        <label for="add2" class="form-label">Address 2</label>
                        <input type="text" class="form-control" name="add2" placeholder="Apartment, studio, or floor" value="<?php if(isset($row['add2'])) {echo $row['add2']; }?>">
                    </div>
                    <div class="col-md-6">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" name="city" value="<?php if(isset($row['city'])) {echo $row['city']; }?>">
                    </div>
                    <div class="col-md-4">
                        <label for="state" class="form-label">State</label>
                        <input type="text" class="form-control" name="state" value="<?php if(isset($row['state'])) {echo $row['state']; }?>">
                    </div>
                    <div class="col-md-2">
                        <label for="zip" class="form-label">Zip</label>
                        <input type="text" class="form-control" name="zip" value="<?php if(isset($row['zip'])) {echo $row['zip']; }?>">
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="<?php if(isset($row['email'])) {echo $row['email']; }?>">
                    </div>
                    <div class="col-md-6">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="text" class="form-control" name="mobile" value="<?php if(isset($row['mobile'])) {echo $row['mobile']; }?>">
                    </div>
                    <div class="col-md-6">
                        <label for="technician" class="form-label">Technician Name</label>
                        <select name="technician" class="form-select">
                            <option selected>Choose...</option>
                            <?php 
                                //Fetching ll technician names
                                $sql4="SELECT name from technician_tb";
                                $res=mysqli_query($conn,$sql4);
                                while($rows=mysqli_fetch_assoc($res)){ ?>
                                    <option> <?php echo $rows['name'];  ?></option>
                               <?php }
                            ?>                           
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="assign_date" class="form-label">Assign Date</label>
                        <input type="date" class="form-control" name="assign_date">
                    </div>
                    <div class="col-12 float-right mt-5" style=" margin-left: 400px;">
                        <button type="submit" class="btn btn-primary" name="assign">Assign</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form> <!--end form-->
            </div>      <!--end div-->

<!-- Assign the Form value to serviceassign table -->
  <?php
    if(isset($_REQUEST['assign']))
    {    //fetching all input field value
        $uid = $_REQUEST['uid'];
        $rid=$_REQUEST['rid'];
        $info=$_REQUEST['request_info'];
        $desc=$_REQUEST['request_desc'];
        $name=$_REQUEST['name'];
        $add1=$_REQUEST['add1'];
        $add2=$_REQUEST['add2'];
        $city=$_REQUEST['city'];
        $state=$_REQUEST['state'];
        $zip=$_REQUEST['zip'];
        $email=$_REQUEST['email'];
        $mobile=$_REQUEST['mobile'];
        $technician=$_REQUEST['technician'];
        $date=$_REQUEST['assign_date'];

        $sql3="INSERT INTO serviceassign(rid,request_info,request_desc,name,add1,add2,city,state,zip,email,mobile,technician,assign_date,uid) VALUES($rid,'$info','$desc','$name','$add1','$add2','$city','$state','$zip','$email','$mobile','$technician','$date',$uid)";

        $result3=mysqli_query($conn,$sql3);

        if($result3){
            $sql4 = "DELETE FROM servicerequest WHERE id=$rid";
            $result4=mysqli_query($conn,$sql4);
            echo '<script> window.alert("Data inserted succesfully");</script>';
            echo '<script> location.href="user-request.php";</script>';
        }
        else{
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> Something went wrong. Try again.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }

        //Delete servicerequest table row on assign
        $id = $_REQUEST['rid'];

        $sql1 = "DELETE  FROM servicerequest WHERE id='$id'";
        $result4 = mysqli_query($conn, $sql1);
        if ($result4) {
    
            echo '<script> location.href="user-request.php";</script>';
        } else {
           echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> Something went wrong. Try again.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
        }
        
        
    }
    ?>
  
