<?php
session_start();

if (isset($_POST["update"])) {

    include_once '../../includes/config.php';

    $uid = $_SESSION["user_id"]; 

    // Delete the land entry from the database
    $sql = "DELETE FROM recruiter WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../recruiter.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $uid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: ../recruiter.php?error=none");
    exit();
} else {
    // Redirect to the login page or display an error message if the delete button is not clicked
    header("Location: ../login.php?error=deletebuttonnotclicked");
    exit();
}
?>