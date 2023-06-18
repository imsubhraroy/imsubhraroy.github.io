<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>OSMS</title>

  <!-- Font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Bootstrap css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

  <!-- custom css -->
  <!-- <link rel="stylesheet" href="../../CSS/"> -->
  <link rel="stylesheet" href="../CSS/custom.css">

  <!-- <style>
    ion-icon {
      font-size: 100px;
      margin-left: 180px;
    }
  </style> -->
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-info">
    <!-- start nav -->
    <div class="container-fluid">
      <!-- star container -->
      <a class="navbar-brand fs-2" href="#"><img class="logo rounded" src="../IMAGES/logo.jpg" alt="LOGO">OSMS</a> <!-- LOGO -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-5 text-right">
          <li class="nav-item px-2">
            <a class="nav-link " aria-current="page" href="../index.php">Home</a>
          </li>
          <li class="nav-item px-2">
            <a class="nav-link" href="service-request.php">Request</a>
          </li>
          <li class="nav-item px-2">
            <a class="nav-link" href="../product/products.php">Product</a>
          </li>
          <?php  //To check if the user is login or not
          session_start();
          if (!isset($_SESSION['is_login'])) {
          ?>
            <li class="nav-item px-2">
              <a class="nav-link" aria-current="page" href="../Registration.php">Registar</a>
            </li>
            <li class="nav-item px-2">
              <a class="nav-link" href="../login.php">Login</a>
            </li>
          <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link" href="user-profile.php">Profile</a>
            </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="../Contact-us.php">Contact Us</a>
          </li>
        </ul>
      </div>
    </div> <!-- end container -->
  </nav> <!-- end nav -->
