<?php

@include 'config.php';
session_start();

if(!isset( $_SESSION['admin_name'])){
    header('location:loginform.php');
}



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <h3>hi,<span>admin</span></h3>
            <h1>Welcome <span><?php echo $_SESSION['admin_name']  ?></span></h1>
            <p>this is an admin page</p>
            <a href="loginform.php" class="btn">Login</a>
            <a href="registerform.php" class="btn">Register</a>
            <a href="logout.php" class="btn">Logout</a>


            <div class="form-container">
        <form action="" method="post">
            <h3>Register Now</h3>

            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-message">' . $error . '</span>';
                };
            };
            ?>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" name="name" value="<?php echo $_SESSION['admin_name'] ?>" class="form-control" id="exampleFormControlInput1" placeholder="enter your name">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="enter your password">
            </div>


            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Confirm Your Password</label>
                <input type="password" name="cpassword" class="form-control" id="exampleFormControlInput1" placeholder="confirm your password">
            </div>

            <select name="user_type">
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>
            <input type="submit" name="submit" value="register now" class="form-btn">
            <p>already have an account ? <a href="loginform.php">Login now</a></p>

        </form>

    </div>

            
        </div>
    </div>
</body>
</html>