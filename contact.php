<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "vuln_db";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create table if not exists (optional for demo)
mysqli_query($conn, "CREATE TABLE IF NOT EXISTS messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    message TEXT
)");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $message = $_POST["message"];

    // ❌ Intentionally VULNERABLE query (no escaping)
    $query = "INSERT INTO messages (name, message) VALUES ('$name', '$message')";
    mysqli_query($conn, $query);

    echo "<h3>Message Saved (Vulnerable)</h3>";
}
?>

<!DOCTYPE html>
<html>
<body>
<h2>Contact Form</h2>

<form method="POST" action="">
  Name:<br>
  <input type="text" name="name"><br><br>

  Message:<br>
  <textarea name="message"></textarea><br><br>

  <input type="submit" value="Save">
</form>

<?php
// ❌ VULNERABLE display: no encoding
$result = mysqli_query($conn, "SELECT name, message FROM messages");

echo "<h3>Saved Messages:</h3>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<p><b>" . $row['name'] . "</b>: " . $row['message'] . "</p>";
}
?>

</body>
</html>