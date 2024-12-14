<?php

session_start();

include('./includes/database.php');

include('./includes/components/secure/functions.php'); 

secure(); 


if(isset($_GET['delete'])){

    if($stmt = $connect -> prepare('DELETE FROM users where id = ?')){
        $stmt -> bind_param('i' , $_GET['delete']);

        $stmt -> execute();

        set_message("<hr> <center> User : " . $_GET['username'] . " has been deleted ! </center> <hr>");
        $stmt -> close();

        
        header('Location: users.php');
        exit;
    }else{
        echo "Could not prepare statement!";
    }
}

include('./includes/components/navbar/navbar.php');
?>