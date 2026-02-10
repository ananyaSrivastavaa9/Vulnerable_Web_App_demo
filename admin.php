<?php
// admin.php - intentionally accessible without auth (showing broken access control)
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - Vulnerable Web App</title>
</head>
<body>
    <h1>Admin Panel</h1>
    <p><strong>Warning:</strong> This page is intentionally left open (no authentication).</p>

    <h3>Registered Users (from database.txt)</h3>
    <pre>
<?php
if (file_exists('database.txt')) {
    echo htmlspecialchars(file_get_contents('database.txt'));
} else {
    echo "database.txt not found.";
}
?>
    </pre>

    <p>Admin controls (fake):</p>
    <ul>
        <li>Edit products (not implemented)</li>
        <li>Delete user (not implemented)</li>
    </ul>

    <p><a href="index.html">Back to Home</a></p>
</body>
</html>
