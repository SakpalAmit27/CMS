<?php

$connect = mysqli_connect('localhost','cms','blackend@7890','cms');


if(mysqli_connect_errno()){
    exit('Failed to connect to MySQL : ' .mysqli_connect_error());
}

?>