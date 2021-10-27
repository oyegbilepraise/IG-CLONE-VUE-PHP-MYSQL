<?php

require('connect.php');
// include('connect.php');
$connect = new Controller;
$con = $connect->con;
$used_email;

$fetchedData = "SELECT `id`, `trn_date`, `fullname`, `username`, `email`, `phonenumber` FROM `users_tb`";
$result = $con->query($fetchedData);
// echo ($result);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        // $used_email = $row['email'];
        echo $row["id"] . " " . $row["fullname"] . " - Name: " . $row["phonenumber"] . " " . $row["email"] . " " . $row["username"] . "<br>";
    }
} else {
    echo "0 results";
}

// echo ($fetchedData);

if (isset($_REQUEST['username'])) {
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($con, $username);
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con, $email);
    $phonenumber = stripslashes(($_REQUEST['phonenumber']));
    $phonenumber = mysqli_real_escape_string($con, $phonenumber);
    $fullname = stripslashes($_REQUEST['fullname']);
    $fullname = mysqli_real_escape_string($con, $fullname);
    $pass = stripslashes($_REQUEST['password']);
    $pass = mysqli_real_escape_string($con, $pass);
    $sql = "INSERT INTO `users_tb`(`fullname`, `username`, `email`, `password`, `phonenumber`) VALUES ('$fullname', '$username', '$email', '$pass', '$phonenumber')";

    if ($con->query($sql) === TRUE) {
        echo "<div class='form'>
    <h3>You are registered successfully.</h3>
    <br/>Click here to <a href='login.php'>Login</a></div>";
    } elseif ($used_email) {
        echo "Used Email...";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
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
        </div <div class="container">
        <p class="text-secondary text-center pt-2" style="font-weight: 500; font-size: 18px">
            Sign up to see photos and videos from your friends.
        </p>
    </div>
    <div align="center">
        <button class="btn" style="width: 280px; height: 35px; background-color: #0095F6; font-weight: 500;">
            <span style="margin-top: -50px">
                <p class="text-white">Login with Facebook</p>
            </span>
        </button>
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
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form">
            <div class="form-row">
                <div class="form-group">
                    <input type="email" placeholder="Mobile Number Or Email" class="style" name="email">
                </div>
            </div>

            <div class="form-row" style="margin-top: 5px">
                <div class="form-group">
                    <input type="text" placeholder="Full Name" class="style" name="fullname" required>
                </div>
            </div>

            <div class="form-row" style="margin-top: 5px">
                <div class="form-group">
                    <input type="number" placeholder="Phone Number" class="style" name="phonenumber" required>
                </div>
            </div>

            <div class="form-row" style="margin-top: 5px">
                <div class="form-group">
                    <input type="text" placeholder="Username" class="style" name="username" required>
                </div>
            </div>

            <div class="form-row" style="margin-top: 5px">
                <div class="form-group">
                    <input type="password" placeholder="Password" class="style" name="password" required>
                </div>
            </div>
            <div align="center" style="margin-top: 15px;">
                <button type="submit" class="btn" style="width: 280px; height: 35px; background-color: #0095F6; font-weight: 500;" name="submit">
                    <span style="margin-top: -50px">
                        <p class="text-white">Next</p>
                    </span>
                </button>
            </div>
        </form>
    </div>


    <div class="text-center text-muted container mb-6" style="margin-top: 10px">
        <p style="font-size: 13px;">
            <input type="checkbox"><strong>Terms and conditions applies</strong>
        </p>
    </div>
    <br>
    </div>

    <div class="bg-white shadow-sm w-25 container" style="margin-top: 10px; height: 50px">
        <p class="text-center pt-2">
            Have an account? <a href="login.php">Login</a>
        </p>
    </div>
</body>

</html>