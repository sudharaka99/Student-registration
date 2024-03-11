<?php
include('C:\wamp64\www\Student registration\Config\Constants.php');
$SITEURL = 'http://localhost/Student%20registration/';

if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Ensure session is started if not already
}

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM users WHERE UserName='$username' AND Password='$password'";
    $count = mysqli_num_rows($conn->query($sql));

    if ($count == 1) {
        $_SESSION['login'] = "<b style='color:green;'>Login Successful.</b>";
        $_SESSION['user'] = $username;
        header('location:' . $SITEURL . 'Home.php');
        exit(); // Add exit to stop further execution
    } else {
        $_SESSION['login'] = "<b style='color:red;'>Login Not Successful</b>";
        header('location:' . $SITEURL . 'index.php');
        exit(); // Add exit to stop further execution
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="Style.css">
    <style>
        .login-message {
            margin-top: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <form method="POST" action="">
            <h2>Login</h2>
            <?php
                if (isset($_SESSION['login'])) {
                    echo '<div class="login-message">' . $_SESSION['login'] . '</div>';
                    unset($_SESSION['login']);
                }
            ?>
            <br>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit" name="submit">Login</button>

        </form>
    </div>

    <script>
        // Your validation script here
    </script>
</body>
</html>
