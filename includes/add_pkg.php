<?php

include '../includes/get_user.php';

$pkg = $_GET['pkgID'];
$update_sql = "UPDATE ". $_SESSION['user_type'] . " SET package = '$pkg' WHERE id = '" . $_SESSION['user_id'] . "'";

if ($conn -> query($update_sql) === true) {
    header("Location: $dashboard_path");
    exit();
} else {
    echo "Error updating package: " . $conn->error;
}

// Close the database connection if needed
$conn->close();

?>