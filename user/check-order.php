<?php
define('PAGE', 'checkorder');
define('TITLE', 'checkorder');
include('../DBConnection.php');
include('layout/profileheader.php');

// session_start();
echo '<div class="col-sm-auto col-md-10 mt-3 ms-auto">';

$uid = $_SESSION['is_login'];
$sql = "SELECT * from delivary_details where uid=$uid";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($rows = mysqli_fetch_assoc($result)) {
        $pid = $rows['pid'];
        $sql2 = "SELECT * from product where id=$pid";
        $result2 = mysqli_query($conn, $sql2);
       while($row = mysqli_fetch_assoc($result2)){
?>
        <div class="row shadow py-2 mb-3">
            <div class="col-md-2">
                <img src="../products_Image/<?php echo $row['image']; ?>" alt="" width="90">
            </div>
            <div class="col-md-6">
                <p><?php echo $row['name'] ?></p>
            </div>
            <div class="col-md-2">
                <p>$<?php echo $row['selling_price'] ?></p>
            </div>
            <div class="col-md-auto">
                <p>Delivery on Sep 02,2023</p>
                <p><small> Your Item is on the way</small></p>
            </div>
        </div>
    <?php
       }
    }
}

$sql1 = "SELECT pid,delivary_date from delivary_done where uid=$uid";
$result1 = mysqli_query($conn, $sql1);

if(mysqli_num_rows($result1) > 0){ 

while ($rows = mysqli_fetch_assoc($result1)) {

    $pid1 = $rows['pid'];
    $d_date = $rows['delivary_date'];
    $sql3 = "SELECT * from product where id=$pid1";
    $result3 = mysqli_query($conn, $sql3);
    $row = mysqli_fetch_assoc($result3);
    ?>
    <div class="row shadow py-2 mt-3">
        <div class="col-md-2">
            <img src="../products_Image/<?php echo $row['image']; ?>" alt="" width="90">
        </div>
        <div class="col-md-6">
            <p><?php echo $row['name'] ?></p>
        </div>
        <div class="col-md-2">
            <p>$<?php echo $row['selling_price'] ?></p>
        </div>
        <div class="col-md-auto">
            <p>Delivared on <?php echo $d_date; ?></p>
            <p><small> Your Item is Delivered</small></p>
        </div>
    </div>
<?php }
}
?>
</div> <!-- end column-->
</div> <!-- end primary row-->
</div> <!-- end main container-->

<?php include('../layout/footer.php') //footer
?>