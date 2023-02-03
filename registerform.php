<?php

@include 'config.php';

// $conn =mysqli_connect('localhost','root','','user_db');
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];

    $select = " SELECT * FROM user_form  WHERE email='$email' && password='$pass'  ";
    $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result) > 0) {

        $error[] = 'user already exist!';
    } else {
        if ($pass != $cpass) {
            $error[] = 'Password not matched';
        } else {
            $insert = "INSERT INTO user_form(name,email,password,user_type) VALUES ('$name','$email','$pass','$user_type')";
            mysqli_query($conn, $insert);
            header('location:loginform.php');
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register form</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
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
                <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="enter your name">
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
</body>

</html>