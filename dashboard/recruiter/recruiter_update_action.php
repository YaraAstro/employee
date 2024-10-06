<?php
session_start();

if (isset($_POST['update'])) {
    require_once '../../includes/config.php';  // Adjust the path as needed

    // Retrieve form data from the POST request
    $uid = $_SESSION["user_id"];  // Use the logged-in user's ID from the session
    $id = $_POST['id'];
    $user_name = $_POST['user_name'];
    $mobile_no = $_POST['mobile_no'];
    $company = $_POST['company'];
    $email = $_POST['email'];
    $add_message = $_POST['add_message'];
    $package = $_POST['package'];
    $user_password = $_POST['user_password'];
    $created_at = $_POST['created_at'];

    // Fetch existing user data to retain current image if no new image is uploaded
    $sql_fetch = "SELECT image FROM recruiter WHERE id = ?";
    $stmt_fetch = $conn->prepare($sql_fetch);
    $stmt_fetch->bind_param("i", $uid);
    $stmt_fetch->execute();
    $result_fetch = $stmt_fetch->get_result();
    $data = $result_fetch->fetch_assoc();  // Fetch current data

    if (!$data) {
        // Handle case where no user is found
        header("Location: ../profilesettingAdmin.php?error=user_not_found");
        exit();
    }

    // Handle the image upload if an image is submitted
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image_temp = $_FILES['image']['tmp_name'];

        // Define the path where the image should be saved: documents/{type}/profile
        $type = 'recruiter';  // You can dynamically set this based on user type, e.g., $_SESSION['user_type']
        $image_folder = "../../documents/$type/profile/";

        // Create the directory if it doesn't exist
        if (!is_dir($image_folder)) {
            mkdir($image_folder, 0777, true);
        }

        // Set the image name as 'd_profile_pic'
        $image_name = $id.'profile_pic.jpg';  // Assuming the image is always jpg, adjust the extension as necessary

        // Full path to save the image
        $image_full_path = $image_folder . $image_name;

        // Move the uploaded file to the destination
        if (move_uploaded_file($image_temp, $image_full_path)) {
            // Image successfully uploaded
            $image = "$type/profile/$image_name";  // Save the path relative to the documents folder in the database
        } else {
            // Handle error in uploading the file
            header("Location: ../profilesettingAdmin.php?error=upload_failed");
            exit();
        }
    } else {
        // If no image is uploaded, retain the existing one from the database
        $image = $data['image'];
    }

    // SQL query to update user data, including the image path
    $sql = "UPDATE recruiter 
            SET user_name = ?, mobile_no = ?, company = ?, add_message = ?, image = ?, package = ?, user_password = ?, created_at = ?
            WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssi", $user_name, $mobile_no, $company,  $add_message, $image, $package, $user_password, $created_at, $uid);

    // Check for duplicate email before executing
    //$stmt->execute();
    try {
        if ($stmt->execute()) {
            // Redirect to the profile page after successful update
            header("Location: ../profilesettingAdmin.php?id=" . $uid);
            exit();
        } else {
            // If the update fails, likely due to duplicate email
            header("Location: ../profilesettingAdmin.php?error=duplicate_email");
            exit();
        }
    } catch (mysqli_sql_exception $e) {
        // Handle specific SQL errors, like duplicate entry
        header("Location: ../profilesettingAdmin.php?error=duplicate_", $e->getCode());
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    // If the form is not submitted, redirect to the profile settings page
    header("Location: ../profilesettingAdmin.php?error=invalid_request");
    exit();
}
