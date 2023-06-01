<?php
include ("data.php");
require 'session.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Profile-Engineer's Chai</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/fullcalendar.css">
  <link href="css/widgets.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link href="css/xcharts.min.css" rel=" stylesheet">
  <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">  
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">


    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="../index.php" class="logo"><img src="..\assets\img\logo.png"></a>
      <!--logo end-->

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          
          
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">                            
                            <span class="username"><?php echo ucfirst($_SESSION['fname']) ." ". ucfirst($_SESSION['lname']);?></span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="profile.php"><i class="icon_profile"></i> My Profile</a>
              </li>              
              <li>
                <a href="../logout.php"><i class="icon_key_alt"></i> Log Out</a>
              </li>              
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="">
            <a class="" href="index.php">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Pages</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">              
              <li><a class="" href="menu.php">Dish Menu</a></li>
              <li><a class="" href="Events.php">Events</a></li>                                      

            </ul>
          </li>       
          <li class="sub-menu">           
            <a class="" href="booking.php">
                          <i class="icon_mail_alt"></i>
                          <span>Booking</span>
                      </a>
          </li>   
          <li>
            <a class="" href="career.php">
                          <i class="icon_briefcase"></i>
                          <span>Career</span>

                      </a>

          </li>          
          <li>
            <a class="active" href="profile.php">
                          <i class="icon_profile"></i>
                          <span>Profile</span>

                      </a>

          </li>        
        <!-- sidebar menu end-->
      </div>
    </aside>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-user-md"></i> Profile</h3>            
          </div>
        </div>
        
          
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading tab-bg-info">
                <ul class="nav nav-tabs">                                      
                  <li class="active">
                    <a data-toggle="tab" href="#profile">                                          
                                          Profile
                                      </a>
                  </li>
                  <li class="">
                    <a data-toggle="tab" href="#edit-profile">
                                          Edit Profile
                                      </a>
                  </li>
                  <li class="">
                    <a data-toggle="tab" href="#change-password">
                                          Change Password
                                      </a>
                  </li>
                </ul>
              </header>
              

              <div class="panel-body">
                <div class="tab-content">
                  <!-- profile -->
                  <div id="profile" class="tab-pane active">
                    <section class="panel">    
                    <?php $username = $_SESSION['username'];
                     $query = "SELECT * FROM user WHERE username = '$username'"; 
                     $run = mysqli_query($db, $query);
                      while($row = $run->fetch_array()){?>                  
                      <div class="panel-body bio-graph-info">
                        <h1>Profile Info</h1>
                        <div class="row">
                          <div class="bio-row">
                            <p><span>Name </span>: <?php echo ucfirst($row["f_name"].' '.$row["m_name"].' '.$row["l_name"]); ?> </p>
                          </div>
                          <div class="bio-row">
                            <p><span>Birth Date </span>: <?php echo $row["birth_date"]; ?> </p>
                          </div>                                                    
                          <div class="bio-row">
                            <p><span>Mobile </span>: <?php echo ($row["mobile"]); ?> </p>
                          </div>
                          <div class="bio-row">
                            <p><span>Email </span>: <?php echo ($row["email"]); ?> </p>
                          </div>
                          <div class="bio-row">
                            <p><span>Website </span>: <?php echo ($row["website"]); ?> </p>
                          </div>                          
                          <div class="bio-row">
                            <p><span>About Me</span>: <?php echo ucfirst($row["about_user"]); ?> </p>
                          </div>
                          <div class="bio-row">
                            <p><span>Address </span>: <?php echo ucfirst($row["address"]); ?> </p></p>
                          </div>
                        </div>
                      </div>
                      <?php } ?>
                    </section>                    
                  </div>
                  <!-- edit-profile -->
                  <div id="edit-profile" class="tab-pane">
                    <section class="panel">
                      <div class="panel-body bio-graph-info">
                        <h1>Edit - Profile Info</h1>
                        <?php $username = $_SESSION['username'];
                     $query = "SELECT * FROM user WHERE username = '$username'"; 
                     $run = mysqli_query($db, $query);
                      while($row = $run->fetch_array()){?>
                        <form class="form-horizontal" method="post" role="form">
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="email" placeholder=" " value="<?php echo ($row["email"]); ?>" disabled>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">First Name</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="f-name" placeholder=" " value="<?php echo ($row["f_name"]); ?>" disabled>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Middle Name</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="m-name" placeholder=" " value="<?php echo ($row["m_name"]); ?>" disabled>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Last Name</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="l-name" placeholder=" " value="<?php echo ($row["l_name"]); ?>" disabled>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Birthday</label>
                            <div class="col-lg-6">
                              <input type="date" class="form-control" name="bday" id="b-day" value="<?php echo ($row["birth_date"]); ?>" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">About Me</label>
                            <div class="col-lg-6">
                              <textarea id="" class="form-control" name="about" cols="30" rows="5" required><?php echo ($row["about_user"]); ?></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label" name="address">Address</label>
                            <div class="col-lg-6">
                            <textarea name="address" id="address" class="form-control" cols="30" rows="5" required><?php echo ($row["address"]); ?></textarea>
                            </div>
                          </div>                      
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Mobile</label>
                            <div class="col-lg-6">
                              <input type="tel" class="form-control"  name="mobile" id="mobile" placeholder=" " value="<?php echo ($row["mobile"]); ?>" pattern="[0-9]{10}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" title="Enter 10 Digit Mobile Number" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Website URL</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" name="website" id="url" placeholder="" value="<?php echo ($row["website"]); ?>">
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                              <button type="submit" name="updateuserinfo" value="<?php echo $row["id"]; ?>" class="btn btn-primary">Save</button>
                              <button type="button" class="btn btn-danger">Cancel</button>
                            </div>
                          </div>
                        </form>
                        <?php } ?>
                      </div>
                    </section>
                  </div>

                  <div id="change-password" class="tab-pane">
                    <section class="panel">
                    <?php $username = $_SESSION['username'];
                     $query = "SELECT * FROM user WHERE username = '$username'"; 
                     $run = mysqli_query($db, $query);
                      while($row = $run->fetch_array()){?>
                      <div class="panel-body bio-graph-info">
                        <h1> Change Password </h1>
                        <form class="form-horizontal" method="post" role="form">                        
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Current Password</label>
                            <div class="col-lg-6">
                              <input type="password" class="form-control" name="old_pass" id="old_pass" require>                              
                            </div>                            
                          </div>
                          <div class="form-group">
                          <label class="col-lg-2 control-label">New Password</label>
                            <div class="col-lg-6">
                              <input type="password" class="form-control" name="new_pass" id="new_pass" require>                                                          
                            </div>                         
                          </div>
                          <div class="form-group">
                          <label class="col-lg-2 control-label">Confirm New Password</label>
                            <div class="col-lg-6">
                              <input type="password" class="form-control" name="confirm_pass" id="confirm_pass" require>                              
                            </div>                            
                            <div class="col-lg-4">
                            <label class="control-label" id="checkpass"></label>
                            </div>                            
                          </div>
                          <div class="form-group">
                          <label class="col-lg-2 control-label">Password Policy</label>
                            <div class="col-lg-8">                              
                            <p class="fa fa-times-circle-o" id="passl"><a> Password must have in between 8 to 32 character.</a></p>
                              <p class="fa fa-times-circle-o" id="Ualpha"><a> Password must have atleast one UPPERCASE character i.e. [A-Z]. </a></p>
                              <p class="fa fa-times-circle-o" id="lalpha"><a> Password must have atleast one lowercase character i.e. [a-z]. </a></p>
                              <p class="fa fa-times-circle-o" id="num"><a> Password must have atleast one number i.e. [0-9]. </a></p>
                              <p class="fa fa-times-circle-o" id="symbol"><a> Password must atleast one special character i.e. !@#$%^&*<>. </a></p>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                              <button type="submit" name="updatepass" id="updatepass" value="<?php echo $row["id"]; ?>" class="btn btn-primary" disabled>Save</button>
                            </div>
                          </div>
                        </form>
                      </div>
                      <?php } ?>
                    </section>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>

        <!-- page end-->
      </section>
    </section>
    <!-- Modal -->
    <?php if(isset($_GET['success'])) {
      $status= $_GET['success'];
    if($status==1){  ?>
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Notification</h4>
                      </div>
                      <div class="modal-body">

                      Password Successfully Update.
                      
                      </div>
                      <div class="modal-footer">                      
                      <form class="form-horizontal" method="GET">
                        <button data-dismiss="modal" class="btn btn-success" type="button">Cancle</button>                        
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- modal -->                
        <?php } } ?>

        <?php if(isset($_GET['error'])) {
      $status= $_GET['error'];
    if($status==1){  ?>
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Notification</h4>
                      </div>
                      <div class="modal-body">

                      Please Enter Your Correct Current Password.
                      
                      </div>
                      <div class="modal-footer">                      
                      <form class="form-horizontal" method="GET">
                        <button data-dismiss="modal" class="btn btn-danger" type="button">Cancle</button>                        
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- modal -->                
        <?php } } ?>
    <!--main content end-->    
  </section>
  <!-- container section end -->
  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- jquery knob -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>

  <script>
    var newpass = document.querySelector('#new_pass');
    var confpass = document.querySelector('#confirm_pass');
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
      if(i<6){
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
      if(i<6){
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
    
    $("#myModal1").modal('show');
  </script> 

</body>

</html>
