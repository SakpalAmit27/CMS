
<?php 

    session_start();  
    
    include('./includes/database.php');

    include('./includes/components/navbar/navbar.php');
    

    include_once('./includes/components/secure/functions.php');
    secure();

    // getting our user here fetching it form db // 

    if($stmt = $connect->prepare('SELECT * FROM users')){
        $stmt -> execute(); 

        $result = $stmt->get_result();
        
        $user = $result->fetch_assoc();

        var_dump($user);
        die();

        if($user){

        }

        $stmt->close();
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users management</title>
</head>
<body>
        <div class="text-center items-center justify-center mt-10" style="height: 100vh;">
            <h1 class="display-1 mb-4">USERS MANAGEMENT</h1>
            <div class="flex flex-row gap-6 items-center justify-center text-center list-container">
            <span><a href="users.php">Users management</a></span>
            <span> | </span>
            <span><a href="posts.php">Posts management</a></span>

            </div>
        </div>


    <?php include('./includes/components/footer/footer.php') ?>
</body>



<style>

   @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Eczar&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Oswald:wght@600&family=Permanent+Marker&family=Pixelify+Sans:wght@400..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&display=swap');


    .display-1{
    font-family:raleway;
    font-weight:800;
    font-size:1.7rem;
    }

    .list-container{
        font-family:inter;
        font-weight:500;
        font-size:1rem;
    }
</style>
</html>

