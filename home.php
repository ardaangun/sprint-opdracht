<?php
session_start();

$sn = "localhost";
$dbuser = "root";
$dbpws = "";
$db = "inlogopdracht";

$dsn = "mysql:host=$sn;dbname=$db;charset=utf8mb4";

$username = $_SESSION['username'];
$password = $_SESSION['password'];

try {
    $pdo = new PDO($dsn, $dbuser, $dbpws);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Check if user is logged in
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        echo "<h1>Welcome op de HOME-pagina!</h1>";
        echo "<p>U bent ingelogd!!! Het spel kan beginnen.</p>";
        echo "Naam: " . $username. "<br>";
        echo "Wachtwoord: " . $password. "<br>";
        echo '<a href="login.php"><button>Logout</button></a>';
    } 
    
    else {
        echo "<h1>PDO Login and Registration</h1>";
        echo "<p>U bent niet ingelogd. Login om verder te gaan.</p>";
        echo '<a href="Login.php">Login</a>';
    }
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>