<?php
 include ("data.php");
echo "mail sending in process.";
 mail($to, $subject, $message);

 header('location: users.php');
?>