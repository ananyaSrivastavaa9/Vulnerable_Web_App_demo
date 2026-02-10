<?php
// login.php - intentionally insecure (for learning only)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // No input validation or sanitization - intentionally vulnerable
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Backdoor - hardcoded password (vulnerability)
    if ($password === 'letmein123') {
        echo "<h3>Login successful (backdoor)</h3>";
        echo "<p>You are logged in as <b>admin (backdoor)</b>.</p>";
        echo "<p><a href='admin.php'>Go to Admin Panel</a></p>";
        exit;
    }

    // Read plain-text database (vulnerable)
    $db = '';
    if (file_exists('database.txt')) {
        $db = file_get_contents('database.txt');
    }

    // Simple string match (vulnerable to many issues)
    if ($db !== '' && strpos($db, $username . ':' . $password) !== false) {
        echo "<h3>Login successful</h3>";
        echo "<p>Welcome, <b>" . htmlspecialchars($username) . "</b></p>";
        echo "<p><a href='admin.php'>Go to Admin Panel</a></p>";
    } else {
        echo "<h3>Login failed</h3>";
        echo "<p>Wrong username or password.</p>";
        echo "<p><a href='login.php'>Try again</a></p>";
    }
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Vulnerable Web App</title>
</head>
<body>
    <h2>Login (Intentionally Insecure)</h2>

    <form method="POST" action="login.php">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="text" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>

    <p><a href="index.html">Back to Home</a></p>
</body>
</html>
