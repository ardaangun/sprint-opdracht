<?php
session_start();


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
   
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$password = $_SESSION['password'];
?>

<!DOCTYPE html>
<html>
<head></head>
<body>
    <h1> PDO Login and Registration</h1>
    <h1> Welcome to the HOME page!</h1><br><br>

    <h2>Username: <?php echo $username; ?></h2>
    
    <h2>Password: <?php echo $password; ?></h2>

    <h1> The game can begin</h1>

    <a href="home.php">Log out</a>
</body