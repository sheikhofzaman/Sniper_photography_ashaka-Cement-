<?php
// Run this file to generate a new password hash
// Example: http://yourdomain.com/sniper-photography/generate_hash.php?password=yourpassword

$password = isset($_GET['password']) ? $_GET['password'] : 'admin123';
$hash = password_hash($password, PASSWORD_DEFAULT);

echo "Password: " . htmlspecialchars($password) . "<br>";
echo "Hash: " . $hash . "<br><br>";
echo "SQL Query:<br>";
echo "UPDATE users SET password_hash = '" . $hash . "' WHERE username = 'admin';";
?>
