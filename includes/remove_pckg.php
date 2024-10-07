<?php 

session_start();

include '../includes/config.php';

if (isset($_SESSION['user_id'], $_SESSION['user_type'])) {

    if ($_SESSION['user_type'] === 'candidate') {
        $dashboard_path = '../dashboard/candidate_dashboard.php';
    } else {
        $dashboard_path = '../dashboard/recruiter_dashboard.php';
    }

    $plan = 'none';
    
    // Using prepared statement for the UPDATE
    $update_stmt = $conn->prepare("UPDATE " . $_SESSION['user_type'] . " SET package = ? WHERE id = ?");
    $update_stmt->bind_param("ss", $plan, $_SESSION['user_id']);
    
    if ($update_stmt->execute()) {
        header("Location: $dashboard_path");
        exit();
    } else {
        echo "Error adding package: " . $conn->error;
    }


} else {

    // Redirect to login if not logged in
    header("Location: ../login/login.php");
    exit();

}



?>