<?php

include_once '../../includes/config.php';
session_start();
$userId = $_SESSION["user_id"];

$sql = "SELECT * FROM recruiter WHERE id = '$userId'";
$result = $conn->query($sql);
$data = $result->fetch_assoc();

$type = 'recruiter';  // You can dynamically set this based on user type, e.g., $_SESSION['user_type']
$image_folder = "../../documents/$type/profile/";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User Details | RECRUITER | RECRUITMENT COMPANY</title>
    <link rel="stylesheet" href="./styles/recruiter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <main>
        <div class="frame">
            <div class="container">
                <h1>Update User Details</h1>
                <form action="recruiter_update_action.php" method="post" enctype="multipart/form-data">
                    <label for="id">User ID:</label>
                    <input type="text" id="id" name="id" value="<?php echo $data['id']; ?>" readonly>

                    <label for="user_name">Username:</label>
                    <input type="text" id="user_name" name="user_name" value="<?php echo $data['user_name']; ?>"
                        required>

                    <label for="mobile_no">Mobile Number:</label>
                    <input type="tel" id="mobile_no" name="mobile_no" value="<?php echo $data['mobile_no']; ?>"
                        required>

                    <label for="company">Company:</label>
                    <input type="text" id="company" name="company" value="<?php echo $data['company']; ?>">

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $data['email']; ?>" required>

                    <label for="add_message">Additional Message:</label>
                    <textarea id="add_message" name="add_message"><?php echo $data['add_message']; ?></textarea>

                    <label for="image">Profile Image:</label>
                    <input type="file" id="image" name="image" accept="image/*">
                    <img src ='../../documents/<?php echo $data["image"]; ?>'  width ='100px' hight = '100px'>
                    
                    <label for="package">Package:</label>
                    <input type="text" id="package" name="package" value="<?php echo $data['package']; ?>">

                    <label for="user_password">Password:</label>
                    <input type="password" id="user_password" name="user_password"
                        value="<?php echo $data['user_password']; ?>" required>

                    <label for="created_at">Created At:</label>
                    <input type="date" id="created_at" name="created_at" value="<?php echo $data['created_at']; ?>"
                        required>

                    <button type="submit" name="update">Update Details</button>
                </form>

            </div>
        </div>
    </main>
</body>

</html>