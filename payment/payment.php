<?php
    include '../includes/get_user.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment | RECRUITMENT COMPANY</title>
    <link rel="stylesheet" href="./paymentStyles.css">
</head>
<body>

<?php
    include '../includes/header.php';
?>
    
    <main>
        <div class="frame">
            
            <div class="sub_frame">
                <div class="price">
                    1452.55
                </div>
                <div class="details">
                    <p>Premium Subscription</p>
                    <p><?php echo $full_name ?></p>
                </div>
            </div>

            <div class="sub_frame">
                <h3>Make Payment</h3>
                <form action="" method="post">

                    <input type="hidden" name="amount" value="<?php echo $user['id'] ?>">
                    <input type="hidden" name="user" value="">

                    <div class="input_box">
                        <label for="">Credit Card</label>
                        <input type="text" name="" id="">
                    </div>
                    <div class="row">
                        <div class="input_box">
                            <label for="">Expire Month</label>
                            <input type="month" name="" id="">
                        </div>
                        <div class="input_box">
                            <label for="">CCV</label>
                            <input type="text" maxlength="3" name="" id="">
                        </div>
                    </div>
                    <div class="input_box">
                        <label for="">Name</label>
                        <input type="text" name="" id="">
                    </div>

                    <button type="submit">Pay</button>
                </form>
            </div>
        </div>
    </main>

<?php
    include '../includes/footer.php';
?>

</body>
</html>