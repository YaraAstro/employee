<?php

include '../includes/config.php';
include '../includes/create_id.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST);

    // Get the registration type
    $reg_type = $_POST['regType'];
    $img_path = '../images/user_placeholder.jpg';

    if ($reg_type == 'candidate') {
        // Candidate registration variables
        $firstName = $_POST['first-name'];
        $lastName = $_POST['last-name'];
        $gender = $_POST['gender'];
        $dateOfBirth = $_POST['date_of_birth'];
        $mobileNo = $_POST['mobile_no'];
        $email = $_POST['email'];
        $experience = $_POST['experience'];
        $addComment = $_POST['add_comment'];
        $password = $_POST['pass_word'];

        // Generate user ID
        $user_id = createID('C', $reg_type, $conn);
        $dashboard_path = '../dashboard/candidate_dashboard.php';

        // Handle file upload
        $resume = $user_id . '_resume.' . pathinfo($_FILES['cv_file']['name'], PATHINFO_EXTENSION);
        $resume_path = '../documents/candidate/resume/' . $resume;
        if (move_uploaded_file($_FILES['cv_file']['tmp_name'], $resume_path)) {
            // Prepare SQL statement
            $sql = "INSERT INTO candidate (id, first_name, last_name, gender, date_of_birth, mobile_no, email, experience, image, cv_file, user_comment, user_password) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssssssss", $user_id, $firstName, $lastName, $gender, $dateOfBirth, $mobileNo, $email, $experience, $img_path, $resume, $addComment, $password);

            if ($stmt->execute()) {
                echo "Candidate registered successfully.";
                header("Location: $dashboard_path");
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Failed to upload resume.";
        }

    } else {
        // Recruiter registration
        $name = $_POST['name'];
        $mobileNoRecruiter = $_POST['mobile_no_recruiter'];
        $company = $_POST['company'];
        $emailRecruiter = $_POST['email_recruiter'];
        $commentRecruiter = $_POST['comment'];
        $password = $_POST['pass_word'];

        // Generate user ID
        $user_id = createID('R', $reg_type, $conn);
        $dashboard_path = '../dashboard/recruiter_dashboard.php';

        // Prepare SQL statement
        $sql = "INSERT INTO recruiter (id, user_name, mobile_no, company, email, add_message, image, user_password) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssss", $user_id, $name, $mobileNoRecruiter, $company, $emailRecruiter, $commentRecruiter, $img_path, $password);

        if ($stmt->execute()) {
            echo "Recruiter registered successfully.";
            header("Location: $dashboard_path");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}

?>
