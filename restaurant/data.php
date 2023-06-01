<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'restaurant');

$query = "SELECT * FROM menu_category WHERE menu_type_name = 'Veg'";
$vegmenu_category=mysqli_query($db, $query);
$query = "SELECT * FROM menu_category WHERE menu_type_name = 'Non-Veg'";
$nonvegmenu_category=mysqli_query($db, $query);

$query = "SELECT * FROM menu WHERE menu_type='Special' and menu_status='enable'";
$spclmenu_table=mysqli_query($db, $query);

$query = "SELECT * FROM events WHERE event_status='Completed' and display_status='enable'";
$compevent_table=mysqli_query($db, $query);
$query = "SELECT * FROM events WHERE event_status='Upcoming' and display_status='enable'";
$upevcent_table=mysqli_query($db, $query);

$query = "SELECT * FROM menu_category WHERE menu_type_name='Special Menu'";
$spclmenu_category=mysqli_query($db, $query);

$query = "SELECT * FROM gallery WHERE img_status='enable'";
$gallery=mysqli_query($db, $query);

$query = "SELECT * FROM slide WHERE display_status='enable' and slide_offer='Yes'";
$offerslide=mysqli_query($db, $query);
$query = "SELECT * FROM slide WHERE display_status='enable' and slide_offer='No'";
$slide=mysqli_query($db, $query);

$query = "SELECT * FROM feedback WHERE display_status='enable'";
$feedback_tbl=mysqli_query($db, $query);

$query = "SELECT DISTINCT city FROM career WHERE display_status='enable'";
$career_city=mysqli_query($db, $query);


if(isset($_POST['feedback'])) {
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $subject = mysqli_real_escape_string($db, $_POST['subject']);
    $message = mysqli_real_escape_string($db, $_POST['message']);    

    $query = "INSERT INTO feedback(test_name, test_email, test_subject, test_message, display_status) VALUES('$name','$email','$subject','$message','Disable')";
    mysqli_query($db, $query);    
    echo "<script>alert('Thank You!');</script>";
}

