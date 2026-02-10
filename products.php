<?php
// Very simple vulnerable products page (for demo)
// DB: vuln_db, Table: products(id INT, name VARCHAR(100), price INT)

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "vuln_db";

$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) { die("DB connection failed"); }

// If table doesn't exist, try creating a small demo table
mysqli_query($conn, "CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  price INT
)");

mysqli_query($conn, "INSERT INTO products(name, price) VALUES ('Apple', 100)");
mysqli_query($conn, "INSERT INTO products(name, price) VALUES ('Banana', 40)");
mysqli_query($conn, "INSERT INTO products(name, price) VALUES ('Mango', 80)");

?>
<!DOCTYPE html>
<html>
<body>
<h2>Products (Vulnerable SQL)</h2>

<form method="GET" action="">
  Search by name: <input type="text" name="name">
  <button type="submit">Search</button>
</form>

<hr>

<?php
if (isset($_GET['name'])) {
    $name = $_GET['name'];

    // ❌ Intentionally VULNERABLE query (no escaping) – SQLi possible
    $query = "SELECT id, name, price FROM products WHERE name LIKE '%$name%'";
    $result = mysqli_query($conn, $query);

    echo "<p><b>Executed query:</b> $query</p>";

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>" . $row['id'] . " | " . $row['name'] . " | Rs " . $row['price'] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No results</p>";
    }
}
?>
<p><a href="index.html">Back to Home</a></p>
</body>
</html>