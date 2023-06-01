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

  <title>Career-Engineer's Chai</title>

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
                <a href="mail.php"><i class="icon_mail_alt"></i> My Inbox</a>
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
              <li><a class="" href="gallery.php">Gallery</a></li>
              <li><a class="" href="slide.php">Slide</a></li>
              

            </ul>
          </li>
          <li class="sub-menu">           
            <a class="" href="booking.php">
                          <i class="icon_mail_alt"></i>
                          <span>Booking</span>
                      </a>
          </li>
          <li class="sub-menu ">           
            <a class="" href="mail.php">
                          <i class="icon_mail_alt"></i>
                          <span>Mail</span>
                      </a>
          </li>
          <li>
            <a class="active" href="career.php">
                          <i class="icon_briefcase"></i>
                          <span>Career</span>

                      </a>

          </li>
          <li>
            <a class="" href="users.php">
                          <i class="icon_group"></i>
                          <span>User</span>

                      </a>

          </li>
          <li>
            <a class="" href="profile.php">
                          <i class="icon_profile"></i>
                          <span>Profile</span>

                      </a>

          </li>        
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-list-alt"></i> Career</h3>
          </div>
        </div>


<!--tab nav start-->
<section class="panel">
              <header class="panel-heading tab-bg-primary ">
                <ul class="nav nav-tabs">
                  <li class="">
                    <a data-toggle="tab" href="#List">List</a>
                  </li>
                  <li class="active">
                    <a data-toggle="tab" href="#inbox">Inbox</a>
                  </li>                                                          
                  <li class="">
                    <a data-toggle="tab" href="#Add">Add</a>
                  </li>                                    
                  
                </ul>
              </header>
              <div class="panel-body">
                <div class="tab-content">
                  <div id="List" class="tab-pane" style="overflow-x:auto;">
                  <table class="table table-striped table-advance table-hover">
                <tbody >
                  <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Detail</th>
                    <th>City</th>
                    <th>Education</th>
                    <th>Experience</th>
                    <th>Sallery</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr> 
                  <?php $i = 1; while($row=mysqli_fetch_assoc($career_table)){?>
                  <tr>
                  <td><?php echo $i ?></td>
                    <td><?php echo ucfirst($row["job_name"]);?></td>                    
                    <td><?php echo ucfirst($row["jobdetail"]);?></td>  
                    <td><?php echo ucfirst($row["city"]);?></td>                          
                    <td><?php echo ($row["education"]);?></td>                          
                    <td><?php echo ($row["experience"]);?></td>
                    <td><?php echo ($row["sallery"]);?></td>                    
                                       
                    <td><?php echo ($row["display_status"]);?></td>                    
                    <td>
                      
                      <div class="btn-group">
                        
                        <a class="btn btn-primary" data-toggle="modal" href="#myModal" name="job_id" onclick="edit(<?php echo ($row['id']);?>)"><i class="icon_pencil-edit_alt"></i></a>                        
                        <a class="btn btn-danger" data-toggle="modal" href="#myModal3" onclick="rmcareerlist(<?php echo ($row['id']);?>)"><i class="icon_close_alt2"></i></a>
                        
                      </div>
                    </td>
                  </tr>                  
                  <?php $i++;} ?>

                  
                </tbody>
              </table>
                </div>

                <div id="inbox" class="tab-pane active" style="overflow-x:auto;">
                  <table class="table table-striped table-advance table-hover">
                <tbody >
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Jobtitle</th>
                    <th>Ref. Page</th>
                    <th>City</th>
                    <th>Experience</th>
                    <th>Sallery</th>
                    <th>Education</th>
                    <th>Detail</th>                    
                    <th>Resume</th>   
                    <th>Mobile No.</th>   
                    <th>Email-Id</th>   
                    <th>Action</th>
                  </tr> 
                  <?php $i = 1; while($row=mysqli_fetch_assoc($careerin_table)){?>
                  <tr>
                  <td><?php echo $i ?></td>
                    <td><?php echo ucfirst($row["applnname"]);?></td>
                    <td><?php echo ucfirst($row["jobtitle"]);?></td>
                    <td><?php echo ucfirst($row["reference"]);?></td>
                    <td><?php echo ucfirst($row["city"]);?></td>                          
                    <td><?php echo ($row["experience"]);?></td>
                    <td><?php echo ($row["sallery"]);?></td>                    
                    <td><?php echo ($row["education"]);?></td>
                    <td><?php echo ($row["jobdetail"]);?></td>                    
                    <td><a href="../resume/<?php echo ($row["document"]);?>" target="_blank"><?php echo ($row["document"]);?></a></td>                    
                    <td><?php echo ($row["mobile"]);?></td>                    
                    <td><?php echo ($row["email"]);?></td>                    
                    <td>
                      
                      <div class="btn-group">                        
                        
                        <a class="btn btn-danger" data-toggle="modal" href="#myModal3" onclick="rmresume(<?php echo ($row['id']);?>)"><i class="icon_close_alt2"></i></a>
                        
                      </div>
                    </td>
                  </tr>                  
                  <?php $i++;} ?>

                  
                </tbody>
              </table>
                </div>

                  <div id="Add" class="tab-pane">
               <section class="panel">
              <header class="panel-heading">
                Add New Job
              </header>
              <div class="panel-body">
                <form class="form-horizontal" method="post">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Job Title</label>
                    <div class="col-sm-10">
                      <input class="form-control" id="focusedInput" type="text" name="jobtitle" placeholder="Enter Job Title..." onkeypress="return /[a-z _]/i.test(event.key);">
                    </div>
                  </div>                  
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Job Detail</label>
                    <div class="col-sm-10">
                    <textarea class="form-control ckeditor" name="detail" rows="6"></textarea>
                    </div>
                  </div>                  

                  <div class="form-group">
                    <label class="col-sm-2 control-label">City</label>
                    <div class="col-sm-2">
                      <input class="form-control" id="focusedInput" type="text" name="city" onkeypress="return /[a-z _]/i.test(event.key);">
                    </div>
                    <label class="col-sm-1 control-label">Experience</label>
                    <div class="col-sm-1">
                      <input class="form-control" id="focusedInput" type="number" name="experience" pattern=".{1,2}" max="50" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                    </div>
                    <label class="col-sm-1 control-label">Sallery</label>
                    <div class="col-sm-1">
                      <input class="form-control" id="focusedInput" type="text" name="Sallery" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                    </div>
                    <label class="col-sm-1 control-label">Education</label>
                    <div class="col-sm-2">
                      <input class="form-control" id="focusedInput" type="text" name="education" onkeypress="return /[a-z _]/i.test(event.key);">
                    </div>
                  </div>                  

                  <div class="form-group">                    
                    <label class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-2">
                    <select class="form-control m-bot15" name="status">
                                              <option disabled selected>Select Status</option>
                                              <option>Enable</option>
                                              <option>Disable</option>
                                          </select>
                    </div>       
                  </div>             
                  <div class="form-group">                    
                    <div class="col-sm-2" style="margin-left: 200px;">
                    <button class="btn btn-primary text-center" type="submit" name="addjob">Sumbit</button>
                    </div>
                  </div>
                  </form>
                                  
              </div>
            </section>                                 
                  </div>          
                
              </div>
              
            </section>

            <!--modal start-->
            <section class="panel">             
                                <!-- Modal -->

                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                
              </div>
            </section>

                      </div>
                    </div>
                  </div>
                </div>
                <!-- modal -->                
                <!-- Modal -->
                <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Delete Notification</h4>
                      </div>
                      <div class="modal-body">

                      Do you want to delete?
                      
                      </div>
                      <div class="modal-footer">                      
                      <form class="form-horizontal" method="GET">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Cancle</button>
                        <button class="btn btn-danger" type="submit" name="deletecareerlist" id="deletecareerlist" style="display:none;">Delete</button>                          
                        <button class="btn btn-danger" type="submit" name="deletecareerbox" id="deletecareerbox" style="display:none;">Delete</button>                         
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- modal -->

              </div>
            </section>
            <!--modal start-->

            
          </div>

        </div>
      </section>
    </section>
    
  </section>
  <!-- container section end -->

  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- gritter -->
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
  <!-- custom gritter script for this page only-->
  <script src="js/gritter.js" type="text/javascript"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>

  <script>
    CKEDITOR.replace('detail');

  function edit(job_id) {  
 xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("myModal").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "data.php?editjob="+job_id, true);
  xhttp.send(); 
}

function rmresume(by_id) {
  document.getElementById("deletecareerlist").style.display = "none"; 
  document.getElementById("deletecareerbox").style.display = "inline-block"; 
  document.getElementById("deletecareerbox").value = by_id;
  
}

function rmcareerlist(by_id) {
  document.getElementById("deletecareerbox").style.display = "none"; 
  document.getElementById("deletecareerlist").style.display = "inline-block"; 
  document.getElementById("deletecareerlist").value = by_id;
  
}

</script>



</body>

</html>
