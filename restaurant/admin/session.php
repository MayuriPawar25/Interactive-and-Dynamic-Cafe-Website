<?php    

    $usertype = $_SESSION['usertype'];
    $acc_status = $_SESSION['acc_status'];

    if(!isset($_SESSION["username"])) {
        header("Location: ../signin.html");
    exit();    
    }    
    
    if($usertype == "Owner"){        
        header("Location: ../owner/index.php");          
       
    }elseif($usertype == "Admin"){   
        if($acc_status=="Temporary"){          
            header("Location: userinfo.php");        
        }
    }elseif($usertype == "Customer"){
        header("Location: ../index.php");
          
    }
    
?>