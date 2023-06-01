<?php
include("../data.php");
$jobtitle=null;
$city=null;
if(isset($_GET['jobtitle'])) {    
$jobtitle = $_GET["jobtitle"];
}
if(isset($_GET['city'])) {    
$city = $_GET["city"];
}

if(($jobtitle==null || !$jobtitle) && ($city==null || !$city)) { 
  $query = "SELECT * FROM career WHERE display_status='enable'";
}elseif(!empty($jobtitle) && ($city==null || !$city)) {
  $query = "SELECT * FROM career WHERE display_status='enable' and job_name='$jobtitle'";
}elseif(!empty($city) && ($jobtitle==null || !$jobtitle)) {
  $query = "SELECT * FROM career WHERE display_status='enable' and city='$city'";
}elseif(!empty($city) && !empty($jobtitle)) {
  $query = "SELECT * FROM career WHERE display_status='enable' and job_name='$jobtitle' and city='$city'";
}

$career_tbl=mysqli_query($db, $query);

?>
<style>
  .header{
    margin-top:5px;
  }
  .jobsearch .input-group{
    background-color: rgba(197, 186, 169, 0.8);
    padding: 10px 10px 10px 10px;
  }
  .jobsearch h2{
    margin-top: 85px;
    text-align: center;
    color:#ffb03b;
    font-size: 45px;
    
  }
  .jobsearch .search-btn{
    background: #ffb03b;
    border: 0;    
    color: #fff;
    transition: 0.4s;
  }
  .jobsearch .search-btn:hover{
    background: #000;
  }

  .career{
 margin-top: -20px; 
}

.career .container{   
  width: 900px;    
}

.career .joblist{
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
          
          <li><a class="nav-link scrollto" href="../#gallery">Gallery</a></li>
          <li><a class="nav-link scrollto" href="../#contact">Contact</a></li>
          <li class="dropdown"><a href="#"><span>Career</span></a>
            <ul>              
              <li><a href="#">Offering a Job</a></li>
              <li><a href="job.php">Need a Job</a></li>              
            </ul>
          </li>
          <?php if(!isset($_SESSION["username"]) && !isset($_SESSION["usertype"])) { ?>
          <li><a type="submit" onclick="signin()" class="book-a-table-btn scrollto">Sign In</a><li>
         <li><a type="submit" onclick="signup()" class="book-a-table-btn scrollto" style="margin-top:5px;">Sign Up</a><li>
         <?php } 
         elseif(isset($_SESSION["username"])  && ($_SESSION["usertype"])=="Customer") { ?>
         <li class="dropdown"><a class="nav-link scrollto bi bi-person-circle" href="#" style="font-size:35px;"></a>
            <ul>              
              <li><a href="..user/index.php">My Account</a></li>
              <li><a href="..user/booking.php">Booking</a></li>                                         
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



<section class="jobsearch">
<div class="container">        
    <h2><span>Recruitment</span></h2>         
          <!--<div class="input-group mb-12">
            <input type="text" class="form-control" id="job_title" placeholder="Search Job">
              <div class="input-group-append col-lg-3">
                <select class="form-control" name="city" id="city">
                                              <option selected disabled>Select City</option>
                                              <?//php while($row=mysqli_fetch_assoc($career_city)){?>
                                              <option><?//php echo ucfirst($row["city"]);?></option>                                              
                                              <?php // } ?>
                                          </select>
              </div>  
              <button class="search-btn" onclick="search()" type="button">Search</button>  
          </div> -->
</div>
</secion>

<section class="career">
<?php while($row=mysqli_fetch_assoc($career_tbl)){?>
      <div class="container">      
        <div class="col-lg-12 mt-lg-0">        
          <div class="container">          
            <div class="tab-content">            
            <div class="tab-pane active show" id="career">            
                <div class="row mt-5 joblist">                
                <div class="col-lg-10">
                      <div class="row">                      
                      <p class="jobtitle"><?php echo ucfirst($row["job_name"]);?></p>                  
                      </div>
                      <div class="row">                
                        <p class="city bx bxs-map"> Location:- <?php echo ucfirst($row["city"]);?></p>                  
                      </div>
                      <div class="row">   
                        <div class="col-lg-3">             
                          <p class="experience bx bxs-medal"> Experience:- <a><?php echo ucfirst($row["experience"]);?></a></p>                  
                        </div>
                        <div class="col-lg-3">             
                          <p class="sallary bx bx-rupee"> Sallery:- <?php echo ucfirst($row["sallery"]);?></p>                  
                        </div>                        
                        <div class="col-lg-6">             
                          <p class="education bx bxs-briefcase"> Qualification:- <?php echo ucfirst($row["education"]);?></p>                  
                        </div>                        
                      </div>
                      <div class="row">        
                        <div class="col-lg-12">      
                            <p class="jobdetailbx bx bxs-file"> Job Detail:- <?php echo ucfirst($row["jobdetail"]);?></p>              
                        </div>
                      </div>
                </div>
                <div class="col-lg-2">
                <button class="search-btn" onclick="submit(<?php echo ($row['id']);?>)" type="button">Apply</button>                             
                </div>                
                </div>                
              </div>              
            </div>             
        </div>
        </div>
        </div>        
      </div>
      <?php } ?>    
    </section><!-- End Contact Section -->  

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Engineer's Chai</h3>
      
      <div class="social-links">
      <a href="https://www.instagram.com/engineerschai" class="instagram"><img src="../assets/img/icon/instagram.png"></a>
        <a href="https://www.facebook.com/engineerschai" class="facebook"><img src="../assets/img/icon/facebook.png"></a>
        <!--<a href="https://twitter.com/engineerschai" class="twitter"><img src="../assets/img/icon/twitter.png"></a>  -->
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


function search() {  
 xhttp = new XMLHttpRequest();
city = document.getElementById("city").value;
jobtitle = document.getElementById("job_title").value;
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      window.location.href = this.responseText;   
    }
  };
  xhttp.open("GET", "../data.php?search&jobtitle="+jobtitle+"&city="+city, true);
  xhttp.send(); 
}

function submit(job_id) {  
 xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      window.location.href = this.responseText;   
    }
  };
  xhttp.open("GET", "../data.php?jobappln="+job_id, true);
  xhttp.send(); 
}

</script>

</body>

</html>