if(isset($_POST['franchise'])) {
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $mname = mysqli_real_escape_string($db, $_POST['mname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['mobile']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $message = mysqli_real_escape_string($db, $_POST['message']);
    
    $query = "INSERT INTO franchise(part_fname, part_mname, part_lname, part_email, part_phone, part_address, part_message, display_status) VALUES('$fname','$mname','$lname','$email','$phone','$address','$message','new')";
    mysqli_query($db, $query);    
    echo "<script>alert('Thank You! We will contact you shortly.');</script>";

    
}

if(isset($_POST['resume'])) {
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $mname = mysqli_real_escape_string($db, $_POST['mname']);
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
   $email = mysqli_real_escape_string($db, $_POST['email']);
   $mobile = mysqli_real_escape_string($db, $_POST['mobile']);
   $education = mysqli_real_escape_string($db, $_POST['education']);
   $apply = mysqli_real_escape_string($db, $_POST['apply']);
   $experience = mysqli_real_escape_string($db, $_POST['experience']);
   $message = mysqli_real_escape_string($db, $_POST['message']);
 
   $candidate_name = $fname.' '.$mname.' '.$lname;

   $resume = $_FILES['resume']['tmp_name'];
   $name = $_FILES['resume']['name'];
   $folder = "../resume/".$name;
   move_uploaded_file($resume, $folder);  

   $query = "INSERT INTO careerappln(applnname, jobtitle, reference, email, mobile, experience, education, jobdetail, document) VALUES('$candidate_name','$apply', 'Needer','$email','$mobile','$experience','$education','$message','$name')";
   mysqli_query($db, $query);    
   echo "<script>alert('Your application successfully recorded.');
      window.location.replace('job.php');
      </script>";
 }

 if(isset($_POST['apply'])) {
  $jobid = $_POST['apply'];
  $query = "SELECT * FROM career WHERE id = '$jobid'"; 
  $run = mysqli_query($db, $query);  
  $row = mysqli_fetch_assoc($run);
  $jobname = $row['job_name'];
  $city = $row['city'];
  $sallery = $row['sallery'];

  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $mname = mysqli_real_escape_string($db, $_POST['mname']);
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
   $email = mysqli_real_escape_string($db, $_POST['email']);
   $mobile = mysqli_real_escape_string($db, $_POST['mobile']);
   $education = mysqli_real_escape_string($db, $_POST['education']);   
   $experience = mysqli_real_escape_string($db, $_POST['experience']);
   $message = mysqli_real_escape_string($db, $_POST['message']);
 
   $candidate_name = $fname.' '.$mname.' '.$lname;

   $resume = $_FILES['resume']['tmp_name'];
   $name = $_FILES['resume']['name'];
   $folder = "../resume/".$name;
   move_uploaded_file($resume, $folder);  

   $query = "INSERT INTO careerappln(applnname, jobtitle, reference, city, sallery, email, mobile, experience, education, jobdetail, document) VALUES('$candidate_name','$jobname','Offerer', '$city', '$sallery', '$email','$mobile','$experience','$education','$message','$name')";
   mysqli_query($db, $query);    
   //header('location: index.php');
   echo "<script>alert('Your application successfully recorded.');
      window.location.replace('index.php');
      </script>";
 }

if(isset($_GET['vegcategory'])) {    
    $category = $_GET['vegcategory'];      
    echo "menu/index.php?category=".$category."&type=Veg";
  }

  if(isset($_GET['nonvegcategory'])) {    
    $category = $_GET['nonvegcategory'];      
    echo "menu/index.php?category=".$category."&type=Non-Veg";
  }

  if(isset($_GET['search'])) {    
    $jobtitle = $_GET['jobtitle'];      
    $city = $_GET['city'];      
    if($city=='Select City'){
    echo "index.php?jobtitle=".$jobtitle."&city=";
    }else{
      echo "index.php?jobtitle=".$jobtitle."&city=".$city;
    }
  }

  if(isset($_GET['jobappln'])) {    
    $job_id = $_GET['jobappln'];          
    echo "job.php?jobid=".$job_id;    
  }

  if(isset($_POST['updatepass'])) {
    $id = mysqli_real_escape_string($db, $_POST['updatepass']);
    $oldpass = mysqli_real_escape_string($db, $_POST['old_password']);
    $newpass = mysqli_real_escape_string($db, $_POST['new_password']);
    $confirmpass = mysqli_real_escape_string($db, $_POST['confirm_password']);    

    $query = "SELECT * FROM user WHERE id = $id";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);

    $pass = base64_encode($oldpass);
    $newpass = base64_encode($newpass);

    if($pass==$row['pass']){      
      $query = "UPDATE user SET pass = '$newpass' WHERE id = '$id' ";   
    }    
    mysqli_query($db, $query);    
    if($pass == $row['pass']){
    header('location: index.php?success=1');}
    else{
      header('location: index.php?error=1');}
  }

  if(isset($_POST['table_book'])) {
    $email = mysqli_real_escape_string($db, $_POST['table_book']);
    $query = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    

    $name = $row['f_name']." ".$row['l_name'];
    $date = mysqli_real_escape_string($db, $_POST['date']);
    $mobile = $row['mobile'];
    $time = mysqli_real_escape_string($db, $_POST['time']);
    $people = mysqli_real_escape_string($db, $_POST['people']);    
    $message = mysqli_real_escape_string($db, $_POST['message']);
    
    $query = "INSERT INTO book_table(cust_name, cust_email, cust_mobile, cust_date, cust_time, cust_people, cust_message, cust_status) VALUES('$name','$email','$mobile','$date','$time','$people','$message','Open')";
    mysqli_query($db, $query);    
    echo "<script>alert('Table Booked.');</script>";
    
}

if(isset($_POST['book_event'])) {
  $eventid = mysqli_real_escape_string($db, $_POST['book_event']);
  $query = "SELECT * FROM events WHERE id = '$eventid'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $eventname = $row['event_name'];
  $fee = $row['price'];
$eventdate = $row['event_date'];

  $email = $_SESSION['email'];
  $query = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($db, $query);
    $row1 = mysqli_fetch_assoc($result);

  $name = $row1['f_name']." ".$row1['l_name'];
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $pincode = mysqli_real_escape_string($db, $_POST['pincode']);  
  
  $query = "INSERT INTO book_event(cust_name, cust_email, event_name, cust_city, cust_pincode, cust_status, event_fee, event_date) VALUES('$name','$email','$eventname','$city','$pincode','Open','$fee','$eventdate')";
  mysqli_query($db, $query);    
  echo "<script>alert('".$eventname." Event Booked.');</script>";
}

if(isset($_GET['cancletable'])) {
  $table_id = $_GET['cancletable'];
  $email = $_SESSION["email"];
    
  $query = "DELETE FROM book_table WHERE id = '$table_id' AND cust_email = '$email'"; 
  mysqli_query($db, $query);
  echo "Table Cancle";
}

if(isset($_GET['cancleevent'])) {
  $event_id = $_GET['cancleevent'];
  $email = $_SESSION["email"];
    
  $query = "DELETE FROM book_event WHERE id = '$event_id' AND cust_email = '$email'"; 
  mysqli_query($db, $query);
  echo "Event Cancle";
}

if(isset($_POST['reverify'])) {
$email =$_SESSION['email'];
  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789~!@#$%&";
    $gen_password = substr( str_shuffle( $chars ), 0, 10 );
    $token = md5($gen_password);
    
    $query = "UPDATE user SET ticket = '$token' WHERE email = '$email'";   
    mysqli_query($db, $query);
    header('location: ../mail.php?verification='.$token.'&email='.$email);
}


?>
