<?php

   session_start(); 

   include('./includes/database.php');

   include('./includes/components/navbar/navbar.php');

   include_once('./includes/components/secure/functions.php');

   secure();
   



?>