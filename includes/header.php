<?php

include "../includes/config.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="../includes/styles/headerStyles.css">

    <style>
        <?php

        if (isset($is_logged_in) && $is_logged_in) {
            
            echo '
            .header-action:nth-child(1) {
                display: none;
            }
            ';

        }else{
            
            echo '
            .header-action:nth-child(2) {
                display: none;
            }
            ';

        }
            
        ?>
    </style>

</head>
<body>
    <header>
       <div class="header-frame">

        <!-- logo -->
        <div class="header-subframe">
            <img class="header-logo-img" src="../images/logo/logo.png" alt="logo_image">
            <h3>Recruitment Company</h3>
        </div>

        <!-- nav bar content -->
        <div class="header-subframe">
            
            <div class="header-miniframe">
                <a href="">Home</a>
                <a href="">About</a>
                <a href="">Companies</a>
                <a href="">Jobs</a>
                <a href="../pages/pricing.php">Pricing</a>
                <a href="">Contact Us</a>
            </div>

            <div class="header-miniframe">

                <!-- if user didn't sign in yet -->
                <div class="header-action">
                    <a class="buttons" href="../login/login.php">Sign in</a>
                    <a class="buttons" href="../register/register.html">Sign up</a>
                </div>

                <!-- if user has already logged in -->
                <div class="header-action">
                    <div class="profile-image">
                        <img src="<?php echo $user['image'] ?>" alt="profile_picture">
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-caret-down"></i>
                    </div>
                    <div class="dropdown">
                        <a href="<?php echo $dashboard_path ?>">Profile</a>
                        <a href="../includes/log_out.php">Log out</a>
                    </div>
                </div>

            </div>

        </div>

       </div> 
    </header>
</body>
</html>