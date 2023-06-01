<?php    

    $usertype = $_SESSION['usertype']; 
    $ticket = $_SESSION['ticket'];    

    if(!isset($_SESSION["username"])) {
        header("Location: ../signin.html");
    exit();    
    }    
    
    if($usertype == "Owner"){        
            header("Location: ../owner/index.php");               
    }elseif($usertype == "Admin"){        
            header("Location: ../admin/index.php");          
    }
    
    if($ticket != NULL){        
        header("Location: ../index.php?notify");          
    }

?>