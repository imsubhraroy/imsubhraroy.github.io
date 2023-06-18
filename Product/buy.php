<?php

// session_start();

include('../DBConnection.php');
include('layout/header.php');
include('../user/layout/islogin.php');

echo '<div class="container ">
        <div class="row d-flex justify-content-md-center">';
?>
<div class="col-sm-9 jumbotron mt-3 bg-success bg-opacity-25 mb-5 ">
    <!--start column-->
    <div class="py-5">
        <!--start div-->
        <h4 class="text-center">Enter your address</h4>
        <!--start form-->
        <form class="row g-3" action="" method="POST">

            <div class="col-md-12">
                <label for="inputName">Name</label>
                <input type="text" class="form-control text-start" id="inputName" placeholder="Rahul" name="uname" required>
            </div>
            <div class=" col-md-6">
                <label for="inputAddress">Address Line 1</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="House No. 123" name="uadd1" required>
            </div>
            <div class=" col-md-6">
                <label for="inputAddress2">Address Line 2</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Railway Colony" name="uadd2" required>
            </div>
            <div class=" col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" id="inputCity" name="ucity" required>
            </div>
            <div class=" col-md-4">
                <label for="inputState">State</label>
                <input type="text" class="form-control" id="inputState" name="ustate" required>
            </div>
            <div class=" col-md-2">
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control" id="inputZip" name="uzip" onkeypress="isInputNumber(event)" required>
            </div>
            <div class=" col-md-1">
                <label for="inputEmail">Quantity</label>
                <input type="number" class="form-control" id="inputQuantity" name="quantity" value="1" required>
            </div>
            <div class=" col-md-6">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="uemail" required>
            </div>
            <div class=" col-md-4">
                <label for="inputMobile">Mobile</label>
                <input type="text" class="form-control" id="inputMobile" name="umobile" onkeypress="isInputNumber(event)" required>
            </div>
            <div class="col-md-4 ms-auto">
                <!-- <button type="submit" class="btn btn-primary mt-4 me-3" name="submitrequest">Proced to pay</button> -->
                <?php include('layout/pay.php');   ?>
                <button type="reset" class="btn btn-secondary mt-4">Reset</button>
            </div>
        </form> <!-- end form-->
    </div>
    <!--end div-->
</div>
<!--end column-->
<?php
echo '</div>
    </div>';

if(isset($_REQUEST['pay'])){
    //Fetching data from product table
    $pid=$_SESSION['product_details'];
    $sql="SELECT id,name,selling_price FROM product where id=$pid";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $pname=$row['name'];
    $total_quantity = $row['quantity'];
    $p_price=$row['selling_price'];

    //Fetching data from form
    $uid=$_SESSION['is_login'];
    $u_name=$_REQUEST['uname'];
    $u_add1=$_REQUEST['uadd1'];
    $u_add2=$_REQUEST['uadd2'];
    $u_city=$_REQUEST['ucity'];
    $u_state=$_REQUEST['ustate'];
    $u_zip=$_REQUEST['uzip'];
    $u_email=$_REQUEST['uemail'];
    $u_mobile=$_REQUEST['umobile'];
    $u_quantity = $_REQUEST['quantity'];
    $u_date=date("Y-m-d");

    if($u_quantity >= $total_quantity ){
        echo '<scripy> alert("products not avaliable");';
    }

    $sql2="INSERT INTO delivary_details(uid,pid,p_name,p_price,u_name,u_email,u_add1,u_add2,u_city,u_state,u_zip,u_mobile,o_date,quantity) VALUES($uid,$pid,'$pname','$p_price','$u_name','$u_email','$u_add1','$u_add2','$u_city','$u_state','$u_zip','$u_mobile','$u_date',$u_quantity)";
    $result2=mysqli_query($conn,$sql2);

    $current_quantity = $total_quantity - $u_quantity;

    $sql1= "UPDATE FROM product SET quantity= $current_quantity WHERE id=$pid";


    echo '<script> location.href="products.php";</script>';

}

if(isset($_REQUEST['profile'])){
    echo '<script> location.href="products.php";</script>';
}

?>

<?php include('../layout/footer.php'); ?>