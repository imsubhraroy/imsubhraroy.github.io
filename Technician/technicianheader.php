<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="stylesheet" href="../CSS/custom.css">
  <style>
    .active {
    color: black;
    background-color: #DC3545;
  }
  </style>
</head>

<body>
<!-- <nav class="navbar navbar-dark fixed-top bg-danger p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="dashboard.php">OSMS</a>
 </nav> -->

 <!-- Side Bar -->
 <div class="container-fluid" >
  <div class="row">
   <nav class="col-sm-3 col-md-2 bg-success p-2 sidebar d-print-none" style="height: 60vh;">
    <div class="sidebar-sticky mt-3">
      <a class="text-center text-info fs-4 ms-5" href="../index.php">OSMS</a>
     <ul class="nav flex-column">
      <li class="nav-item">
       <a class="nav-link text-white <?php if(PAGE == 'work') { echo 'active'; } ?>" href="technicianworkorder.php">
        <i class="fab fa-accessible-icon"></i>
        Work Order
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
   </nav>