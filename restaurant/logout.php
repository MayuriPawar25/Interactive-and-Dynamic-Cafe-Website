<?php
include("owner/auth.php");
  session_destroy();
  header('location: index.php');
?>