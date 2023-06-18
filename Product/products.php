<?php

// session_start();

include('../DBConnection.php');
include('layout/header.php');

echo '<div class="container text-center">
        <div class="row">';
$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $file_name = $row['image'];  ?>
        <div class="col-md-3 col-auto col-sm-auto">
            <?php include('layout/home.php'); ?>
        </div>

<?php
    }
 
} else {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> Something went wrong!.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}
echo '</div>
    </div>'; 
    ?>
    
<?php include('../layout/footer.php'); ?>