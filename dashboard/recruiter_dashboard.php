<?php

include '../includes/get_user.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $user['user_name'] ?> | RECRUITER | RECRUITMENT COMPANY</title>
    <link rel="stylesheet" href="./styles/recruiter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<?php
    include_once '../includes/header.php'; 
?>
    
    <main>

        <div class="frame">
            <div class="side_bar">
                <a href="./browse_candidates.html">Browse Candidates</a>
                <a href="">Complaints</a>
                <a href="">Notifications</a>
                <a href="">FAQ</a>
                <a href="">Settings</a>
            </div>
        </div>
        <div class="frame">

            <!-- personal data -->
            <div class="sub_frame">
                <img src="<?php echo $user['image'] ?>" alt="recruiter_img">
                <div class="text">
                    <h3><?php echo $user['company'] ?></h3>
                    <p><?php echo $user['user_name'] ?></p>
                </div>
            </div>

            <!-- recieved applications -->
            <div class="sub_frame">
                <h3>Received Applications</h3>
                <div class="box_frame">
                    <div class="title_row row">
                        <div class="data_box">Name</div>
                        <div class="data_box">Applied Jobs</div>
                        <div class="data_box">Email</div>
                        <div class="data_box">Action</div>
                    </div>
                    <div class="data_row row">
                        <div class="data_box"></div>
                        <div class="data_box"></div>
                        <div class="data_box"></div> 
                        <div class="data_box">
                            <div class="action">
                                <i class="fa-solid fa-eye"></i>
                                <!-- <p>View</p> -->
                            </div>
                            <div class="action">
                                <i class="fa-solid fa-thumbs-up"></i>
                                <!-- <p>Approve</p> -->
                            </div>
                            <div class="action">
                                <i class="fa-solid fa-thumbs-down"></i>
                                <!-- <p>Reject</p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- advertisements -->
            <div class="sub_frame">
                <h3>Advertisements</h3>
                <div class="button_row">
                    <div class="button">
                        <p>Add Post</p>
                        <i class="fa-solid fa-plus"></i>
                    </div>
                </div>
                <div class="post_container">
                    <div class="post_card">
                        <p class="title">Lorem ipsum dolor sit amet.</p>
                        <p class="post">Lorem, ipsum dolor.</p>
                        <div class="desc">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore sed eos doloribus ab, ipsum corrupti, nisi laboriosam eius dolorem, laudantium voluptatem! Magnam autem nam at cupiditate quos voluptate dolores praesentium!</div>
                        <div class="actions">
                            <a href="" class="button">
                                <i class="fa-solid fa-box-archive"></i>
                                Archive
                            </a>
                            <a href="" class="button">
                                <i class="fa-solid fa-trash-can"></i>
                                Delete
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            
            <!-- package details -->
            <div class="sub_frame">
                <div class="pckg">
            <?php
                $pkg_sql = "SELECT * FROM packages WHERE id = '". $user['package'] ."'";
                $fetch_pkg = $conn -> query($pkg_sql);
                
                if ($fetch_pkg -> num_rows > 0) {
                    $pkg_name = $fetch_pkg -> fetch_assoc();

                    echo $pkg_name['name'].' User';
                } else {
                    echo 'Choose Your Subscription';
                }
                
            ?>
                </div>
                <a class="pckg" href="../pages/pricing.php">Change Subscription</a>
            </div>

        </div>

    </main>


<?php
    include_once '../includes/header.php'; 
?>

</body>
</html>