<?php 

include '../includes/get_user.php';

$delete_sql = "DELETE FROM ".$_SESSION['user_type']." WHERE id = '".$_SESSION['user_id']."'";

if ($conn->query($delete_sql) === true && $conn->affected_rows > 0) {
    header("Location: ../includes/log_out.php");
    exit();
} else {
    echo 'something went wrong!';
}

$conn -> close();

?>