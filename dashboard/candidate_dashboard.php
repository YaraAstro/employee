<?php 

include '../includes/get_user.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $full_name ?> | CANDIDATE | RECRUITMENT COMPANY</title>
    <link rel="stylesheet" href="./styles/candidate.css">
</head>
<body>

<?php
    include '../includes/header.php';
?>

    <main>

        <div class="frame">
            <div class="side_bar">
                <a href="">Seek for a Job</a>
                <a href="">Complaints</a>
                <a href="">Notifications</a>
                <a href="">FAQ</a>
                <a href="../candidate/candidate_update.php">Settings</a>
            </div>
        </div>

        <div class="frame">
            <div class="mini_frame">
                <img src="<?php echo $user['image'] ?>" alt="profile_picture">
                <div class="data_box">
                    <h3><?php echo $full_name ?></h3>
                    <p><?php echo $user['email'] ?></p>
                    <p><span><?php echo $user['experience'] ?></span> yesr experience</p>
                </div>
            </div>
            <div class="mini_frame">
                <p>
                <?php echo $user['user_comment'] ?>
                </p>
            </div>
            <div class="mini_frame">
                <div class="button">
                    <?php
                    $pkg_sql = "SELECT * FROM packages WHERE id = '". $user['package'] ."'";
                    $fetch_pkg = $conn -> query($pkg_sql);
                    
                    if ($fetch_pkg -> num_rows > 0) {
                        $pkg_name = $fetch_pkg -> fetch_assoc();

                        echo $pkg_name['name'].' User';
                    } else {
                        echo 'Standard User';
                    }
                    
                ?>
                </div>
                <a class="button" href="../pages/pricing.php">Change Subscription</a>
            </div>
        </div>

    </main>


<?php
    include '../includes/footer.php';
?>
</body>
</html>