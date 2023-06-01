<?php
include("../data.php");
require 'session.php';

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
.book{
 margin-top: -20px; 
}

.book .container{   

  width: 900px;    
}

.fa{
  font-size:18px;
}
.fa-times-circle-o{
  color: red;
}

.fa-check-circle-o{
  color: green;
}

.book .book-form, .book .reset-form{
  margin-left: -10px;
  background: #fff;
  padding: 30px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.book button{
  background: #ffb03b;
border: 0;
padding: 10px 24px;
color: #fff;
transition: 0.4s;
border-radius: 50px;
}
.book button:hover{
  background: #000;
}

.book .sent-message{
  display: none;
  color: green;
}

@media (max-width: 991px) {
  .book{
 margin-top: -50px; 
}
.fa{
  font-size:15px;
}
.title h2{
  margin-top: 20px
}
  .book .container{   
  width: 100%;    
}
.book .book-form, .book .reset-form{
margin-left:0px;
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
  <link href="../assets/css/font-awesome.min.css" rel="stylesheet" />

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
              <li><a href="index.php">My Account</a></li>
              <li><a href="#">Booking</a></li>                                         
              <li><a href="../logout.php">Logout</a></li>              
            </ul>
          </li>
          </ul>
          <?php } 
          elseif(isset($_SESSION["username"])  && ($_SESSION["usertype"])=="Admin") { ?>
         <li class="dropdown"><a class="nav-link scrollto bi bi-person-circle" href="#" style="font-size:35px;"></a>
            <ul>              
              <li><a href="admin/">My Account</a></li>              
              <li><a href="logout.php">Logout</a></li>              
            </ul>
         </li>
          </ul>
          <?php }
          elseif(isset($_SESSION["username"])  && ($_SESSION["usertype"])=="Owner") { ?>
         <li class="dropdown"><a class="nav-link scrollto bi bi-person-circle" href="#" style="font-size:35px;"></a>
            <ul>              
            <li><a href="owner/">My Account</a></li>              
              <li><a href="logout.php">Logout</a></li>              
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

<section class="title col-lg-12 align-items-center">

                <h2><span>My Booking</span></h2>         

</secion>

<section>
<div class="book">
      <div class="container">
        <div class="row">          
            <ul class="nav nav-tabs flex-row">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#table">Table</a>
              </li>              
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#Event">Events</a>
              </li>              
            </ul>
          </div>
          <div class="col-lg-10 mt-5 mt-lg-0">
          <div class="container">
            <div class="tab-content">
              <div class="tab-pane active show" id="table" style="overflow-x:auto;">

              <table class="table table-striped table-advance table-hover">
                  <tbody >               
                  <tr>
                  <th>SN</th>
                    <th>People</th>                    
                    <th>Time</th>
                    <th>Date</th>  
                    <th>Status</th>                    
                    <th>Action</th>
                  </tr> 
                  
                  <?php $email = $_SESSION['email'];
                     $query = "SELECT * FROM book_table WHERE cust_email = '$email' ORDER BY cust_date DESC"; 
                     $run = mysqli_query($db, $query);
                     $i=1;
                      while($row = $run->fetch_array()){?>
                  <tr>
                  <td><?php echo $i ?></td>
                    <td><?php echo ucfirst($row["cust_people"]);?></td>                                        
                    <td><?php echo ucfirst($row["cust_time"]);?></td>      
                    <td><?php echo ($row["cust_date"]);?></td>
                    <td><?php echo ($row["cust_status"]);?></td>                    
                    <td><select>
                                              <option disabled selected>Select Option</option>
                                              <?php if($row["cust_status"] != "Accepted"){?>
                                                <option id="cancle_table" onclick="cancle_table(<?php echo $row['id'];?>)">Cancle</option>                                              
                                              <?php } ?>                            
                                          </select>
                    </td>                    
                    
                  </tr>                  
                  <?php $i++;}?>
                  
                </tbody>
              </table>

         </div>        

         <div class="tab-pane" id="Event" style="overflow-x:auto;">
         <table class="table table-striped table-advance table-hover">
                  <tbody >               
                  <tr>
                  <th>SN</th>
                    <th>Event Name</th>                    
                    <th>Fee</th>  
                    <th>City</th>
                    <th>Date</th>  
                    <th>Status</th>                    
                    <th>Action</th>
                  </tr> 
                  
                  <?php $email = $_SESSION['email'];
                     $query = "SELECT * FROM book_event WHERE cust_email = '$email' ORDER BY reg_date DESC"; 
                     $run = mysqli_query($db, $query);
                     $i=1;
                      while($row = $run->fetch_array()){?>
                  <tr>
                  <td><?php echo $i ?></td>
                    <td><?php echo ucfirst($row["event_name"]);?></td>                                        
                    <td><?php echo ucfirst($row["event_fee"]);?></td>     
                    <td><?php echo ucfirst($row["event_date"]);?></td>      
                    <td><?php echo ($row["cust_city"]);?></td>
                    <td><?php echo ($row["cust_status"]);?></td>                    
                    <td><select>
                                             <option disabled selected>Select Option</option>
                                              <?php if($row["cust_status"] != "Accepted"){?>
                                                <option id="cancle_event" onclick="cancle_event(<?php echo $row['id'];?>)">Cancle</option>                                              
                                              <?php } ?>                                                   
                                          </select>
                    </td>                    
                    
                  </tr>                  
                  <?php $i++;}?>
                  
                </tbody>
              </table>
        </div>              
        </div>
        </div>
        </div>
</div>
        </section>       


        

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Engineer's Chai</h3>
      
      <div class="social-links">
      <a href="https://www.instagram.com/engineerschai" class="instagram"><img src="../assets/img/icon/instagram.png"></a>
        <a href="https://www.facebook.com/engineerschai" class="facebook"><img src="../assets/img/icon/facebook.png"></a>
        <!-- <a href="https://twitter.com/engineerschai" class="twitter"><img src="../assets/img/icon/twitter.png"></a> -->
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
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
    

    function cancle_table(table_id){
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      alert(this.responseText);   
      location.reload();  
    }
  };
  xhttp.open("GET", "../data.php?cancletable="+table_id, true);
  xhttp.send(); 
}

function cancle_event(event_id){
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      alert(this.responseText);   
      location.reload();  
    }
  };
  xhttp.open("GET", "../data.php?cancleevent="+event_id, true);
  xhttp.send(); 
}
  </script> 

</body>

</html>