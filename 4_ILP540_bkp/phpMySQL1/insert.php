<?php
/**
 * Insert data into table
 */

use LDAP\Result;

require_once('connection.php');

$mysql_query = "INSERT INTO users (nome, email, datanasc) VALUES 
                    ('Nicole Raimunda', 'nico@gmail.com', '2003-10-14'),
                    ('Vivian Teixeira', 'vivian@gmail.com', '2004-07-10'),
                    ('Evandro Ribeiro', 'evandro@gmail.com', '2000-08-12')";

$result = $conn->query($mysql_query);

if ($result) {
    echo "Records inserted successfully.";
} else {
    echo "Error inserting records: " . $conn->error;
}

mysqli_close($conn);
?>