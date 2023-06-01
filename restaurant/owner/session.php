<?php    

    $usertype = $_SESSION['usertype'];
    $acc_status = $_SESSION['acc_status'];

    if(!isset($_SESSION["username"])) {
        header("Location: ../signin.html");
    exit();    
    }    
    
    if($usertype == "Owner"){
        if($acc_status=="Temporary"){
            header("Location: userinfo.php");
        }
       
    }elseif($usertype == "Admin"){        
            header("Location: ../admin/index.php");          
    }elseif($usertype == "Customer"){
        header("Location: ../index.php");
          
    }
    
?>