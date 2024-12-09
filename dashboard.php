
<?php 

    session_start();    

    include('./includes/components/navbar/navbar.php');
    

    include_once('./includes/components/secure/functions.php');
    secure();
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <div>
        <h1 class="text-center text-4xl font-bold">Dashboard</h1>
        
    </div>

    <?php include('./includes/components/footer/footer.php') ?>
</body>
</html>

