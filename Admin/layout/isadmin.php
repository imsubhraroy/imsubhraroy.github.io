<?php

// session_start();
//To check  if user is login or nnot
if(!isset($_SESSION['is_admin'])){
    header('location: ../login.php');
}

?>