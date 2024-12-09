

<?php

 function secure(){
    if(!isset($_SESSION['id'])){
        echo '<div style="color: red; text-align: center;">Please Login First to view this Page</div>';
        die();
    }
 }


 function set_message($message){
    {
        $_SESSION['message'] = $message;

    }
 }

 function get_message(){
    if(isset($_SESSION['message'])){
        echo '<p>' . $_SESSION['message'] . '</p>'; 
        unset($_SESSION['message']);
        
    }
 }

?>

