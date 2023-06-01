<?php

session_start();

// initializing variables
$usernm = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'restaurant');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $fname = mysqli_real_escape_string($db, $_POST['first_name']);
  $lname = mysqli_real_escape_string($db, $_POST['last_name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $mobile = mysqli_real_escape_string($db, $_POST['mobile']);
  $usernm = $email;
  //$mobile = mysqli_real_escape_string($db, $_POST['mobile']);
  //$hospital = mysqli_real_escape_string($db, $_POST['hospital']);
  $password_1 = mysqli_real_escape_string($db, $_POST['pass']);
  $password_2 = mysqli_real_escape_string($db, $_POST['re-pass']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($fname)) { array_push($errors, "first name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($lname)) { array_push($errors, "last name is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user WHERE username='$usernm' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $usernm) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$pass = base64_encode($password_1);//encrypt the password before saving in the database

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789~!@#$%&";
    $gen_password = substr( str_shuffle( $chars ), 0, 10 );
    $token = md5($gen_password);

  	$query = "INSERT INTO user (f_name,l_name,username, email, mobile, pass, user_type, ticket) 
  			  VALUES('$fname','$lname', '$email','$email','$mobile', '$pass','Customer','$token')";
  	mysqli_query($db, $query);
  	$_SESSION['fname'] = $fname;
    $_SESSION['lname'] = $lname;
    $_SESSION['username'] = $email;
    $_SESSION['email'] = $email;
    $_SESSION['ticket'] = $token;
    $_SESSION['usertype'] = 'Customer';
  	$_SESSION['success'] = "You are now logged in";
  	header('location: ../mail.php?verification='.$token.'&email='.$email);
  }else{
    header('location: ../signup.html');
  }
}

if (isset($_POST['reset'])) {  
  $email = $_POST['email'];
  $query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $query);
  $user = mysqli_fetch_assoc($result);
    $password = base64_decode($user['pass']);
  $to = $email;
    $header="From: EternalGiG Technology <eternalg@eternalgig.com>";
    
       $subject = 'Reset Account';
       $message = '<html>
       <head>
         
       </head>
       <body>
       <h2>Your Account Credential</h2>
         <p>Username:- '.$email.'</p>
         <p>Password:- '.$password.'</p>
       </body>
       </html>
       ';
  
    $header = "MIME-Version: 1.0" . "\r\n";
    $header = "Content-type:text/html;charset=UTF-8" . "\r\n";
  
      $result = mail($to, $subject, $message, $header);
      if(!$result) {
          echo "<script>alert('User not found');</script>";
      } else {
          header('location: ../index.php?reset');
        }
  }
  
if (isset($_POST['userin'])) {
  $usernm = mysqli_real_escape_string($db, $_POST['username']);
  $password_1 = mysqli_real_escape_string($db, $_POST['pass']);
  
  if (empty($usernm)) { array_push($errors, "Username is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
   
  $userin_query = "SELECT * FROM user WHERE username='$usernm'";
  $result = mysqli_query($db, $userin_query);
  $user = mysqli_fetch_assoc($result);
  
  //if ($user) { // if user exists
  if ($user['username'] != NULL) {
    $pass = base64_encode($password_1);
    
    if ($user['username'] === $usernm && $user['pass'] === $pass) {
      //mysqli_query($db, $query);
      $_SESSION['fname'] = $user['f_name'];
      $_SESSION['lname'] = $user['l_name'];    
      $_SESSION['username'] = $user['username'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['usertype'] = $user['user_type'];
      $_SESSION['acc_status'] = $user['acc_status'];
    if($user['ticket'] != NULL){
      $_SESSION['ticket'] = $user['ticket'];
    }
      if ($user['user_type']=="Owner"){
        if($user['acc_status']=="Temporary"){
          header('location: ../owner/index.php');
        }elseif($user['acc_status']=="Permanent"){
          header('location: ../owner/index.php');
        }
      } elseif ($user['user_type']=="Admin"){
          header('location: ../admin/index.php');
      } elseif ($user['user_type']=="Customer"){
          header('location: ../index.php');
      }else{
        header('location: ../signin.html');    
      }

    }  
    else {
      //header('location: ../signin.html');
      echo "<script>alert('Email id or Password is incorrect');
      window.location.replace('../signin.html');
      </script>";
      
    }
  } if (!$user['username']) {
      echo "<script>alert('User not found');
      window.location.replace('../signin.html');
      </script>";
  }
 
}

if (isset($_POST['logout'])) {
  session_destroy();
  header('location: /../index.php');
}

if (isset($_GET['signup'])) {  
    echo "signup.html";  
}

if (isset($_GET['signin'])) {
    echo "signin.html";  
}

if (isset($_GET['signup1'])) {  
  echo "../signup.html";  
}

if (isset($_GET['signin1'])) {
  echo "../signin.html";  
}

if (isset($_POST['signin'])) {
    header('location: ../signin.html');
}
if (isset($_POST['signup'])) {
  header('location: ../signup.html');
}

?>
