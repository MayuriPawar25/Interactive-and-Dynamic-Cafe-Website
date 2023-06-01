<?php
include("../data.php");

$category = $_GET["category"];
  $menu_type = $_GET["type"];

  $query = "SELECT * FROM menu WHERE category = '$category' AND menu_type = '$menu_type'";
  $menu = mysqli_query($db, $query);
  

?>
<style>
.header{
  margin-top:5px;
}

.title{
  margin-top: 60px;
  text-align: center;
  color: #000;
  
}

.menu{
 margin-top: -40px; 
 position: relative;  
}
.menu .container {
  position: relative;   
}

.menu .menudetail{
  border-radius: 10px;
  padding: 20px 20px 0px 20px; 
  position: relative;
}

.menu .menudetail:hover{
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.menu .menudetail img
{
  border-radius: 10px;
  width: 100%;
  height: 200px;
}

.menu .menudetail .menuname
{
  margin-left: 20px;
}

.menu .menudetail .detail
{
  margin-left: 20px;
}

.menu .menudetail .price
{
  text-align: center;
}

@media (max-width: 991px) {
  .menu{
 margin-top: -180px; 
}
.title{
  margin-top: 20px;
  color: #000; 
  position: relative;   
  z-index: 10; 
}

  
.menu .menudetail{
  margin-top:20px;
}
}
</style>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home-Engineer's Chai</title>
  
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/logo.jpeg" rel="icon">
  <link href="../assets/img/logo.jpeg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  
</head>

<body>
  
<main id="main">
  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-left fixed-top" style="margin-top: -5px;">
    <div class="container-fluid container-xl d-flex align-items-left justify-content-center justify-content-lg-start">
      <i class="bi bi-phone d-flex align-items-center"><a href="tel:+919960621000"><span>+91 9960621000</span></a></i>
      <i href="#" class="bi bi-clock ms-4 d-none d-lg-flex align-items-center"><span>Mon-Sun: 4:00 AM - 11:00 PM</span></i>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <div class="logo me-auto">
         <a href="../index.php"><img src="../assets/img/logo.png" alt="" class="img-fluid rounded"></a>
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="../#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="../#about">About</a></li>
          <li><a class="nav-link scrollto" href="../#menu">Menu</a></li>
          <li><a class="nav-link scrollto" href="../#specials">Specials</a></li>
          <li><a class="nav-link scrollto" href="../#events">Events</a></li>          
          <li><a class="nav-link scrollto" href="../#gallery">Gallery</a></li>
          <li><a class="nav-link scrollto" href="../#contact">Contact</a></li>
          <li class="dropdown"><a href="#"><span>Career</span></a>
            <ul>              
              <li><a href="../career/index.php">Offering a Job</a></li>
              <li><a href="../career/job.php">Need a Job</a></li>              
            </ul>
          </li>        
          <?php if(!isset($_SESSION["username"]) && !isset($_SESSION["usertype"])) { ?>
          <li><a type="submit" onclick="signin()" class="book-a-table-btn scrollto">Sign In</a><li>
         <li><a type="submit" onclick="signup()" class="book-a-table-btn scrollto" style="margin-top:5px;">Sign Up</a><li>
         <?php } 
         elseif(isset($_SESSION["username"])  && ($_SESSION["usertype"])=="Customer") { ?>
         <li class="dropdown"><a class="nav-link scrollto bi bi-person-circle" href="#" style="font-size:35px;"></a>
            <ul>              
              <li><a href="../user/index.php">My Account</a></li>
              <li><a href="../user/booking.php">Booking</a></li>                                         
              <li><a href="../logout.php">Logout</a></li>              
            </ul>
          </li>
          </ul>
          <?php } 
          elseif(isset($_SESSION["username"])  && ($_SESSION["usertype"])=="Admin") { ?>
         <li class="dropdown"><a class="nav-link scrollto bi bi-person-circle" href="#" style="font-size:35px;"></a>
            <ul>              
              <li><a href="../admin/">My Account</a></li>              
              <li><a href="../logout.php">Logout</a></li>              
            </ul>
         </li>
          </ul>
          <?php }
          elseif(isset($_SESSION["username"])  && ($_SESSION["usertype"])=="Owner") { ?>
         <li class="dropdown"><a class="nav-link scrollto bi bi-person-circle" href="#" style="font-size:35px;"></a>
            <ul>              
            <li><a href="../owner/">My Account</a></li>              
              <li><a href="../logout.php">Logout</a></li>              
            </ul>
         </li>
          </ul>
          <?php } ?> 
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <?php if(!isset($_SESSION["username"])) { ?>
      <a type="submit" onclick="signin()" class="book-a-table-btn scrollto">Sign In</a>
      <a type="submit" onclick="signup()" class="book-a-table-btn scrollto">Sign Up</a>
      <?php } ?>
    </div>
  </header><!-- End Header -->



<section class="title">
  <div class="container">        
      <h2><?php echo $category;?> <br> <?php echo $menu_type;?></h2>               
  </div>
</section>

<section class="menu">
      <div class="container">
        <div class="col-lg-12 mt-5 mt-lg-0">             
              <div class="row">                
              <?php foreach ($menu as $row){?>
                <div class="col-lg-3 menudetail">
                      <div class="row">                      
                      <p class="menuimg"><img src="../assets/img/menu/<?php echo $row["menu_image"];?>" alt=""></p>                  
                      </div>
                      <div class="row" style="text-align:center">                
                        <p class="menuname"><strong><?php echo $row["menu_name"];?></strong></p>                  
                      </div>
                      <div class="row" style="text-align:center">                           
                        <p class="detail"><strong><?php echo $row["menu_detail"];?></strong></p> 
                        </div>                        
                      <div class="row">                
                      <p class="price"><strong>&#8377;<?php echo $row["price"];?></strong></p> 
                      </div>
                </div>     
              <?php } ?>   
            </div>         
       </div>                  
      </div>
</section><!-- End Contact Section -->  

</main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Engineer's Chai</h3>
      
      <div class="social-links">
      <a href="https://www.instagram.com/engineerschai" class="instagram"><img src="../assets/img/icon/instagram.png"></a>
        <a href="https://www.facebook.com/engineerschai" class="facebook"><img src="../assets/img/icon/facebook.png"></a>
        <!--<a href="https://twitter.com/engineerschai" class="twitter"><img src="../assets/img/icon/twitter.png"></a> -->
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>Engineer's Chai</span></strong>. All Rights Reserved
      </div>      
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script>
  function signin() {  
 xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      
       window.location.href = this.responseText;   
       
    }
  };
  xhttp.open("GET", "../admin/auth.php?signin1", true);
  xhttp.send(); 
}

function signup() {  
 xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

      window.location.href = this.responseText;        
       
    }
  };
  xhttp.open("POST", "../admin/auth.php?signup1", true);
  xhttp.send(); 
}
</script>

</body>

</html>