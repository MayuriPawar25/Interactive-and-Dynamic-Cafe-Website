<?php

include("owner/auth.php");


if (isset($_GET['token'])) {
$token = $_GET['token'];
$query = "UPDATE user SET ticket = NULL WHERE ticket = '$token'";
mysqli_query($db, $query);
unset($_SESSION['ticket']);
header('location: index.php?verified');
}

?>
