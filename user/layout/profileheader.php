
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?php  echo TITLE ?>
</title>

  <!-- Font awesome -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

     <!-- Bootstrap css -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 

     <!-- custom css -->
  <link rel="stylesheet" href="../CSS/custom.css">
  
  <style>
    .active {
    color: white;
    background-color: #DC3545;
  }
  </style>
</head>

<body>
<!-- <nav class="navbar navbar-dark fixed-top bg-danger flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="RequesterProfile.php">OSMS</a>
 </nav> -->

 <?php include('header.php') ?>

 <!-- Side Bar -->
 <div class="container-fluid">  <!--start main container-->
  <div class="row"> <!--start primary row-->
   <nav class="col-sm-auto bg-success p-2 sidebar d-print-none" style="height: 60vh;">  <!--start nav-->
    <div class="sidebar-sticky">
     <ul class="nav flex-column ">
      <li class="nav-item ">
       <a class="nav-link text-dark <?php if(PAGE == 'userprofile') { echo 'active'; } ?>" href="user-profile.php">
        <i class="fas fa-user"></i>
        Profile <span class="sr-only">(current)</span>
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link text-white <?php if(PAGE == 'checkstatus') { echo 'active'; } ?>" href="check-status.php">
        <i class="fas fa-align-center"></i>
        Service Status
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link text-white <?php if(PAGE == 'servicedone') { echo 'active'; } ?>" href="service-done.php">
        <i class="fas fa-align-center"></i>
        Service
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link text-white <?php if(PAGE == 'checkorder') { echo 'active'; } ?>" href="check-order.php">
        <i class="fas fa-align-center"></i>
        Order
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link text-white <?php if(PAGE == 'changepassword') { echo 'active'; } ?>" href="changepassword.php">
        <i class="fas fa-key"></i>
        Change Password
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link text-white" href="../logout.php">
        <i class="fas fa-sign-out-alt"></i>
        Logout
       </a>
      </li>
     </ul>
    </div>
   </nav> <!--end nav-->