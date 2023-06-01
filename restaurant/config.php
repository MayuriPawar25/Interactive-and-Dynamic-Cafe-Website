<?php
$servername = "localhost"; //currently where is hosted
$username = "root";
$password = "";
$dbname="restaurant";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {                    //connected to server n then created db 
  die("Connection failed: " . mysqli_connect_error()."<br>");
}else{
echo "Connected successfully<br>";}

$sqldb = "CREATE DATABASE IF NOT EXISTS $dbname"; //query to create db
if ($conn->query($sqldb) === TRUE) {
  echo "Database created successfully <br>";  //if db is nt created it will create it eitherwise it will skip process 
} else {
  echo "Error creating database: " . $conn->error."<br>";
}
$conn1 = mysqli_connect($servername, $username, $password,$dbname);


$usertbl = "CREATE TABLE IF NOT EXISTS user (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,  --auto incremented values
    f_name VARCHAR(50) NOT NULL,
    m_name VARCHAR(50),
    l_name VARCHAR(50) NOT NULL,    
    username VARCHAR(50) NOT NULL,
    birth_date date,
    about_user VARCHAR(150),
    address VARCHAR(150),
    mobile VARCHAR(10),    
    email VARCHAR(50) NOT NULL,
    website VARCHAR(40),
    pass VARCHAR(500) NOT NULL,
    user_type VARCHAR(12) NOT NULL,
    ticket VARCHAR(500),      --ticket id used here to change password
    acc_status VARCHAR(15) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";    
    if ($conn1->query($usertbl) === TRUE) {      //in connection 1 we have given if query to create row in a table 
      $pass = base64_encode('admin');
    $addadmin= "INSERT INTO user (f_name,l_name,username,email,pass,user_type,acc_status) 
    VALUES('Admin','admin','contact@gmail.com','contact@gmail.com','$pass','Owner','Temporary')";  //owner details 
  mysqli_query($conn1, $addadmin);
  echo "User Table Created and Admin User Created <br>";
    } else {
      echo "Error creating User table: " . $conn1->error."<br>";
    }

    $menu_categorytbl = "CREATE TABLE IF NOT EXISTS menu_category (   
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,                --category list part from Dish Menu
      menu_cat_name VARCHAR(50) NOT NULL,
      menu_type_name VARCHAR(20) NOT NULL,
      menu_cat_image VARCHAR(100) NOT NULL,
      reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
      )";    
      if ($conn1->query($menu_categorytbl) === TRUE) {       //makes connection and execute menu_category query
        echo "Table menu category table successfully Created <br>";
      } else {
        echo "Error creating menu category table: " . $conn1->error."<br>";   //else part
      }


    $menutbl = "CREATE TABLE IF NOT EXISTS menu (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      menu_name VARCHAR(50) NOT NULL,                 --From Dish Menu- Menu List Part
      menu_detail VARCHAR(100) NOT NULL, 
      price INT(3) NOT NULL,
      menu_image VARCHAR(100) NOT NULL,
      menu_type VARCHAR(7) NOT NULL,
      category VARCHAR(50) NOT NULL,
      menu_status VARCHAR(10) NOT NULL,
      reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
      )";    
      if ($conn1->query($menutbl) === TRUE) {
        echo "Table menutbl table successfully Created <br>";
      } else {
        echo "Error creating menu table: " . $conn1->error."<br>";
      }


  $imagetbl = "CREATE TABLE IF NOT EXISTS gallery (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    menuname VARCHAR(25) NOT NULL,                                    --From Dish Menu- Add Menu part 
      img_status VARCHAR(10) NOT NULL,
      reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
      ) ENGINE=InnoDB";
      if ($conn1->query($imagetbl) === TRUE) {
        echo "Table gallery table successfully Created <br>";
      } else {
        echo "Error creating gallery table: " . $conn1->error."<br>";
      }

  $eventtbl = "CREATE TABLE IF NOT EXISTS events (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(50) NOT NULL,                     --Event Part 
    event_detail VARCHAR(200) NOT NULL,
    price VARCHAR(5) NOT NULL,
    event_image VARCHAR(100) NOT NULL,
    event_status VARCHAR(10) NOT NULL,
    event_date date NOT NULL,
    display_status VARCHAR(10) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";    
    if ($conn1->query($eventtbl) === TRUE) {
      echo "Table event table successfully Created <br>";
    } else {
      echo "Error creating events table: " . $conn1->error."<br>";
    }

  $slidetbl = "CREATE TABLE IF NOT EXISTS slide (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,      --Slide Part
    slide_name VARCHAR(50) NOT NULL,
    slide_detail VARCHAR(100),
    slide_image VARCHAR(100) NOT NULL,
    slide_offer VARCHAR(10) NOT NULL,          
    display_status VARCHAR(10) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";    
    if ($conn1->query($slidetbl) === TRUE) {
      echo "Table slide table successfully Created <br>";
    } else {
      echo "Error creating slide table: " . $conn1->error."<br>";
    }

  $booktbl = "CREATE TABLE IF NOT EXISTS book_table (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,    
    cust_name VARCHAR(60),                                 --Table booking Part for Customer
    cust_email VARCHAR(60),
    cust_mobile VARCHAR(10),    
    cust_date date NOT NULL,
    cust_time VARCHAR(6) NOT NULL,            
    cust_people INT(2) NOT NULL,
    cust_message VARCHAR(100) NOT NULL, 
    cust_status VARCHAR(15) NOT NULL,            
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";    
    if ($conn1->query($booktbl) === TRUE) {
      echo "Table book table successfully Created <br>";
    } else {
      echo "Error creating book_table table: " . $conn1->error."<br>";
    }

    $eventbooktbl = "CREATE TABLE IF NOT EXISTS book_event (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,      
      cust_name VARCHAR(60) NOT NULL,                             --Event Booking part for Customer
      cust_email VARCHAR(60) NOT NULL,            
      event_name VARCHAR(60) NOT NULL, 
      event_fee VARCHAR(20) NOT NULL,   
      event_date VARCHAR(20) NOT NULL,        
      cust_city VARCHAR(60) NOT NULL,
      cust_pincode INT(6) NOT NULL,                        
      cust_status VARCHAR(15) NOT NULL,
      reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
      )";    
      if ($conn1->query($eventbooktbl) === TRUE) {
        echo "Table event table successfully Created <br>";
      } else {
        echo "Error creating bookevents table: " . $conn1->error."<br>";
      }

  $feedbacktbl = "CREATE TABLE IF NOT EXISTS feedback (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    test_name VARCHAR(50) NOT NULL,                                  --Feedback Part
    test_email VARCHAR(60),
    test_subject VARCHAR(50) NOT NULL,              
    test_message VARCHAR(500) NOT NULL,   
    display_status VARCHAR(10) NOT NULL,         
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";    
    if ($conn1->query($feedbacktbl) === TRUE) {
      echo "Table feedback table successfully Created <br>";
    } else {
      echo "Error creating feedback table: " . $conn1->error."<br>";
    }

  $franchisetbl = "CREATE TABLE IF NOT EXISTS franchise (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    part_fname VARCHAR(50) NOT NULL,                           --Franchise Part
    part_mname VARCHAR(50) NOT NULL,
    part_lname VARCHAR(50) NOT NULL,
    part_email VARCHAR(60),
    part_phone VARCHAR(10) NOT NULL,               
    part_address VARCHAR(60) NOT NULL,                            
    part_message VARCHAR(500) NOT NULL,        
    display_status VARCHAR(10) NOT NULL,             
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";    
    if ($conn1->query($franchisetbl) === TRUE) {
      echo "Table franchise table successfully Created <br>";
    } else {
      echo "Error creating franchise table: " . $conn1->error."<br>";
    }

  $careertbl = "CREATE TABLE IF NOT EXISTS career (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    job_name VARCHAR(50) NOT NULL,                              --Career Part
    city VARCHAR(60),
    experience INT(2) NOT NULL,               
    sallery INT(5) NOT NULL,               
    education VARCHAR(60),
    jobdetail VARCHAR(500),
    display_status VARCHAR(10) NOT NULL,             
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";    
    if ($conn1->query($careertbl) === TRUE) {
      echo "Table cereer table successfully Created <br>";
    } else {
      echo "Error creating career table: " . $conn1->error."<br>";
    }

  $applntbl = "CREATE TABLE IF NOT EXISTS careerappln (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    applnname VARCHAR(50) NOT NULL,                         --Career Application part
    jobtitle VARCHAR(100) NOT NULL,                         --have created resume folder so the resume part isndone in that
    reference VARCHAR(20) NOT NULL, 
    city VARCHAR(60),
    experience INT(2) NOT NULL,               
    sallery INT(5),               
    education VARCHAR(60),
    jobdetail VARCHAR(500),
    document VARCHAR(200),
    email VARCHAR(70) NOT NULL,
    mobile VARCHAR(10) NOT NULL,                
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";    
    if ($conn1->query($applntbl) === TRUE) {
      echo "Table cereer table successfully Created <br>";
    } else {
      echo "Error creating careerappln table: " . $conn1->error."<br>";
    }

    $conn->close();                   //connection close
    $conn1->close();

?> 
