<?php
session_start(); 

include('./includes/database.php');

include_once('./includes/components/secure/functions.php');

secure();

if (isset($_POST['username'])) {
    if ($stmt = $connect->prepare('INSERT INTO users (username, email, password, active) VALUES (?, ?, ?, ?)')) {
        $hashed = SHA1($_POST['password']);
        $stmt->bind_param('ssss', $_POST['username'], $_POST['email'], $hashed, $_POST['active']); 
        $stmt->execute();

        set_message("<hr> <center> A new user " . $_POST['username'] . " has been added </center> <hr>");
        $stmt->close();

        header('Location: users.php');
        exit; // Stop further execution
    } else {
        die('Could not prepare statement');
    }
}
include('./includes/components/navbar/navbar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New User</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap');
        .form-title {
            font-weight: 800;
            font-family: Raleway, sans-serif;
        }
    </style>
</head>
<body>
<center>
    <div class="card w-96 bg-base-100 shadow-xl mt-20">
        <div class="card-body">
            <h2 class="card-title text-2xl font-bold mb-6 text-center form-title">Add New User</h2>
            <form method="POST">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <label class="input input-bordered flex items-center gap-2">
                        <input type="email" name="email" class="grow" placeholder="email@example.com" required />
                    </label>
                </div>
                <div class="form-control mt-3">
                    <label class="label">
                        <span class="label-text">Username</span>
                    </label>
                    <label class="input input-bordered flex items-center gap-2">
                        <input type="text" name="username" class="grow" placeholder="name" required />
                    </label>
                </div>
                <div class="form-control mt-3">
                    <label class="label">
                        <span class="label-text">Password</span>
                    </label>
                    <label class="input input-bordered flex items-center gap-2">
                        <input type="password" name="password" class="grow" placeholder="Enter password" required />
                    </label>
                </div>
                <select class="select select-secondary w-full max-w-xs mt-6" name="active" id="active">
                    <option selected value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
                <div class="form-control mt-6">
                    <button class="btn btn-secondary" type="submit">Add User</button>
                </div>
            </form>
        </div>
    </div>
</center>
</body>
</html>
