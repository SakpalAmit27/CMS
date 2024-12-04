

<?php

 function secure(){
    if(!isset($_SESSION['id'])){
        echo '<div style="color: red; text-align: center;">Please Login First to view this Page</div>';
        die();
    }
 }
?>