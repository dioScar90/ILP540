<?php
/**
 * Delete data from a Table
 */
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    require_once('connection.php');

    // Mysql query to delete record from table
    $mysql_query = "DELETE FROM users WHERE id=$id";

    if ($conn->query($mysql_query) === TRUE) {
        echo "Record deleted successfully.";
    }
    else {
        echo "Error deleting record: " . $conn->error;
    }

    // Connection Close
    mysqli_close($conn);
} else {
    echo "Error deleting record: no id passed.";
}
?>