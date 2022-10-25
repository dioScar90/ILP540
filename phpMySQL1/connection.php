<?php
/**
 * Create database connection
 */

$database_server = 'localhost';
$database_username = 'root';
$database_password = '';
$database_name = 'contatos';

// Create connection using mysql_connect()
$conn = mysqli_connect(
            $database_server, 
            $database_username,
            $database_password, 
            $database_name);

if (!$conn) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

echo "Database connect successfully.<br>";
?>