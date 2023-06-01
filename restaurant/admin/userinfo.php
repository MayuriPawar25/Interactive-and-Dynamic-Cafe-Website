<?php
include ("data.php");

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

  <title>User Information-Engineer's Chai</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />  
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->

    <header class="header dark-bg">      

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

    <!-- Modal -->
    

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
    
    

    <!--main content start-->
    <section id="main-content" style="margin-right:180px;">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header text-center"> Update User Information</h3>            
          </div>
        </div>
        <!-- Form validations -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">              
              <div class="panel-body">
                <div class="form">
                <?php $username = $_SESSION['username'];
                     $query = "SELECT * FROM user WHERE username = '$username'"; 
                     $run = mysqli_query($db, $query);
                      while($row = $run->fetch_array()){?>
                <form class="form-horizontal" method="post" role="form">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="email" placeholder=" " value="<?php echo ($row["email"]); ?>" disabled>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">First Name</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="f-name" placeholder=" " value="<?php echo ($row["f_name"]); ?>" disabled>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Middle Name</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="m-name" placeholder=" " value="<?php echo ($row["m_name"]); ?>" disabled>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Last Name</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="l-name" placeholder=" " value="<?php echo ($row["l_name"]); ?>" disabled>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Birthday<span class="required">*</span></label>
                            <div class="col-lg-6">
                              <input type="date" class="form-control" name="bday" id="b-day" value="<?php echo ($row["birth_date"]); ?>" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">About Me<span class="required">*</span></label>
                            <div class="col-lg-6">
                              <textarea id="" class="form-control" name="about" cols="30" rows="5" required><?php echo ($row["about_user"]); ?></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label" name="address">Address<span class="required">*</span></label>
                            <div class="col-lg-6">
                            <textarea name="address" id="address" class="form-control" cols="30" rows="5" required><?php echo ($row["address"]); ?></textarea>
                            </div>
                          </div>                      
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Mobile <span class="required">*</span></label>
                            <div class="col-lg-6">
                              <input type="number" class="form-control"  name="mobile" id="mobile" placeholder=" " value="<?php echo ($row["mobile"]); ?>" pattern="[0-9]{10}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" title="Enter 10 Digit Mobile Number" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Website URL</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" name="website" id="url" placeholder="" value="<?php echo ($row["website"]); ?>">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-lg-3 control-label">Current Password <span class="required">*</span></label>
                            <div class="col-lg-6">
                              <input type="password" class="form-control" name="old_pass" id="old_pass" require>                              
                            </div>                            
                          </div>
                          <div class="form-group">
                          <label class="col-lg-3 control-label">New Password <span class="required">*</span></label>
                            <div class="col-lg-6">
                              <input type="password" class="form-control" name="new_pass" id="new_pass" require>                                                          
                            </div>
                            
                            
                          </div>
                          <div class="form-group">
                          <label class="col-lg-3 control-label">Confirm New Password <span class="required">*</span></label>
                            <div class="col-lg-6">
                              <input type="password" class="form-control" name="confirm_pass" id="confirm_pass" require>                              
                            </div>                            
                            <div class="col-lg-3">
                            <label class="control-label" id="checkpass"></label>
                            </div>                            
                          </div>
                          <div class="form-group">
                          <label class="col-lg-3 control-label">Password Policy</label>
                            <div class="col-lg-8">                              
                            <p class="fa fa-times-circle-o" id="passl"><a> Password must have in between 8 to 32 character.</a></p>
                              <p class="fa fa-times-circle-o" id="Ualpha"><a> Password must have atleast one UPPERCASE character i.e. [A-Z]. </a></p>
                              <p class="fa fa-times-circle-o" id="lalpha"><a> Password must have atleast one lowercase character i.e. [a-z]. </a></p>
                              <p class="fa fa-times-circle-o" id="num"><a> Password must have atleast one number i.e. [0-9]. </a></p>
                              <p class="fa fa-times-circle-o" id="symbol"><a> Password must atleast one special character i.e. !@#$%^&*<>. </a></p>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-10">
                              <button type="submit" name="newuserinfo" id="newuserinfo" value="<?php echo $row["id"]; ?>" class="btn btn-primary" disabled>Save</button>
                              <button type="button" class="btn btn-danger">Cancel</button>
                            </div>
                          </div>
                        </form>
                        <?php } ?>
                </div>

              </div>
            </section>
          </div>
        </div>

      </section>
    </section>
    <!--main content end-->
    
  </section>
  <!-- container section end -->
  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
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
        document.getElementById('newuserinfo').disabled  = true;                      
      }else{        
        document.getElementById('passl').className  = 'fa fa-check-circle-o';              
        document.getElementById('passl').value  = 1;                      
      }

      if((/^(?=.*[A-Z])/).test(newpass.value) == false){              
        document.getElementById('Ualpha').className = 'fa fa-times-circle-o'; 
        document.getElementById('Ualpha').value  = 0;  
        document.getElementById('newuserinfo').disabled  = true;                          
       }else{                 
        document.getElementById('Ualpha').className  = 'fa fa-check-circle-o';               
        document.getElementById('Ualpha').value  = 1;
      }

      if((/^(?=.*[a-z])/).test(newpass.value) == false){
        document.getElementById('lalpha').className = 'fa fa-times-circle-o'; 
        document.getElementById('lalpha').value  = 0;  
        document.getElementById('newuserinfo').disabled  = true;                          
       }else{                      
        document.getElementById('lalpha').className  = 'fa fa-check-circle-o';              
        document.getElementById('lalpha').value  = 1;
        
      }

      if((/^(?=.*[0-9])/).test(newpass.value) == false){
        document.getElementById('num').className = 'fa fa-times-circle-o'; 
        document.getElementById('num').value  = 0; 
        document.getElementById('newuserinfo').disabled  = true;                           
       }else{                      
        document.getElementById('num').className  = 'fa fa-check-circle-o';              
        document.getElementById('num').value  = 1;
      }

      if((/^(?=.*[~!@#$%^&*<>])/).test(newpass.value) == false){
        document.getElementById('symbol').className = 'fa fa-times-circle-o'; 
        document.getElementById('symbol').value  = 0;      
        document.getElementById('newuserinfo').disabled  = true;                      
       }else{                      
        document.getElementById('symbol').className  = 'fa fa-check-circle-o';              
        document.getElementById('symbol').value  = 1;
      }

      i = document.getElementById('passl').value + document.getElementById('Ualpha').value + document.getElementById('lalpha').value + document.getElementById('num').value +  document.getElementById('symbol').value; 
      console.log(i);
      if(i==5){
        if(confpass.value == newpass.value){
        document.getElementById('newuserinfo').disabled  = false;              
        document.getElementById('checkpass').innerHTML  = "Password Matched";   
        document.getElementById('checkpass').style.color  = "green";                         
        }else{
        document.getElementById('newuserinfo').disabled  = true;              
        document.getElementById('checkpass').innerHTML  = "Password not matched";              
        document.getElementById('checkpass').style.color  = "red";              
        }
      }else{
        document.getElementById('newuserinfo').disabled  = true;              
        document.getElementById('checkpass').innerHTML  = "Password not matched";              
        document.getElementById('checkpass').style.color  = "red";              
        }      

    })

    
    confpass.addEventListener('keyup',function(){
      i = document.getElementById('passl').value + document.getElementById('Ualpha').value + document.getElementById('lalpha').value + document.getElementById('num').value +  document.getElementById('symbol').value; 
      console.log(i);
      if(i==5){
        if(confpass.value == newpass.value){
          document.getElementById('newuserinfo').disabled  = false;              
        document.getElementById('checkpass').innerHTML  = "Password Matched";   
        document.getElementById('checkpass').style.color  = "green";                         
        }else{
        document.getElementById('newuserinfo').disabled  = true;              
        document.getElementById('checkpass').innerHTML  = "Password not matched";              
        document.getElementById('checkpass').style.color  = "red";              
        }
      }else{
        document.getElementById('newuserinfo').disabled  = true;              
        document.getElementById('checkpass').innerHTML  = "Password not matched";              
        document.getElementById('checkpass').style.color  = "red";              
        }      
    })
    
    $("#myModal1").modal('show');
  </script> 

</body>

</html>
