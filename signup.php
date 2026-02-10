<?php
// signup.php - intentionally insecure (for learning only)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // No input validation - intentionally vulnerable
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Save credentials in plain text (vulnerable)
    $line = $username . ':' . $password . PHP_EOL;

    // Append to database.txt (no locking, no encryption)
    file_put_contents('database.txt', $line, FILE_APPEND);

    echo "<h3>Registration Successful!</h3>";
    echo "<p>Username: <b>" . htmlspecialchars($username) . "</b></p>";
    echo "<p><a href='login.php'>Go to Login</a></p>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup - Vulnerable Web App</title>
</head>
<body>
    <h2>Signup (Intentionally Insecure)</h2>

    <form method="POST" action="signup.php">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="text" name="password" required><br>
        <small>Note: Password will be stored in plain text (vulnerable)</small><br><br>

        <input type="submit" value="Register">
    </form>

    <p><a href="index.html">Back to Home</a></p>
</body>
</html>
