<?php

@include 'config.php';
session_start();
;
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_GET['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $pass = md5($_POST['password']);
    $cpass = md5($_GET['cpassword']);
    $user_type = $_GET['user_type'];

    $select = " SELECT * FROM user_form  WHERE email='$email' && password='$pass'  ";
    $result = mysqli_query($conn, $select);
   
    if (mysqli_num_rows($result) > 0) {
        $row=mysqli_fetch_array($result);
        if($row['user_type']=='admin'){
            $_SESSION['email']=$row['email_id'];
            $_SESSION['admin_name']=$row['name'];
            header('location:adminpage.php');

        }elseif($row['user_type']=='user'){

            $_SESSION['user_name']=$row['name'];
            header('location:userpage.php');
        }else{
            $error[]='incorrect email or password';
        };
      
    };
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
    <form action="" method="post">
        <h3>Login Now</h3>
        <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-message">' .$error. '</span>';
                };
            };
            ?>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
      
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="enter your password">
            </div>
   
        
        <input type="submit" name="submit" value="login now" class="form-btn">
        <p>don't have an account ? <a href="registerform.php">Register now</a></p>

    </form>

    </div>
</body>
</html>