<?php

@ include 'config.php';


session_start();

if(!isset( $_SESSION['user_name'])){
    header('location:loginform.php');
}


?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <div class="container">
        <div class="content">
            <h3>hi,<span>user</span></h3>
            <h1>Welcome <span><?php echo $_SESSION['user_name']  ?></span></h1>
            <p>this is an user page</p>
            <a href="loginform.php" class="btn">Login</a>
            <a href="registerform.php" class="btn">Register</a>
            <a href="logout.php" class="btn">Logout</a>



            <div class="form-container">
        <form action="" method="post">
            <h3>User Details</h3>

            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-message">' . $error . '</span>';
                };
            };
            ?>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name </label>
                <input type="text" name="name" value="<?php echo $_SESSION['user_name']  ?>" class="form-control" id="exampleFormControlInput1" placeholder="enter your name">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Age</label>
                <input type="number" name="age" class="form-control" id="exampleFormControlInput1" placeholder="enter your age">
            </div>


            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Gender</label>
                <input type="text" name="gender" class="form-control" id="exampleFormControlInput1" placeholder="enter your gender">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Position</label>
                <input type="text" name="position" class="form-control" id="exampleFormControlInput1" placeholder="enter your position">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Salary</label>
                <input type="number" name="salary" class="form-control" id="exampleFormControlInput1" placeholder="enter your salary">
            </div>

           
            <input type="submit" name="submit" value="Save" class="form-btn">
         

        </form>

    </div>
        </div>
    </div>
</body>
</html>