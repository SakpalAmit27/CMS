

<?php

session_start();

if(isset($_POST['email'])){
    if($stmt = $connect->prepare('SELECT * FROM users WHERE email = ? AND password = ? AND active = 1')){
        $hashed = SHA1($_POST['password']);
        $stmt->bind_param('ss',$_POST['email'],$hashed); 

        $stmt->execute(); 

        $result = $stmt->get_result();

        $user = $result->fetch_assoc();

        var_dump($user);

        if($user){
            $_SESSION['id'] = $user['id'];
            $_SESSION['email'] = $user['email']; 
            $_SESSION['username'] = $user['username'];

            // giving a feedback after its connect // 
            set_message("You have successfully logged in " . $_SESSION['username']);
            header('Location:dashboard.php');
             
            exit;

        }else{
            echo '<div style="color: red; text-align: center;">Invalid email or password.</div>';
        }
        $stmt->close();
    }else{
        echo 'Could not prepare statement!'; 
    }


}
 
?>


<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<center>
<body>
    <div class="card w-96 bg-base-100 shadow-xl mt-20">
        <div class="card-body">
            <h2 class="card-title text-2xl font-bold mb-6">Login</h2>
            <form method="POST">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <label class="input input-bordered flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70"><path d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" /><path d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" /></svg>
                        <input type="email" name="email" class="grow" placeholder="email@example.com" />
                    </label>
                </div>
                <div class="form-control mt-4">
                    <label class="label">
                        <span class="label-text">Password</span>
                    </label>
                    <label class="input input-bordered flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70"><path fill-rule="evenodd" d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z" clip-rule="evenodd" /></svg>
                        <input type="password" name="password" class="grow" placeholder="Enter password" />
                    </label>
                    <label class="label">
                        <a href="#" class="label-text-alt link link-hover">Forgot password?</a>
                    </label>
                </div>
                <div class="form-control mt-6">
                    <button class="btn btn-primary">
                        Login
                    </button>
                </div>
            </form>
            <div class="divider">OR</div>
            <div class="text-center">
                <p>Don't have an account?</p>
                <a href="#" class="link link-primary">Sign up now</a>
            </div>
        </div>
    </div>
</body>
</center>

</html>




