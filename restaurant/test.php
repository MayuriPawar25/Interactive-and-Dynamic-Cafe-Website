<?php
   $token = "dfshfdh";
$email = "getaho2448@threepp.com";

$to = $email;
    $header="From: eternalg@eternalgig.com";
    
     $subject = 'Account Verification';
     $message = '<html>
     <head>
       
     </head>
     <body>
     <h2>Verification Link</h2>
       <p>Username:- '.$to.'</p>
       <p>Get verify account with <a href="https://restaurant.eternalgig.com/verify.php?token='.$token.'">https://restaurant.eternalgig.com/verify.php?token='.$token.'</a> link.</p>
     </body>
     </html>
     ';

    $header = "MIME-Version: 1.0" . "\r\n";
    $header = "Content-type:text/html;charset=UTF-8" . "\r\n";

     mail($to, $subject, $message, $header);
  
  
  ?>