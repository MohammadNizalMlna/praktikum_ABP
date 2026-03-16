<?php
session_start();

$message = "";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($_SESSION['username']) && isset($_SESSION['password'])) {

        if ($username == $_SESSION['username'] && $password == $_SESSION['password']) {
            $message = "Welcome " . $username;
        } else {
            $message = "Wrong username/password";
        }

    } else {
        $message = "Wrong username/password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="login">Login</button>
            <a href="register.php">Register</a>
        </form>
        <p class="message">
            <?php echo $message; ?>
        </p>
    </div>
</body>
</html>