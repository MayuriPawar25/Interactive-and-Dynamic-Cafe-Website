<?php
include ("auth.php");

$query = "SELECT * FROM menu_category";
$menu_cattbl=mysqli_query($db, $query);
$query = "SELECT DISTINCT menu_cat_name FROM menu_category";
$menu_cat=mysqli_query($db, $query);
$query = "SELECT * FROM menu";
$menu_table=mysqli_query($db, $query);
$query = "SELECT * FROM events";
$event_table=mysqli_query($db, $query);
$query = "SELECT * FROM careerappln ORDER BY reg_date DESC";
$careerin_table=mysqli_query($db, $query);
$query = "SELECT * FROM career ORDER BY reg_date DESC";
$career_table=mysqli_query($db, $query);
$query = "SELECT * FROM user ORDER BY reg_date DESC";
$user_table=mysqli_query($db, $query);
$query = "SELECT * FROM book_table ORDER BY reg_date DESC";
$book_table=mysqli_query($db, $query);
$query = "SELECT * FROM book_event ORDER BY reg_date DESC";
$book_event=mysqli_query($db, $query);


if(isset($_POST['updateuserinfo'])) {
    $id = mysqli_real_escape_string($db, $_POST['updateuserinfo']);

    $bday = mysqli_real_escape_string($db, $_POST['bday']);
    $about = mysqli_real_escape_string($db, $_POST['about']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $mobile = mysqli_real_escape_string($db, $_POST['mobile']);          
    $website = mysqli_real_escape_string($db, $_POST['website']);          

    $query = "UPDATE user SET birth_date = '$bday', about_user = '$about', address = '$address', mobile = '$mobile', website = '$website', acc_status= 'Permanent' WHERE id = '$id' ";
   
    mysqli_query($db, $query);    
    header('location: profile.php');
  }

  if(isset($_POST['updatepass'])) {
    $id = mysqli_real_escape_string($db, $_POST['updatepass']);
    $oldpass = mysqli_real_escape_string($db, $_POST['old_pass']);
    $newpass = mysqli_real_escape_string($db, $_POST['new_pass']);
    $confirmpass = mysqli_real_escape_string($db, $_POST['confirm_pass']);    

    $query = "SELECT * FROM user WHERE id = $id ";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);

    $pass = base64_encode($oldpass);
    $newpass = base64_encode($newpass);

    if($pass==$row['pass']){      
      $query = "UPDATE user SET pass = '$newpass' WHERE id = '$id' ";   
    }    
    mysqli_query($db, $query);    
    if($pass == $row['pass']){
    header('location: profile.php?success=1');}
    else{
      header('location: profile.php?error=1');}
  }

  if(isset($_POST['newuserinfo'])) {
    $id = mysqli_real_escape_string($db, $_POST['newuserinfo']);
    $bday = mysqli_real_escape_string($db, $_POST['bday']);
    $about = mysqli_real_escape_string($db, $_POST['about']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $mobile = mysqli_real_escape_string($db, $_POST['mobile']);          
    $website = mysqli_real_escape_string($db, $_POST['website']);               
    $oldpass = mysqli_real_escape_string($db, $_POST['old_pass']);
    $newpass = mysqli_real_escape_string($db, $_POST['new_pass']);
    $confirmpass = mysqli_real_escape_string($db, $_POST['confirm_pass']);    

    $query = "SELECT * FROM user WHERE id = $id ";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);

    $pass = base64_encode($oldpass);
    $newpass = base64_encode($newpass);

    if($pass==$row['pass']){      
      $query = "UPDATE user SET birth_date = '$bday', about_user = '$about', address = '$address', mobile = '$mobile', website = '$website', pass = '$newpass', acc_status= 'Permanent' WHERE id = '$id' ";
    }    
    mysqli_query($db, $query);    
    if($pass == $row['pass']){
      $_SESSION['acc_status'] = 'Permanent';
    header('location: index.php');}
    else{
      header('location: userinfo.php?error=1');}
  }

  if(isset($_POST['updatebooktable'])) {
    $id = mysqli_real_escape_string($db, $_POST['updatebooktable']);
    $status = mysqli_real_escape_string($db, $_POST['status']);
    

    $query = "UPDATE book_table SET cust_status = '$status' WHERE id = '$id' ";
   
    mysqli_query($db, $query);    
    header('location: booking.php');
  }

  if(isset($_GET['editbooktable'])) {
    $id = $_GET['editbooktable'];
    //$category = mysqli_real_escape_string($db, $_GET['category']);
    $query = "SELECT * FROM book_table WHERE id = $id ";
    $run = mysqli_query($db, $query);
    while($row = $run->fetch_array()){
  ?>
  <div class="modal-dialog" style="width:800;">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Update Book Table</h4>
                        </div>
                        <div class="modal-body">
  
                        <section class="panel">
                <header class="panel-heading">
                  Table Detail
                </header>
                <div class="panel-body">
                  <form class="form-horizontal" method="post">                  
                    <div class="form-group">                  
                    <label class="col-sm-3 control-label">Status</label>
                      <div class="col-sm-6">
                      <select class="form-control m-bot15" name="status">
                                                <option disabled selected>Select Option</option>
                                                <option>Accepted</option>
                                                <option>Rejected</option>
                                                <option>Completed</option>
                                            </select>
                      </div>       
                      
                    </div>
                  
                    <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                          <button class="btn btn-success" type="submit" name="updatebooktable" value="<?php echo $id ?>">Save changes</button>
                          
                        </div>
                  </form>     
                  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
  <?php  
    }  
  } 
  ?>
