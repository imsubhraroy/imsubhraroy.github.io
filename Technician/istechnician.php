<?php

//To check  if user is login or nnot
if(!isset($_SESSION['is_technician'])){
    header('location: technicianlogin.php');
}

?>