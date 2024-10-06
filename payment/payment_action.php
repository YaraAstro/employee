<?php

session_start();

include '../includes/config.php';
include '../includes/create_id.php';

if ($_SESSION['user_type'] === 'candidate') {
    $dashboard_path = '../dashboard/candidate_dashboard.php';
} else {
    $dashboard_path = '../dashboard/recruiter_dashboard.php';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form data
    $amount = $_POST['amount']; // In cents for most payment gateways
    $userId = $_POST['user'];
    $plan = $_POST['plan'];
    $creditCardNumber = $_POST['credit_card'];
    $expireMonth = $_POST['expire_month'];
    $ccv = $_POST['ccv'];
    $name = $_POST['name'];
    $pay_status = 'pending';

    $pay_id = createID('PY', 'payment', $conn);

    // Corrected SQL INSERT statement with payment_status
    $pay_stmt = $conn->prepare("INSERT INTO payment (id, user_id, pkg_id, amount, credit_card_number, expire_month, ccv, name, payment_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $pay_stmt->bind_param("sssssssss", $pay_id, $userId, $plan, $amount, $creditCardNumber, $expireMonth, $ccv, $name, $pay_status);

    if ($pay_stmt->execute()) {
        
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
        echo "Error processing payment: " . $pay_stmt->error; // Corrected to use $pay_stmt
    }

}

// Close the database connection if needed
$conn->close();

?>
