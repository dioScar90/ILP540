<?php
/**
 * Insert data into table
 */

use LDAP\Result;

require_once('connection.php');

$mysql_query = "UPDATE users SET NOME='Jesse Willian Alterado' WHERE id=1";

$result = $conn->query($mysql_query);

if ($result) {
    echo "Records update successfully.";
} else {
    echo "Error update records: " . $conn->error;
}

mysqli_close($conn);
?>