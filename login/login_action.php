<?php

include '../includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // fetch the data from login form
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];

    $find_from_candidate = "SELECT * FROM candidate WHERE email = '$user_email' AND user_password = '$user_password'";
    $fetch_candidate = $conn -> query($find_from_candidate);

    if ($fetch_candidate -> num_rows > 0) {

        session_start();

        $candidate = $fetch_candidate -> fetch_assoc();

        $_SESSION['user_id'] = $candidate['id'];
        $_SESSION['user_type'] = 'candidate';

        header("Location: ../dashboard/candidate_dashboard.php");
        exit();

    } else {

        $find_from_recruiter = "SELECT * FROM recruiter WHERE email = '$user_email' AND user_password = '$user_password'";
        $fetch_recruiter = $conn -> query($find_from_recruiter);

        if ($fetch_recruiter -> num_rows > 0) {
            
            session_start();

            $recruiter = $fetch_recruiter -> fetch_assoc();

            $_SESSION['user_id'] = $recruiter['id'];
            $_SESSION['user_type'] = 'recruiter';

            header("Location: ../dashboard/recruiter_dashboard.php");
            exit();

        } else {

            header("Location: ../login/login.php");
            exit();
            
        }
    }

}

?>