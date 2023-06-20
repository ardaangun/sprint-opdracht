<?php
session_start();
include_once("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam = $_POST['uname'];
    $wachtwoord = $_POST['psw'];

    $stmt = $pdo->prepare("INSERT INTO gebruikers (naam, wachtwoord) VALUES (?, ?)");
    $stmt->execute([$naam, $wachtwoord]);

    echo "Registration successful!";
}
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <h1> PDO Login and Registration</h1>
    <h1> Register here...</h1>
    <div class="container">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="uname"><b>naam</b></label>
            <input type="text" placeholder="Naam invoegen..." name="uname" required><br>

            <label for="psw"><b>wachtwoord</b></label>
            <input type="password" placeholder="Wachtwoord invoegen..." name="psw" required><br>

            <button type="submit">Registreren</button>
        </form>
    </div>
    <a href="login.php">Terug naar Login scherm</a>
</body>
</html>
3