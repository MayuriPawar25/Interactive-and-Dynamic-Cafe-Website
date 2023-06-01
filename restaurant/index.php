<?php
include("data.php");

if (isset($_GET['verification'])) {
  echo "<script>alert('Account Verification link sent to your email.');</script>";
}
if (isset($_GET['verified'])) {
  echo "<script>alert('Your account has been varified.');</script>";
}
if (isset($_GET['reset'])) {
  echo "<script>alert('Mail sent to your registered email account.');</script>";
}
if (isset($_GET['notify'])) {
  echo "<script>alert('Sorry Your account not verified, already sent Verification link to your registered account.');
  window.location.replace('user/reverification.php');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home-Engineer's Chai</title>
  
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.jpeg" rel="icon">
  <link href="assets/img/logo.jpeg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-left fixed-top topbar-transparent">
    <div class="container-fluid container-xl d-flex align-items-left justify-content-center justify-content-lg-start">
      <i class="bi bi-phone d-flex align-items-center"><a href="tel:+919960621000"><span>+91 9960621000</span></a></i>
      <i href="#" class="bi bi-clock ms-4 d-none d-lg-flex align-items-center"><span>Mon-Sun: 4:00 AM - 11:00 PM</span></i>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <div class="logo me-auto">
         <a href="index.php"><img src="assets/img/logo.png" alt="" class="img-fluid rounded"></a>
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#menu">Menu</a></li>
          <li><a class="nav-link scrollto" href="#specials">Specials</a></li>
          <li><a class="nav-link scrollto" href="#events">Events</a></li>          
          <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li class="dropdown"><a href="#"><span>Career</span></a>
            <ul>              
              <li><a href="career/index.php">Offering a Job</a></li>
              <li><a href="career/job.php">Need a Job</a></li>              
            </ul>
          </li>        
          <?php if(!isset($_SESSION["username"]) && !isset($_SESSION["usertype"])) { ?>
          <li><a type="submit" onclick="signin()" class="book-a-table-btn scrollto">Sign In</a><li>
         <li><a type="submit" onclick="signup()" class="book-a-table-btn scrollto" style="margin-top:5px;">Sign Up</a><li>
         <?php } 
         elseif(isset($_SESSION["username"])  && ($_SESSION["usertype"])=="Customer") { ?>
         <li class="dropdown"><a class="nav-link scrollto bi bi-person-circle" href="#" style="font-size:35px;"></a>
            <ul>              
              <li><a href="user/index.php">My Account</a></li>
              <li><a href="user/booking.php">Booking</a></li>                                         
              <li><a href="logout.php">Logout</a></li>              
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

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

        <!-- Slide offer -->
        
        <?php $i = 0;  while ($type=mysqli_fetch_assoc($offerslide)){           $i++;    
        if($i<2){ ?>
          <div class="carousel-item active">
              <?php } else { ?>
              <div class="carousel-item">
              <?php } ?>
          
          <div class="carousel-background"><img class="d-block w-100 h-100" src="assets/img/slide/<?php echo $type["slide_image"];?>" alt=""></div>
              <div class="carousel-container">
              <div class="carousel-content">                
                <p class="animate__animated animate__fadeInUp"><?php echo  $type["slide_detail"];?></p>
                <div>
                  
                 <!-- <a href="#book-a-table" class="btn-book animate__animated animate__fadeInUp scrollto">Book a Table</a>-->
                </div>
              </div>
            </div>
          </div>  
        <?php } ?>
          <!-- Slide -->
          <?php  while ($type=mysqli_fetch_assoc($slide)){                
          $i++;
          if($i<2){ ?>
          <div class="carousel-item active">
              <?php } else { ?>
              <div class="carousel-item">
              <?php } ?>
          <div class="carousel-background"><img class="d-block w-100 h-100" src="assets/img/slide/<?php echo $type["slide_image"];?>" alt=""></div>
              <div class="carousel-container">
              <div class="carousel-content">                
                <p class="animate__animated animate__fadeInUp"><?php echo  $type["slide_detail"];?></p>
                <div>
                  <a href="#book-a-table" class="btn-book animate__animated animate__fadeInDown scrollto">Book a Table</a>                
                  
                </div>
              </div>
            </div>
          </div>  
          <?php } ?>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">

          <div class="col-lg-5 align-items-stretch video-box" style='background-image: url("assets/img/about.png");'>
          
            <a href="https://www.youtube.com/watch?v=vEvTXGiqW24" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch">

            <div class="content">
              <h3 style="color: rgb(255, 255, 255);"><strong>Engineering is incomplete without chai...</strong><br>sooo here it is... come sit relax and enjoy the chai... Dedicated to all Engineers.</h3>
                          
            </div>

          </div>

        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Whu Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="section-title">
          <h2>Why choose <span>Our Cafe</span></h2>
        </div>

        <div class="row">

          <div class="col-lg-3">
            <div class="box">
                <center><img src="assets/img/about/no time limit.svg" class="image"></center>
                <div class="detail animate__animated animate__fadeIn">
                  <h4>No Limit</h4>
                  <p>You can stay here for unlimited time.</p>
                </div>
            </div>
          </div>

          <div class="col-lg-3 mt-4 mt-lg-0">
            <div class="box">
                <center><img src="assets/img/about/self study.svg" class="image"></center>
                <div class="detail animate__animated animate__fadeIn">
              <h4>Self Study</h4>
              <p>Students can study here.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 mt-4 mt-lg-0">
            <div class="box">
                <center><img src="assets/img/about/special-talent.svg" class="image"></center>
                <div class="detail animate__animated animate__fadeIn">
              <h4>Special Talent</h4>
              <p>Here you can open up your special talent like Music, Dancing, Standup Comedy, etc.</p>
              </div>
            </div>
`          </div>
          
          <div class="col-lg-3 mt-4 mt-lg-0">
            <div class="box">
                <center><img src="assets/img/about/offline chat.svg" class="image"></center>
                <div class="detail animate__animated animate__fadeIn">
            <h4>Offline Chat</h4>
              <p>Cafe doesn't provide wifi because our moto is to get people more closer.</p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Whu Us Section -->
    
    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">      
      <div class="container">

        <div class="section-title">
          <h2>Check our tasty <span>Menu</span></h2>
        </div>

        <div class="row">        
          <div class="col-lg-6">
            <div class="section-title-veg">
              <h2><span>Veg</span></h2>
            </div>
            <div class="swiper-container swiper-container-v">
              <div class="swiper-wrapper">                
                              
                <div class="swiper-slide">
                  <div class="swiper-container swiper-container-veg"><h2 style="margin-top: 15px;"></h2>
                    <div class="swiper-wrapper">                      
                    <?php foreach ($vegmenu_category as $type){ ?>    
                          <div class="swiper-slide slide-menu" onclick="vegmenu('<?php echo $type['menu_cat_name'];?>')">
                            <div class="row">                              
                                <img src="assets/img/menu/category/<?php echo $type["menu_cat_image"];?>" alt="">                              
                              <div class="menu-cat">                               
                                  <a><strong><?php echo ucfirst($type['menu_cat_name']);?></strong></a><br>                                                                
                              </div>
                            </div>
                          </div>                  
                        <?php } ?>                       
                    </div>                    
                  </div>                

                  <div class="swiper-container swiper-container-mveg">
                    <div class="swiper-wrapper">                      
                      <?php foreach ($vegmenu_category as $type){?>
                          <div class="swiper-slide slide-menu" onclick="vegmenu('<?php echo $type['menu_cat_name'];?>')">
                            <div class="row">
                            <img src="assets/img/menu/category/<?php echo $type["menu_cat_image"];?>" alt="">                              
                              <div class="menu-cat">                               
                                  <a><strong><?php echo ucfirst($type['menu_cat_name']);?></strong></a><br>                                                                
                              </div>                              
                            </div>
                          </div>                          
                        <?php } ?>                                            
                    </div>                    
                </div>
                <div class="swiper-button-next swiper-veg-next"></div>
                <div class="swiper-button-prev swiper-veg-prev"></div>
                </div>
              </div>
              
            </div> 
            </div>
            <div class="col-lg-6">
            <div class="section-title-nonveg">
          <h2><span>Non-Veg</span></h2>
        </div>
            <div class="swiper-container swiper-container-v">
              <div class="swiper-wrapper">                

              <div class="swiper-slide">
                  <div class="swiper-container swiper-container-nonveg"><h2 style="margin-top: 15px;"></h2>
                    <div class="swiper-wrapper">                      
                    <?php foreach ($nonvegmenu_category as $type){ ?>    
                          <div class="swiper-slide slide-menu" onclick="nonvegmenu('<?php echo $type['menu_cat_name'];?>')">
                            <div class="row">                              
                                <img src="assets/img/menu/category/<?php echo $type["menu_cat_image"];?>" alt="">                              
                              <div class="menu-cat">                               
                                  <a><strong><?php echo ucfirst($type['menu_cat_name']);?></strong></a><br>                                                                
                              </div>
                            </div>
                          </div>                  
                        <?php } ?>                       
                    </div>                    
                  </div>                

                  <div class="swiper-container swiper-container-mnonveg">
                    <div class="swiper-wrapper">                      
                      <?php foreach ($vegmenu_category as $type){?>
                          <div class="swiper-slide slide-menu" onclick="nonvegmenu('<?php echo $type['menu_cat_name'];?>')">
                            <div class="row">
                            <img src="assets/img/menu/category/<?php echo $type["menu_cat_image"];?>" alt="">                              
                              <div class="menu-cat">                               
                                  <a><strong><?php echo ucfirst($type['menu_cat_name']);?></strong></a><br>                                                                
                              </div>                              
                            </div>
                          </div>                          
                        <?php } ?>                                            
                    </div>                    
                </div>
                <div class="swiper-button-next swiper-nonveg-next"></div>
                <div class="swiper-button-prev swiper-nonveg-prev"></div>
                </div>                          
              </div>             
            </div> 
            </div>
            </div>

      </div>
    </section>

    <!-- ======= Specials Section ======= -->
    <section id="specials" class="specials">
      <div class="container">

        <div class="section-title">
          <h2>Check our <span>Specials Menu</span></h2> 
        </div>

        <div class="row">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">             

              <?php $i = 1; foreach ($spclmenu_category as $type){       
             $arr = explode(' ',trim($type['menu_cat_name']));             
             if($i==1) {?>      
            <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-<?php echo $arr[0];?>"><?php echo $type['menu_cat_name'];?></a>
              </li>
            <?php } else { ?> 
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-<?php echo $arr[0];?>"><?php echo $type['menu_cat_name'];?></a>
              </li>
              <?php } $i++; } ?>            

            </ul>
          </div>

          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
            <?php $i = 1; foreach ($spclmenu_table as $row){  
              $arr = explode(' ',trim($row['category']));             
               $ctgry= $row['category'];
                 $query = "SELECT * FROM menu WHERE category = '$ctgry' and menu_type='Special' ";
                $result=mysqli_query($db, $query);
              if($i==1) { ?>      
              <div class="tab-pane active show" id="tab-<?php echo $arr[0];?>">
                <div class="row">                  
              <?php  while ($row=mysqli_fetch_assoc($result)){ ?>
                  <div class="col-lg-4 spclmenu">
                    <img class="d-block w-100 h-100" src="assets/img/menu/<?php echo $row["menu_image"];?>" alt="" class="img-fluid">
                  </div>
                  <div class="col-lg-2 details spclmenu">
                    <h3><?php echo ucfirst($row['menu_name']);?></h3>
                    <a>&#8377;<?php echo $row['price'];?></a>                   
                    <p class="font-italic"><?php echo $row['menu_detail'];?></p>                    
                  </div>
                <?php } ?>
              </div>
              </div>
              <?php } else { ?> 
                <div class="tab-pane" id="tab-<?php echo $arr[0];?>">
                <div class="row">                  
                <?php while ($row=mysqli_fetch_assoc($result)){ ?>
                  <div class="col-lg-4 spclmenu">
                    <img class="d-block w-100 h-100" src="assets/img/menu/<?php echo $row["menu_image"];?>" alt="" class="img-fluid">
                  </div>
                  <div class="col-lg-2 details spclmenu">
                    <h3><?php echo ucfirst($row['menu_name']);?></h3>
                    <a>&#8377;<?php echo $row['price'];?></a>                   
                    <p class="font-italic"><?php echo $row['menu_detail'];?></p>                    
                  </div>
                <?php } ?>
                </div>
              </div>
              <?php } $i++; } ?>            
              </div>
            </div>
              
              </div>
            </div>
          </div>
        
    </section><!-- End Specials Section -->

    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table">
      <div class="container">   

        <div class="section-title">
          <h2>Book a <span>Table</span></h2>        
        </div>
        <?php if(!isset($_SESSION["username"])) { ?>
        <form action="" method="POST" role="form" class="php-email-form">
          <div class="row">
            <div class="col-lg-4 col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" onkeypress="return /[a-z _]/i.test(event.key);"  required disabled>
          
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" disabled>
          
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
              <input type="number" class="form-control" name="phone" id="phone" placeholder="Your Phone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  required disabled>
          
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input type="date" name="date" class="form-control" id="date" placeholder="Date" required>
          
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input type="time" class="form-control" name="time" id="time" placeholder="Time" required>
          
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input type="number" class="form-control" name="people" id="people" placeholder="# of people" min="5" pattern=".{1,2}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  required>
          
            </div>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
          </div>
          <div class="form-group mt-3">
            <p style="color: red;">*Note: Minimum 5 People will be allow.</p>
          </div>
          
            <div class="text-center"><button type="submit" onclick="signin()" name="book-table">Sign In</button></div>
           <?php } else if(isset($_SESSION["username"])) { 
             $email = $_SESSION['email'];
             $query = "SELECT * FROM user WHERE email = '$email'"; 
             $run = mysqli_query($db, $query);
            while($row = $run->fetch_array()){?>     
      <form action="" method="POST" role="form" class="php-email-form">
        <div class="row">
          <div class="col-lg-4 col-md-6 form-group">
            <input type="text" name="name" class="form-control" id="name" placeholder="<?php echo ucfirst($row['f_name']) ." ". ucfirst($row['l_name']);?>" value="<?php echo ucfirst($row['f_name']) ." ". ucfirst($row['l_name']);?>" onkeypress="return /[a-z _]/i.test(event.key);"  required disabled>
        
          </div>
          <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
            <input type="email" class="form-control" name="email" id="email" placeholder="<?php echo $row['email'];?>" data-rule="email" value="<?php echo ($row['email']);?>" data-msg="Please enter a valid email" disabled>
        
          </div>
          <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
            <input type="number" class="form-control" name="phone" id="phone" placeholder="<?php echo $row['mobile'];?>" value="<?php echo $row['mobile'];?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  required disabled>
        
          </div>
          <div class="col-lg-4 col-md-6 form-group mt-3">
            <input type="date" name="date" class="form-control" id="date" placeholder="Date" required>
        
          </div>
          <div class="col-lg-4 col-md-6 form-group mt-3">
            <input type="time" class="form-control" name="time" id="time" placeholder="Time" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
        
          </div>
          <div class="col-lg-4 col-md-6 form-group mt-3">
              <input type="number" class="form-control" name="people" id="people" placeholder="# of people" min="5" pattern=".{5,}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  required>
        
          </div>
        </div>
        <div class="form-group mt-3">
          <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
        </div>        
        
        <div class="form-group mt-3">
            <p style="color: red;">*Note: Minimum 5 People will be allow.</p>
          </div>
            <div class="text-center"><button name="table_book" type="submit" value="<?php echo $row["email"]; ?>">Submit</button></div>
          <?php }} ?>
          
        </form>       
        
     </div>
   </section><!-- End Book A Table Section -->



    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container">      
        <div class="section-title">
          <h2>Organize your <span>Events</span> in our Restaurant</h2>
        </div>
      <div class="row">
          <!--completed event-->
      <div class="col-lg-6">
        <div class="section-title">
          <h2>Competed <span>Events</span></h2>
        </div>

        <div class="events-slider swiper-container">
          <div class="swiper-wrapper">
          <?php foreach ($compevent_table as $type){?>
            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-12">
                <img class="d-flex h-100 w-100" src="assets/img/events/<?php echo $type["event_image"];?>" alt="">
                </div>
                <div class="row">
                <div class="col-lg-12 pt-4 pt-lg-0 content">
                  <h3><?php echo $type["event_name"];?></h3>
                  <p class="font-italic">
                  <?php echo $type["event_detail"];?>
                  </p>                  
                </div>
                </div>
              </div>
            </div><!-- End testimonial item -->
            <?php }?> 

          </div>
          <div class="swiper-pagination"></div>
        </div>
        </div>
        <!--upcoming-->
        
        <div class="col-lg-6">
          <div class="section-title">
            <h2>Upcoming <span>Events</span></h2>
          </div>

          <div class="events-slider swiper-container">
            <div class="swiper-wrapper">

             <?php foreach ($upevcent_table as $type){?>
            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-12">
                <img class="d-flex h-100 w-100" src="assets/img/events/<?php echo $type["event_image"];?>" alt="">
                </div>
                <div class="row">
                  <div class="col-lg-12 pt-4 pt-lg-0 content">
                    <h3><?php echo $type["event_name"];?></h3>
                    <div class="col-lg-6 pt-4 pt-lg-0 content">
                    <div class="price">
                    <?php if($type["price"]=='Free' ) {  ?>
                      <p><span><?php echo $type["price"];?></span></p>
                      <?php }else {  ?>
                        <p><span>&#8377;<?php echo $type["price"];?></span></p>
                        <?php } ?>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content">
                    <h2><?php echo $type["event_date"];?></h2>
                    </div>
                    </div>
                    <p class="font-italic">
                    <?php echo $type["event_detail"];?>
                    </p>                  
                  </div>                  
                  <div class="text-center"><button type="submit" onclick="reg_event('<?php echo $type['id'];?>','<?php echo $type['event_name'];?>')">Book Event</button></div>                  
                  </div>
                
              </div>
            </div><!-- End testimonial item -->
            <?php }?> 

            </div>
            <div class="swiper-pagination"></div>
          </div>
          </div>

        </div>
        </div>
      </section><!-- End Events Section -->    
      <?php if(isset($_SESSION["username"])) { 
        $email = $_SESSION['email'];
        $query = "SELECT * FROM user WHERE email = '$email'"; 
        $run = mysqli_query($db, $query);
       while($row = $run->fetch_array()){?>     
    <div class="modal fade" id="EventForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
        <form action="" method="POST" role="form">
          <div class="modal-header">
            <h2 class="modal-title">Event Form - <a name="eventname" id="eventname"></a></h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">          
            <div class="col-md-12 form-group">
              <input type="text" name="name" class="form-control" placeholder="<?php echo ucfirst($row['f_name']) ." ". ucfirst($row['l_name']);?>" onkeypress="return /[a-z _]/i.test(event.key);"  required disabled>
            </div>
          <div class="row mt-3">
            <div class="col-md-6 form-group">
            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="<?php echo $row['mobile'];?>" required disabled>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="<?php echo $row['email'];?>" required disabled>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-md-6 form-group">
            <input type="text" name="city" class="form-control" placeholder="Your City" onkeypress="return /[a-z _]/i.test(event.key);"  required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
            <input type="number" class="form-control" name="pincode" placeholder="Pincode" min="100000" max="999999" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" title="Enter 6 digit pincode." required>
            </div>
          </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-success" type="submit" name="book_event" id="book_event" value="">Submit</button>
          </div>
        </div>
       </form>
      </div>
    </div>
    <?php } } 
     elseif(!isset($_SESSION["username"])) { ?>
    <div class="modal fade" id="EventForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">            
            <h2 class="modal-title">Sign In Require</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>   
          <p id="eventname" style="display: none;"></p>
          <p id="book_event" style="display: none;"></p>
          <div class="modal-footer">
          <a type="submit" onclick="signin()" class="book-a-event-btn scrollto">Sign In</a>
          </div>
        </div>
      </div>
    </div>
<?php } ?>

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container-fluid">

        <div class="section-title">
          <h2><span>Gallery</span></Picture></h2>          
        </div>

        <div class="row no-gutters">

          <?php $i = 1; while($row=mysqli_fetch_assoc($gallery)){?>
          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/<?php echo $row["img_name"];?>" class="gallery-lightbox">
                <img src="assets/img/gallery/<?php echo $row["img_name"];?>" alt="" class="img-fluid">
              </a>
            </div>
          </div>
          <?php $i++;} ?>         

        </div>

      </div>
    </section><!-- End Gallery Section -->   

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container position-relative">

        <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">            
            <?php while($row=mysqli_fetch_assoc($feedback_tbl)){?>            
            <div class="swiper-slide">
              <div class="testimonial-item">                
                <h3><?php echo $row["test_name"];?></h3>                
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  <h3><?php echo $row["test_message"];?></h3>
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->           
            <?php $i++;} ?>   
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="section-title">
          <h2><span>Contact</span> Us</h2>          
        </div>        
      </div>

      <div class="row">
        <div class="col-lg-6">
          <div>
            <iframe style="border:0; width: 100%; height: 365px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15139.759759608054!2d73.8397061!3d18.4410359!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x244055304c89afb7!2sEngineers%20Chai!5e0!3m2!1sen!2sin!4v1614597715754!5m2!1sen!2sin" frameborder="0" allowfullscreen></iframe>         
          </div>
        </div>
        <div class="col-lg-6">
          <div class="info-wrap">          
            <div class="col-lg-10 col-md-6 info">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>               
              <p>GA -01 KADAM PLAZA NEXT TO CCD PUNE BANGLORE HIGHWAY NH-4 OPP SWAMI NARAYAN
                MANDIR AMBEGAON,Maharashtra
                Pune, Maharashtra 411046
                India</p>
            </div>
            <br>
            <div class="col-lg-12 col-md-6 info mt-4 mt-lg-0">
              <i class="bi bi-clock"></i>
              <h4>Open Hours:</h4>
              <p>Monday-Sun:  4:00 AM - 11:00 PM</p>
            </div>
            <br>
            <div class="col-lg-12 col-md-6 info mt-4 mt-lg-0">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <a href="mailto:contact@engineerschai.com"><p>contact@engineerschai.com</p></a>
            </div>
            <br>
            <div class="col-lg-12 col-md-6 info mt-4 mt-lg-0">
              <i class="bi bi-phone"></i>
              <h4>Call:</h4>
              <a href="tel:+919960621000"><p>+9199606 21000</p></a>
            </div>
          </div>
        </div>
      </div>        
             
      <section>
      <div class="container">
        <div class="row">          
            <ul class="nav nav-tabs flex-row">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#feedback">Feedback</a>
              </li>              
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#franchise">Franchise</a>
              </li>              
            </ul>
          </div>
          <div class="col-lg-10 mt-5 mt-lg-0">
          <div class="container">
            <div class="tab-content">
              <div class="tab-pane active show" id="feedback">
                <div class="row">
                <form method="post" role="form" class="php-email-form">
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" onkeypress="return /[a-z _]/i.test(event.key);"  required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" onkeypress="return /[a-z _]/i.test(event.key);"  required>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
          </div>
          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div>
          <div class="text-center"><button name="feedback" type="submit">Send Message</button></div>
        </form>
        </div>
         </div>        

         <div class="tab-pane" id="franchise">
                <div class="row">
                <form action="" method="post" role="form" class="php-email-form">
          <div class="row">
            <div class="col-md-4 form-group">
              <input type="text" name="fname" class="form-control" id="name" placeholder="First Name" onkeypress="return /[a-z _]/i.test(event.key);"  required>
            </div>
            <div class="col-md-4 form-group">
              <input type="text" name="mname" class="form-control" id="name" placeholder="Middle Name" onkeypress="return /[a-z _]/i.test(event.key);"  required>
            </div>
            <div class="col-md-4 form-group">
              <input type="text" name="lname" class="form-control" id="name" placeholder="Last Name" onkeypress="return /[a-z _]/i.test(event.key);"  required>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2 form-group">
            <input type="tel" class="form-control" name="mobile" id="mobile" placeholder="Mobile" pattern="[0-9]{10}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" title="Enter 10 Digit Mobile Number" required>
            </div>
            <div class="col-md-10 form-group mt-3 mt-md-0">
            <input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
            </div>
          </div>          
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
          </div>
          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div>
          <div class="text-center"><button name="franchise" type="submit">Send Message</button></div>
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

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Engineer's Chai</h3>
      
      <div class="social-links">
        <a href="https://www.instagram.com/engineerschai" class="instagram"><img src="assets/img/icon/instagram.png"></a>
        <a href="https://www.facebook.com/engineerschai" class="facebook"><img src="assets/img/icon/facebook.png"></a>
      <!--  <a href="https://twitter.com/engineerschai" class="twitter"><img src="assets/img/icon/twitter.png"></a> -->
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>Engineer's Chai</span></strong>. All Rights Reserved
      </div>      
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>  
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
<script>
function signin() {  
 xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      
       window.location.href = this.responseText;   
       
    }
  };
  xhttp.open("GET", "admin/auth.php?signin", true);
  xhttp.send(); 
}

function signup() {  
 xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

      window.location.href = this.responseText;        
       
    }
  };
  xhttp.open("POST", "admin/auth.php?signup", true);
  xhttp.send(); 
}

function vegmenu(catname) {    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      
      window.location.href = this.responseText;    
      
    }
  };
  xhttp.open("GET", "data.php?vegcategory="+catname, true);
  xhttp.send(); 
}

function nonvegmenu(catname) {  
 xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      window.location.href = this.responseText;   
    }
  };
  xhttp.open("GET", "data.php?nonvegcategory="+catname, true);
  xhttp.send(); 
}

var swiperH = new Swiper('.swiper-container-veg', {
      slidesPerView: 2,
      spaceBetween: 30,      
      
      navigation: {
        nextEl: '.swiper-veg-next',
        prevEl: '.swiper-veg-prev',
      },
    });
    var swiperH = new Swiper('.swiper-container-mveg', {
      slidesPerView: 1.5,
      spaceBetween: 10,   
      navigation: {
        nextEl: '.swiper-veg-next',
        prevEl: '.swiper-veg-prev',
      },         
    });
    var swiperH = new Swiper('.swiper-container-nonveg', {
      slidesPerView: 2,
      spaceBetween: 30,      
      
      navigation: {
        nextEl: '.swiper-nonveg-next',
        prevEl: '.swiper-nonveg-prev',
      },
    });
    var swiperH = new Swiper('.swiper-container-mnonveg', {
      slidesPerView: 1.5,
      spaceBetween: 10,   
      navigation: {
        nextEl: '.swiper-nonveg-next',
        prevEl: '.swiper-nonveg-prev',
      },         
    });   

    function reg_event(event_id,event_name) {   
      document.getElementById('eventname').innerHTML  = event_name;      
      document.getElementById('book_event').value  = event_id;      
        $("#EventForm").modal('show');        
    }

</script>

</body>

</html>