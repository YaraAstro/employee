<?php 

include '../includes/get_user.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $full_name ?> Update User Details | RECRUITER | RECRUITMENT COMPANY</title>
    <link rel="stylesheet" href="./update_candidate.css">
</head>
<body>

<?php
    include '../includes/header.php';
?>
    
    <main>
        <div class="form_frame">
            <h1>Update User Details</h1>
            <form action="./update_action.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="u_id" value="<?php echo $user['id'] ?>">
                <section>
                    <fieldset>
                        <div class="input_frame">
                            <label for="">First Name :</label>
                            <input value="<?php echo $user['first_name'] ?>" type="text" name="f_name" id="f_name">
                        </div>
                        <div class="input_frame">
                            <label for="">Email :</label>
                            <input value="<?php echo $user['email'] ?>" type="email" name="e-mail" id="">
                        </div>
                        <div class="input_frame">
                            <label for="">Contact :</label>
                            <input value="<?php echo $user['mobile_no'] ?>" type="tell" name="contct_No" id="">
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="input_frame">
                            <label for="">Last Name :</label>
                            <input value="<?php echo $user['last_name'] ?>" type="text" name="l_name" id="">
                        </div>
                        <div class="input_frame">
                            <label for="">Date of Birth :</label>
                            <input value="<?php echo $user['date_of_birth'] ?>" type="date" name="dob" id="">
                        </div>
                        <div class="input_frame">
                            <label for="">Comment :</label>
                            <textarea name="comment" id=""><?php echo $user['user_comment'] ?></textarea>
                        </div>
                    </fieldset>
                </section>
                <label for="add_image">
                    <img src="<?php echo $user['image'] ?>" alt="">
                    <input value="<?php echo $user['image'] ?>" type="file" name="add_image" id="add_image" hidden>
                </label>

                <div class="button_row">
                    <button type="reset">Cancel</button>
                    <button type="submit">Update</button>
                </div>

            </form>
        </div>
    </main>

<?php
    include '../includes/footer.php';
?>

</body>
</html>