<?php

include '../includes/config.php';

session_start();

if (isset($_SESSION['user_id'], $_SESSION['user_type'])) {
    $is_logged_in = true;

    if ($_SESSION['user_type'] === 'candidate') {
        $dashboard_path = '../dashboard/candidate_dashboard.php';
    } else {
        $dashboard_path = '../dashboard/recruiter_dashboard.php';
    }

    // Add a space before the WHERE clause
    $user_sql = "SELECT * FROM " . $_SESSION['user_type'] . " WHERE id = '" . $_SESSION['user_id'] . "'";
    // echo $user_sql;
    
    // Execute the query
    $user_details = $conn->query($user_sql);

    // Check if the query executed successfully
    if (!$user_details) {
        echo "Error executing query: " . $conn->error;
        exit();
    }

    // Fetch user details if found
    if ($user_details->num_rows > 0) {
        $user = $user_details->fetch_assoc();
    } else {
        echo "Internal Error: User not found!";
        exit();
    }
} else {
    $is_logged_in = false;

    // Redirect to login if not logged in
    header("Location: ../login/login.php");
    exit();
}

// You can continue with your code here using $user and $is_logged_in
?>
