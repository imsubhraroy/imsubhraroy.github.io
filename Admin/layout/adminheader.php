<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- customize title for every page -->
  <title> <?php echo TITLE ?> </title>

  <!-- Font Awesomr -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  <!-- Bootstrap css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

  <!-- custom css -->
  <link rel="stylesheet" href="../CSS/custom.css">

  <!-- Style for all archon tag when hovered -->
  <style>
    .active {
    color: black;
    background-color: #DC3545;
  }
  </style>
</head>

<body>

<!-- Top navbar -->
<nav class="navbar navbar-dark fixed-top bg-info p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="dashboard.php">OSMS</a>
 </nav>

 <!--start Side Bar -->
 <div class="container-fluid mb-5" style="margin-top:40px;"> <!--start Main container-->
  <div class="row"> <!--start primary row-->
  <!-- start side navbar -->
   <nav class="col-sm-3 col-md-2 bg-success p-2  bg-opacity-25 sidebar py-5 d-print-none">
    <div class="sidebar-sticky">
     <ul class="nav flex-column">
      <li class="nav-item">
       <a class="nav-link text-white <?php if(PAGE == 'dashboard') { echo 'active'; } ?> " href="dashboard.php">
        <i class="fas fa-tachometer-alt"></i>
        Dashboard
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link text-white <?php if(PAGE == 'work') { echo 'active'; } ?>" href="work-order.php">
        <i class="fab fa-accessible-icon"></i>
        Work Order
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link text-white <?php if(PAGE == 'request') { echo 'active'; } ?>" href="user-request.php">
        <i class="fas fa-align-center"></i>
        Requests
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link text-white <?php if(PAGE == 'assets') { echo 'active'; } ?>" href="products.php">
        <i class="fas fa-database"></i>
        Assets
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link text-white <?php if(PAGE == 'technician') { echo 'active'; } ?>" href="technician.php">
        <i class="fab fa-teamspeak"></i>
        Technician
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link text-white <?php if(PAGE == 'requesters') { echo 'active'; } ?>" href="requester.php">
        <i class="fas fa-users"></i>
        Requester
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link text-white <?php if(PAGE == 'bookingdetails') { echo 'active'; } ?>" href="booking-details.php">
        <i class="fas fa-users"></i>
        Product Booking Details
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link text-white <?php if(PAGE == 'sellreport') { echo 'active'; } ?>" href="sell-report.php">
        <i class="fas fa-table"></i>
        Sell Report
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link text-white <?php if(PAGE == 'workreport') { echo 'active'; } ?>" href="work-report.php">
        <i class="fas fa-table"></i>
        Work Report
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
   </nav> <!--end side navbar-->