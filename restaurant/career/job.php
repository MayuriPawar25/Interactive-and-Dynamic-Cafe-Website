<?php
include("../data.php");
?>
<style>
  .header{
    margin-top:5px;
  }
  .title h2{
    margin-top: 85px;
    text-align: center;
    color:#ffb03b;
    font-size: 45px;
    
  }
.career{
 margin-top: -20px; 
}

.career .container{   
  width: 900px;    
}

.career .career-form{
  border-radius: 20px;
  background: rgb(233, 230, 230);
  padding: 30px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.career button{
  background: #ffb03b;
border: 0;
padding: 10px 24px;
color: #fff;
transition: 0.4s;
border-radius: 50px;
}
.career button:hover{
  background: #000;
}

.career .sent-message{
  display: none;
  color: green;
}

@media (max-width: 991px) {
  .career{
 margin-top: -80px; 
}
.title h2{
  margin-top: 20px
}
  .career .container{   
  width: 100%;    
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
          <!--<li><a class="nav-link scrollto" href="#chefs">Chefs</a></li>-->
          <li><a class="nav-link scrollto" href="../#gallery">Gallery</a></li>
          <li><a class="nav-link scrollto" href="../#contact">Contact</a></li>
          <li class="dropdown"><a href="#"><span>Career</span></a>
            <ul>              
              <li><a href="index.php">Offering a Job</a></li>
              <li><a href="#">Need a Job</a></li>              
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

<?php if(isset($_GET['jobid'])) {
  $id = $_GET['jobid'];
  $query = "SELECT * FROM career WHERE id = '$id'"; 
  $run = mysqli_query($db, $query);  
   while($row = $run->fetch_array()){?>
  
<section class="title col-lg-12 align-items-center">

                <h2><span>Job Application</span></h2>         

</secion>

  <section class="career">
      <div class="container">
        <div class="col-lg-12 mt-5 mt-lg-0">
          <div class="container">
            <div class="tab-content">
            <div class="tab-pane active show" id="career">
                <div class="row">
                <form action="" enctype="multipart/form-data" method="post" role="form" class="career-form">          
          
          <div class="row">
            <div class="col-md-4 form-group">
              <input type="text" name="fname" class="form-control" id="fname" placeholder="First Name" onkeypress="return /[a-z _]/i.test(event.key);"  required>
            </div>
            <div class="col-md-4 form-group">
              <input type="text" name="mname" class="form-control" id="mname" placeholder="Middle Name" onkeypress="return /[a-z _]/i.test(event.key);"  required>
            </div>
            <div class="col-md-4 form-group">
              <input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name" onkeypress="return /[a-z _]/i.test(event.key);"  required>
            </div>
          </div>

            <div class="row mt-3">
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
            </div>          
            <div class="col-md-4 form-group">
            <input type="number" class="form-control" name="mobile" id="mobile" placeholder="Mobile Number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  required>
            </div>            
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="text" class="form-control" name="education" id="education" placeholder="Your Qualification" onkeypress="return /[a-z _]/i.test(event.key);"  required>
            </div>
          </div>          
          <div class="row mt-3">
          
            <div class="col-md-4 form-group">
            <input type="number" class="form-control" name="experience" id="mobile" placeholder="Total Years of Experience" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  required> 
            </div>            
            <div class="col-md-4 form-group mt-3 mt-md-0">
            <input type="text" name="jobname" class="form-control" id="jobname" value="<?php echo ucfirst($row["job_name"]);?>" onkeypress="return /[a-z _]/i.test(event.key);"  disabled>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
            <input type="text" name="city" class="form-control" id="city" value="<?php echo ucfirst($row["city"]);?>" onkeypress="return /[a-z _]/i.test(event.key);"  disabled>
            </div>
          
          </div>                    
          <div class="form-group mt-3">
          <div class="col-md-12 form-group">
            <textarea class="form-control" name="message" rows="5" placeholder="Cover Letter" required></textarea>
          </div>
          </div>
          <div class="row mt-3">
          <label>Upload CV</label>
          <div class="col-sm-8">                    
                    <input class="col-sm-6" type="file" accept="application/pdf" name="resume" id="exampleInputFile">
                    </div>
        </div>

          
          <div class="text-center"><button name="apply" type="submit" value="<?php echo $id; ?>">Send Message</button></div>
        </form>
        </div>
         </div>
         
        </div>
        </div>
        </div>
        </section> 
        <div>
      </div>
    </section><!-- End Contact Section -->
<?php } } else {?>
  <section class="title col-lg-12 align-items-center">

<h2><span>Need a Job</span></h2>         

</secion>

<section class="career">
<div class="container">
<div class="col-lg-12 mt-5 mt-lg-0">
<div class="container">
<div class="tab-content">
<div class="tab-pane active show" id="career">
<div class="row">
<form action="" enctype="multipart/form-data" method="post" role="form" class="career-form">
<div class="row">
<div class="col-md-4 form-group">
<input type="text" name="fname" class="form-control" id="fname" placeholder="First Name" onkeypress="return /[a-z _]/i.test(event.key);"  required>
</div>
<div class="col-md-4 form-group">
<input type="text" name="mname" class="form-control" id="mname" placeholder="Middle Name" onkeypress="return /[a-z _]/i.test(event.key);"  required>
</div>
<div class="col-md-4 form-group">
<input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name" onkeypress="return /[a-z _]/i.test(event.key);"  required>
</div>
</div>

<div class="row mt-3">
<div class="col-md-6 form-group mt-3 mt-md-0">
<input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
</div>          
<div class="col-md-6 form-group">
<input type="tel" class="form-control" name="mobile" id="mobile" placeholder="Mobile Number" pattern="[0-9]{10}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" title="Enter 10 Digit Mobile Number" required>
</div>            
</div>          
<div class="row mt-3">
<div class="col-md-4 form-group mt-3 mt-md-0">
<input type="text" class="form-control" name="education" id="education" placeholder="Your Qualification" onkeypress="return /[a-z _]/i.test(event.key);"  required>
</div>
<div class="col-md-4 form-group mt-3 mt-md-0">
<input type="text" class="form-control" name="apply" id="apply" placeholder="Apply For" onkeypress="return /[a-z _]/i.test(event.key);"  required>
</div>

<div class="col-md-4 form-group">
<input type="number" class="form-control" name="experience" id="experience" placeholder="Total Years of Experience" max="50" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" pattern="[0-9]{2}" required> 
</div>            
</div>                    
<div class="form-group mt-3">
<div class="col-md-12 form-group">
<textarea class="form-control" name="message" rows="5" placeholder="Cover Letter" required></textarea>
</div>
</div>
<div class="row mt-3">
<label>Upload CV</label>
<div class="col-sm-8">                    
    <input class="col-sm-6" type="file" accept="application/pdf" name="resume" id="exampleInputFile">
    </div>
</div>
</div>
<div class="text-center"><button name="resume" type="submit">Send Message</button></div>
</form>
</div>
</div>

</div>
</div>
</div>
</section> 
<div>
</div>
</section><!-- End Contact Section -->


  <?php }?>
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