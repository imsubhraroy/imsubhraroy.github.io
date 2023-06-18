<?php

// session_start();
//To check  if user is login or nnot
if(!isset($_SESSION['is_login'])){
    header('location: ../login.php');
}

?>