<?php 

session_start();
include '../includes/config.php'; // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve POST data
    $userId = $_POST['user_id'];
    $userName = $_POST['user_name'];
    $mobileNo = $_POST['mobile_no'];
    $company = $_POST['company'];
    $email = $_POST['email'];
    $addMessage = $_POST['add_message'];


    if (isset($_FILES['userImg']) && $_FILES['userImg']['error'] === UPLOAD_ERR_OK) {
        // Handle file upload
        $imageExtension = pathinfo($_FILES['userImg']['name'], PATHINFO_EXTENSION);
        $profile_picture = $userId . '_profile_picture.' . $imageExtension;
        $image_path = '../documents/recruiter/profile/' . $profile_picture;

        // Move the uploaded file
        move_uploaded_file($_FILES['userImg']['tmp_name'], $image_path);
    } else {
        // Fetch existing image if no new upload
        $result = $conn->query("SELECT image FROM recruiter WHERE id = '$userId'");
        if ($result && $row = $result->fetch_assoc()) {
            $image_path = $row['image'];
        }
    }

    // Update the database
    $update_sql = "UPDATE recruiter SET user_name = ?, mobile_no = ?, company = ?, email = ?, add_message = ?, image = ? WHERE id = ?";
    if ($update_stmt = $conn->prepare($update_sql)) {
        $update_stmt->bind_param("sssssss", $userName, $mobileNo, $company, $email, $addMessage, $image_path, $userId);
        $update_stmt->execute();
        header("Location: ../dashboard/recruiter_dashboard.php");
        exit();
    }
}

?>
