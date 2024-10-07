<?php

include '../includes/get_user.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $full_name ?> Update User Details | RECRUITER | RECRUITMENT COMPANY</title>
    <link rel="stylesheet" href="./styles/recruiter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

<?php
    include_once '../includes/header.php'; 
?>

    <main>
        <div class="frame">
            <div class="container">
                <h1>Update User Details</h1>
                <form action="recruiter_update_action.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                    <section>
                        <fieldset>
        
                            <label for="user_name">Username:</label>
                            <input type="text" id="user_name" name="user_name" value="<?php echo $user['user_name']; ?>"
                                required>
        
                            <label for="mobile_no">Mobile Number:</label>
                            <input type="tel" id="mobile_no" name="mobile_no" value="<?php echo $user['mobile_no']; ?>"
                                required>
        
                            <label for="company">Company:</label>
                            <input type="text" id="company" name="company" value="<?php echo $user['company']; ?>">
        
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>
                            
                            
    
                        </fieldset>
                        <fieldset>
                            <label for="add_message">Additional Message:</label>
                            <textarea id="add_message" name="add_message"><?php echo $user['add_message']; ?></textarea>
        
                            <label for="image" class="img_cont">
                                <img id="showPic" class="profile_img" src ='<?php echo $user["image"]; ?>' >
                                <input type="file" id="image" name="userImg" hidden>
                            </label>
        
                            
                        
                        </fieldset>
                    </section>
                    <section>
                        <button type="submit" class="action" name="update">Update Details</button>
                        <a class="action" href="../includes/delete_user.php">Delete Profile</a> 
                    </section>

                </form>

            </div>
        </div>
    </main>

    <script>
        // image upload
        let getImg = document.getElementById('image');
        getImg.addEventListener('change', (event) => {
            let pic = event.target.files[0];
            if (pic) {
                let showImg = document.getElementById('showPic');
                let newSrc = URL.createObjectURL(pic);

                showImg.src = newSrc;
                showImg.onload = () => URL.revokeObjectURL(newSrc)
            }
        });
    </script>

<?php
    include_once '../includes/header.php'; 
?>

</body>

</html>