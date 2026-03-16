<?php
session_start();

$message = "";

if (isset($_POST['send'])) {
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
    $message = "User is added";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Register</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="send">Send</button>
        </form>
        <p class="message">
            <?php
                echo $message;
                if ($message != "") {
                    echo ' <a href="login.php">Login</a>';
                }
            ?>
        </p>
    </div>
</body>
</html>