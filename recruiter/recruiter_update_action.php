<?php 

session_start();
include '../includes/config.php'; // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve POST data
    $userId = $_POST['user_id']; // Keep as string
    $userName = $_POST['user_name'];
    $mobileNo = $_POST['mobile_no'];
    $company = $_POST['company'];
    $email = $_POST['email'];
    $addMessage = $_POST['add_message'];

    // File upload
    $imageExtension = pathinfo($_FILES['userImg']['name'], PATHINFO_EXTENSION);
    $profile_picture = $userId . '_profile_picture.' . $imageExtension;
    $image_path = '../documents/recruiter/profile/' . $profile_picture;

    // Check for file upload errors
    if ($_FILES['userImg']['error'] !== UPLOAD_ERR_OK) {
        echo 'File upload error!';
        exit();
    }

    // Move the uploaded file
    if (!move_uploaded_file($_FILES['userImg']['tmp_name'], $image_path)) {
        echo 'Failed to move uploaded file.';
        exit();
    }

    // Prepare the SQL statement
    $update_sql = "UPDATE recruiter SET user_name = ?, mobile_no = ?, company = ?, email = ?, add_message = ?, image = ? WHERE id = ?";
    if ($update_stmt = $conn->prepare($update_sql)) {
        // Bind parameters
        $update_stmt->bind_param("sssssss", $userName, $mobileNo, $company, $email, $addMessage, $image_path, $userId);

        // Execute the statement
        if ($update_stmt->execute()) {
            header("Location: ../dashboard/recruiter_dashboard.php");
            exit();
        } else {
            echo 'Something went wrong during the update!';
        }

        // Close the statement
        $update_stmt->close();
    } else {
        echo 'Failed to prepare SQL statement!';
    }
}

?>
