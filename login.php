<?php
session_start();
include_once("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam = $_POST['uname'];
    $wachtwoord = $_POST['psw'];

    $stmt = $pdo->prepare("SELECT * FROM gebruikers WHERE naam = :naam AND wachtwoord = :wachtwoord");
    $stmt->bindParam(':naam', $naam);
    $stmt->bindParam(':wachtwoord', $wachtwoord);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user['naam'];
        $_SESSION['password'] = $user['wachtwoord'];

        header("Location: home.php");
        exit();
    } else {
        echo "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <h1> PDO Login and Registration</h1>
    <h1> Login here...</h1>
    <div class="container">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="uname"><b>naam</b></label>
            <input type="text" placeholder="Naam invoegen..." name="uname" required><br>

            <label for="psw"><b>wachtwoord</b></label>
            <input type="password" placeholder="Wachtwoord invoegen..." name="psw" required><br>

            <button type="submit">Inloggen</button>
        </form>
    </div>
    <a href="reg.php">Registreren</a>
</body>
</html>