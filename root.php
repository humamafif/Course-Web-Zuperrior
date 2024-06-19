<!DOCTYPE html>
<html lang="en">

<?php
session_start();
include "./controllers/connect.glob.php";

$toggle_button = '';

if (isset($_SESSION['authenticated'])) {
  $toggle_button = '
  <div class="dropdown">
    <button class="btn btn-primary py-4 px-lg-5 d-none d-lg-block dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
      <b>' . $_SESSION['nama'] . '</b>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <li><a class="dropdown-item nav-link px-3" href="controllers/logout.php">Logout</a></li>
    </ul>
  </div>';
} else {
  $toggle_button = '<a href="pages/login.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block" id="join"><b>Join Us</b><i class="fa fa-arrow-right ms-3"></i></a>';
}
?>


<head>
  <meta charset="utf-8">
  <title>Zuperrior</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
    rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="./lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
  <style>
    * {
      scrollbar-width: none;
    }
  </style>
</head>

<body>
  <!-- Spinner Start -->
  <div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
  <!-- Spinner End -->

  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0" id="nav">
    <a href="#home" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
      <h2 class="m-0 text-primary">Zuperrior</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="navbar-nav ms-auto p-4 p-lg-0">
        <!-- <a href="root.php?page=home&#home" class="nav-item nav-link active">Home</a> -->
        <a href="root.php?page=home&#home" class="nav-item nav-link">Home</a>
        <a href="root.php?page=home&#about" class="nav-item nav-link">About</a>
        <a href="root.php?page=home&#courses" class="nav-item nav-link">Courses</a>
        <?php echo $toggle_button; ?>
      </div>
    </div>
  </nav>
  <!-- Navbar End -->

  <?php
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
    include $page . ".php";
  } else {
    include "home.php";
  }
  ?>

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Template Javascript -->
  <script src="js/main.js"></script>
</body>

</html>