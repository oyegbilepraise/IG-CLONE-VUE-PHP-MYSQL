<?php
require('connect.php');
$connect = new Controller;
$con = $connect->con;

// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION['login_user'])) {
    header('location:welcome.php');
}
// if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
//     header("location: welcome.php");
//     exit;
// }

if (isset($_REQUEST['email'])) {
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con, $email);
    $pass = stripslashes($_REQUEST['password']);
    $pass = mysqli_real_escape_string($con, $pass);
    $phonenumber = stripslashes(($_REQUEST['email']));
    $phonenumber = mysqli_real_escape_string($con, $phonenumber);

    $sql = "SELECT `fullname`, `username`, `phonenumber`, `email`, `password` FROM `users_tb` WHERE email = '$email' AND password = '$pass'";

    echo $sql;

    // $sql =  "SELECT `fullname`, `username`, `phonenumber`, `email`, `password` FROM `users_tb` WHERE phonenumber = '$phonenumber' AND 'password' = '$pass'";
    // echo $sql;

    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        echo "Helo";
        $row = $result->fetch_assoc();
        if ($row) {
            $_SESSION['login_user'] = $email;
            header("location: welcome.php");
        } else {
            $error = "Your Login Name or Password is invalid";
            echo $error;
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
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/js/bootstrap.min.js">
</head>

<body class="bg-light">


    <div class="container bg-primary w-25 bg-white shadow-sm">

        <div align="center" class="mt-5">
            <img src="Images/insta.png" alt="instagram" align="center">
        </div>

        <br>
        <!-- <br> -->

        <div align="center">
            <form method="POST" class="form">
                <div class="form-row">
                    <div class="form-group">
                        <input type="text" placeholder="Phone number, username, email" class='input' name="email">
                    </div>
                </div>

                <div class="form-row" style="margin-top: 5px">
                    <div class="form-group">
                        <input type="password" placeholder="Password" class='input' name="password">
                    </div>
                </div>
                <div align="center" style="margin-top: 15px;">
                    <button type="submit" class="btn" style="width: 280px; height: 35px; background-color: #0095F6; font-weight: 500;" name="submit">
                        <span style="margin-top: -50px">
                            <p class="text-white">Log in</p>
                        </span>
                    </button>
                </div>
            </form>
        </div>


        <div class="container d-flex" style="margin-left: 40px; margin-top: 30px" align="center">
            <span>
                <hr style="width: 100px; margin-right: 20px">
            </span>
            <p class="text-muted" style="font-weight: 500;">OR</p>
            <span>
                <hr style="width: 100px; margin-left: 20px">
            </span>
        </div>

        <div align="center">
            <span style="margin-top: -50px">
                <p class="text-primary" style="font-weight: 500;">Login with Facebook</p>
            </span>
            <p class="pt-2" style="font-size: 14px;">
                Forgot password?
            </p>
            <!-- </button> -->
        </div>
        <br>
    </div>

    <div class="bg-white shadow-sm w-25 container" style="margin-top: 20px; height: 50px">
        <p class="text-center pt-3">
            Don't have an account? <a href="signup.php">Sign up</a>
        </p>
    </div>
</body>

</html>