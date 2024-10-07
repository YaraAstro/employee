<?php 

session_start();

include '../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capture the POST variables
    $user_id = $_POST['u_id'];
    $firstName = $_POST['f_name'];
    $lastName = $_POST['l_name'];
    $email = $_POST['e-mail'];
    $contactNo = $_POST['contct_No'];
    $dob = $_POST['dob'];
    $userComment = $_POST['comment'];

    $profile_path = null;

    // Check if an image was uploaded
    if (isset($_FILES['add_image']) && $_FILES['add_image']['error'] === UPLOAD_ERR_OK) {
        $profile = $user_id . '_profile_picture.' . pathinfo($_FILES['add_image']['name'], PATHINFO_EXTENSION);
        $profile_path = '../documents/candidate/profile/' . $profile;

        // Move the uploaded file
        if (!move_uploaded_file($_FILES['add_image']['tmp_name'], $profile_path)) {
            echo 'Failed to move uploaded file.';
            exit();
        }
    } else {
        // Optionally fetch the existing image path from the database
        $result = $conn->query("SELECT image FROM candidate WHERE id = '$user_id'");
        if ($result && $row = $result->fetch_assoc()) {
            $profile_path = $row['image']; // Retain existing image path if no new image is uploaded
        }
    }

    // Prepare the SQL statement for updating the candidate
    $update_stmt = $conn->prepare("UPDATE candidate SET first_name = ?, last_name = ?, email = ?, mobile_no = ?, date_of_birth = ?, image = ?, user_comment = ? WHERE id = ?");

    // Bind parameters (assuming user_id is an integer)
    $update_stmt->bind_param('ssssssss', $firstName, $lastName, $email, $contactNo, $dob, $profile_path, $userComment, $user_id);

    // Execute the statement
    if ($update_stmt->execute()) {
        header("Location: ../dashboard/candidate_dashboard.php");
        exit();
    } else {
        echo "Error updating profile: " . $update_stmt->error;
    }

    $update_stmt->close();
}

$conn->close();

?>
