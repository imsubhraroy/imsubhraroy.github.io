
  <!--start Navigation -->
    <?php include('layout/header.php') ?>
  <!--End Navigation-->

  <section class="jumbotron back-image">
    <!--Start Header Jumbotron-->
    <div class="myclass mainHeading">
      <h1 class="text-uppercase text-danger font-weight-bold">Welcome to OSMS</h1>
      <p class="">Customer's Happiness is our</p>

      <!--To check if user is ligin or not-->
      <?php
      if (!isset($_SESSION['is_login'])) {
      ?>
        <a href="login.php" class="btn btn-success mr-4">Login</a>
        <a href="Registration.php" class="btn btn-danger mr-4">Sign Up</a>
      <?php } ?>
    </div>
  </section> <!-- End Header Jumbotron -->

  <section class="container">

    <div class="slider ">
      <!--Start slider-->
      <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="10000">
            <img src="IMAGES/greg-rakozy-oMpAz-DN-9I-unsplash.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="IMAGES/mohamed-nohassi-odxB5oIG_iA-unsplash.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="IMAGES/aziz-acharki-U3C79SeHa7k-unsplash.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Some representative placeholder content for the third slide.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    <!--End Slider-->

    <div class="forservice text-center my-5">
      <!--Start Introduction to Services-->
      <h3 class="fs-1">OSMS Services</h3>
      <p class="">OSMS Services is India’s leading chain of multi-brand Electronics and Electrical service
        workshops offering
        wide array of services. We focus on enhancing your uses experience by offering world-class
        Electronic
        Appliances maintenance services. Our sole mission is “To provide Electronic Appliances care
        services to
        keep the devices fit and healthy and customers happy and smiling”.

        With well-equipped Electronic Appliances service centres and fully trained mechanics, we
        provide quality
        services with excellent packages that are designed to offer you great savings.

        Our state-of-art workshops are conveniently located in many cities across the country. Now you
        can book
        your service online by doing Registration.</p>
    </div>
    <!--End Introduction to Services-->

    <div class="container bord ">
      <!--Star Our services-->
      <h3 class="text-success text-center fs-1">Our Services</h3>
      <div class="row mt-4 d-flex justify-content-center align-items-center text-center">
        <div class="col-11 col-sm-4 mb-4">
          <a href="#"><i class="fa-thin fa-display fa-6x text-success"></i></a>
          <h4 class="mt-4 me-4 text-center">Electronic Appliances</h4>
        </div>
        <div class="col-11 col-sm-4 mb-4">
          <a href="#"><i class="fas fa-regular fa-business-time fa-6x text-primary"></i></a>
          <h4 class="mt-4 me-4 text-center">Preventive Maintenance</h4>
        </div>
        <div class="col-11 col-sm-4 mb-4">
          <a href="#"><i class="fas fa-cogs fa-6x text-info"></i></a>
          <h4 class="mt-4 text-center">Fault Repair</h4>
        </div>
      </div>
    </div>
    <!--End our Services -->
    <hr>

    <div class="jumbotron bg-danger my-5 " id="Customer">
      <!-- Start Happy Customer Jumbotron -->
      <div class="container">
        <!-- Start Customer Container -->
        <h2 class="text-center text-white">Happy Customers</h2>
        <div class="row mt-5">
          <div class="col-lg-3 col-sm-6">
            <!-- Start Customer 1st Column-->
            <div class="card shadow-lg mb-2">
              <div class="card-body text-center">
                <img src="IMAGES/avtar1.jpeg" class="img-fluid" style="border-radius: 100px;">
                <h4 class="card-title">Rahul Kumar</h4>
                <p class="card-text">Itaque illo explicabo voluptatum, saepe libero rerum, ad
                  ducimus voluptas
                  nesciunt debitis numquam.</p>
              </div>
            </div>
          </div> <!-- End Customer 1st Column-->

          <div class="col-lg-3 col-sm-6">
            <!-- Start Customer 2nd Column-->
            <div class="card shadow-lg mb-2">
              <div class="card-body text-center">
                <img src="IMAGES/avtar2.jpeg" class="img-fluid" style="border-radius: 100px;">
                <h4 class="card-title">Sonam Sharma</h4>
                <p class="card-text">Itaque illo explicabo voluptatum, saepe libero rerum, ad
                  ducimus voluptas
                  nesciunt debitis numquam.</p>
              </div>
            </div>
          </div> <!-- End Customer 2nd Column-->

          <div class="col-lg-3 col-sm-6">
            <!-- Start Customer 3rd Column-->
            <div class="card shadow-lg mb-2">
              <div class="card-body text-center">
                <img src="IMAGES/avtar3.jpeg" class="img-fluid" style="border-radius: 100px;">
                <h4 class="card-title">Sumit Vyas</h4>
                <p class="card-text">Itaque illo explicabo voluptatum, saepe libero rerum, ad
                  ducimus voluptas
                  nesciunt debitis numquam.</p>
              </div>
            </div>
          </div> <!-- End Customer 3rd Column-->

          <div class="col-lg-3 col-sm-6">
            <!-- Start Customer 4th Column-->
            <div class="card shadow-lg mb-2">
              <div class="card-body text-center">
                <img src="IMAGES/avtar4.jpeg" class="img-fluid" style="border-radius: 100px;">
                <h4 class="card-title">Jyoti Sinha</h4>
                <p class="card-text">Itaque illo explicabo voluptatum, saepe libero rerum, ad
                  ducimus voluptas
                  nesciunt debitis numquam.</p>
              </div>
            </div>
          </div> <!-- End Customer 4th Column-->
        </div> <!-- End Customer Row-->
      </div> <!-- End Customer Container -->
    </div> <!-- End Customer Jumbotron -->
  </section>
  <!-- Footer -->
        <?php include('layout/footer.php') ?>
<!-- Footer -->
  <!--End Footer-->

  <!-- Bootstrap Js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>