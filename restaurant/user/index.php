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
.profile{
 margin-top: -20px; 
}

.profile .container{   

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

.profile .profile-form, .profile .reset-form{
  margin-left: -10px;
  background: #fff;
  padding: 30px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.profile button{
  background: #ffb03b;
border: 0;
padding: 10px 24px;
color: #fff;
transition: 0.4s;
border-radius: 50px;
}
.profile button:hover{
  background: #000;
}

.profile .sent-message{
  display: none;
  color: green;
}

@media (max-width: 991px) {
  .profile{
 margin-top: -50px; 
}
.fa{
  font-size:15px;
}
.title h2{
  margin-top: 20px
}
  .profile .container{   
  width: 100%;    
}
.profile .profile-form, .profile .reset-form{
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
              <li><a href="#">My Account</a></li>
              <li><a href="booking.php">Booking</a></li>                                         
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

                <h2><span>My Account</span></h2>         

</secion>
<?php $email = $_SESSION['email'];
                     $query = "SELECT * FROM user WHERE email = '$email'"; 
                     $run = mysqli_query($db, $query);
 while($row = $run->fetch_array()){?>
<section>
<div class="profile">
      <div class="container">
        <div class="row">          
            <ul class="nav nav-tabs flex-row">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#profile">My Detail</a>
              </li>              
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#reset">Change Password</a>
              </li>              
            </ul>
          </div>
          <div class="col-lg-10 mt-5 mt-lg-0">
          <div class="container">
            <div class="tab-content">
              <div class="tab-pane active show" id="profile">
                <div class="row">
                <form role="form" class="profile-form">
            <div class="form-group col-md-6 mt-3">            
              <label>First Name</label>
              <input type="text" name="fname" class="form-control" id="fname" placeholder="<?php echo ucfirst($row["f_name"]);?>" required disabled>            
            </div>
            <div class="form-group col-md-6 mt-3">            
            <label>Last Name</label>
              <input type="text" name="lname" class="form-control" id="lname" placeholder="<?php echo ucfirst($row["l_name"]);?>" required disabled>            
            </div>
            <div class="form-group col-md-6 mt-3">            
            <label>Mobileb Number</label>
              <input type="text" name="mobile" class="form-control" id="mobile" placeholder="<?php echo $row["mobile"];?>" required disabled>            
            </div>
            <div class="form-group col-md-6 mt-3">               
            <label>Email</label>
              <input type="text" class="form-control" name="email" id="email" placeholder="<?php echo $row["email"];?>" required disabled>            
          </div>         
        </form>
        </div>
         </div>        

         <div class="tab-pane" id="reset">
            <div class="row">
                <form action="" method="post" role="form" class="reset-form">
                <div class="row">
                <div class="form-group col-md-6 mt-3">       
                  <input type="text" name="old_password" class="form-control" id="old_password" placeholder="Old Password"  required>
                </div>
                <div class="form-group col-md-6 mt-3">       
                  <input type="text" name="new_password" class="form-control" id="new_password" placeholder="New Password"  required>
                </div>
                <div class="form-group col-md-6 mt-3">       
                  <input type="text" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password"  required>
                </div>
                <div class="form-group col-md-6 mt-3"> 
                  <label id="checkpass"></label>
                </div>                            
                <div class="form-group col-md-8 mt-3"> 
                <p class="fa fa-times-circle-o" id="passl"><a> Password must have in between 8 to 32 character.</a></p>
                <p class="fa fa-times-circle-o" id="Ualpha"><a> Password must have atleast one UPPERCASE character i.e. [A-Z]. </a></p>
                <p class="fa fa-times-circle-o" id="lalpha"><a> Password must have atleast one lowercase character i.e. [a-z]. </a></p>
                <p class="fa fa-times-circle-o" id="num"><a> Password must have atleast one number i.e. [0-9]. </a></p>
                <p class="fa fa-times-circle-o" id="symbol"><a> Password must atleast one special character i.e. !@#$%^&*<>. </a></p>              
              </div>
              </div>
          <div class="text-center col-md-6 mt-3"><button name="updatepass" id="updatepass" value="<?php echo $row["id"]; ?>" type="submit" disabled>Send Message</button></div>
        </form>
        </div>
         </div>              
        </div>
        </div>
        </div>
</div>
        </section> 
        <?php } ?>


        <?php if(isset($_GET['success'])) {
      $status= $_GET['success'];
    if($status==1){  ?>
    <div class="modal fade" id="myModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">Notification</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          Password Successfully Update.
          </div>
          <div class="modal-footer">            
            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Ok</button>
          </div>
        </div>
      </div>
    </div>
        <?php } } ?>

        <?php if(isset($_GET['error'])) {
      $status= $_GET['error'];
    if($status==1){  ?>
    <div class="modal fade" id="myModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">Notification</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

          Please Enter Your Correct Current Password.

          </div>
          <div class="modal-footer">
            
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Ok</button>
          </div>
        </div>
      </div>
    </div>
        <?php } } ?>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Engineer's Chai</h3>
      
      <div class="social-links">
      <a href="https://www.instagram.com/engineerschai" class="instagram"><img src="../assets/img/icon/instagram.png"></a>
        <a href="https://www.facebook.com/engineerschai" class="facebook"><img src="../assets/img/icon/facebook.png"></a>
      <!--  <a href="https://twitter.com/engineerschai" class="twitter"><img src="../assets/img/icon/twitter.png"></a> -->
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
    var newpass = document.querySelector('#new_password');
    var confpass = document.querySelector('#confirm_password');
    var i=0;
    newpass.addEventListener('keyup',function(){     
      if(newpass.value.length == 0 || newpass.value.length < 8 || newpass.value.length > 32){              
        document.getElementById('passl').className = 'fa fa-times-circle-o';         
        document.getElementById('passl').value  = 0;              
      }else{        
        document.getElementById('passl').className  = 'fa fa-check-circle-o';              
        document.getElementById('passl').value  = 1;                      
      }

      if((/^(?=.*[A-Z])/).test(newpass.value) == false){              
        document.getElementById('Ualpha').className = 'fa fa-times-circle-o'; 
        document.getElementById('Ualpha').value  = 0;              
       }else{                 
        document.getElementById('Ualpha').className  = 'fa fa-check-circle-o';               
        document.getElementById('Ualpha').value  = 1;
      }

      if((/^(?=.*[a-z])/).test(newpass.value) == false){
        document.getElementById('lalpha').className = 'fa fa-times-circle-o'; 
        document.getElementById('lalpha').value  = 0;              
       }else{                      
        document.getElementById('lalpha').className  = 'fa fa-check-circle-o';              
        document.getElementById('lalpha').value  = 1;
      }

      if((/^(?=.*[0-9])/).test(newpass.value) == false){
        document.getElementById('num').className = 'fa fa-times-circle-o'; 
        document.getElementById('num').value  = 0;              
       }else{                      
        document.getElementById('num').className  = 'fa fa-check-circle-o';              
        document.getElementById('num').value  = 1;
      }

      if((/^(?=.*[~!@#$%^&*<>])/).test(newpass.value) == false){
        document.getElementById('symbol').className = 'fa fa-times-circle-o'; 
        document.getElementById('symbol').value  = 0;              
       }else{                      
        document.getElementById('symbol').className  = 'fa fa-check-circle-o';              
        document.getElementById('symbol').value  = 1;
      }

      i = document.getElementById('passl').value + document.getElementById('Ualpha').value + document.getElementById('lalpha').value + document.getElementById('num').value +  document.getElementById('symbol').value; 
      console.log(i);
      if(i==5){
        if(confpass.value == newpass.value){
        document.getElementById('updatepass').disabled  = false;              
        document.getElementById('checkpass').innerHTML  = "Password Matched";   
        document.getElementById('checkpass').style.color  = "green";                         
        }else{
        document.getElementById('updatepass').disabled  = true;              
        document.getElementById('checkpass').innerHTML  = "Password not matched";              
        document.getElementById('checkpass').style.color  = "red";              
        }
      }else{
        document.getElementById('updatepass').disabled  = true;              
        document.getElementById('checkpass').innerHTML  = "Password not matched";              
        document.getElementById('checkpass').style.color  = "red";              
        }      

    })

    
    confpass.addEventListener('keyup',function(){
      i = document.getElementById('passl').value + document.getElementById('Ualpha').value + document.getElementById('lalpha').value + document.getElementById('num').value +  document.getElementById('symbol').value; 
      console.log(i);
      if(i==5){
        if(confpass.value == newpass.value){
        document.getElementById('updatepass').disabled  = false;              
        document.getElementById('checkpass').innerHTML  = "Password Matched";   
        document.getElementById('checkpass').style.color  = "green";                         
        }else{
        document.getElementById('updatepass').disabled  = true;              
        document.getElementById('checkpass').innerHTML  = "Password not matched";              
        document.getElementById('checkpass').style.color  = "red";              
        }
      }else{
        document.getElementById('updatepass').disabled  = true;              
        document.getElementById('checkpass').innerHTML  = "Password not matched";              
        document.getElementById('checkpass').style.color  = "red";              
        }      
    })
    
    $('document').ready(function() {
      
        $("#myModal1").modal('show');
    });

   
  </script> 

</body>

</html>