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

    $pckg_id = $_GET['pkgID'];
    $pckg_sql = "SELECT * FROM packages WHERE id = '".$pckg_id."'";
    $fetch_pckg = $conn -> query($pckg_sql);

    if ($fetch_pckg ->num_rows > 0) {
        $pckg_data = $fetch_pckg -> fetch_assoc();
        $label_text = $pckg_data['name'].' Subscription';
    } else {
        $label_text = 'Standard User';
    }

?>
    
    <main>
        <div class="frame">
            
            <div class="sub_frame">
                <div class="price">
                    <?php echo $pckg_data['monthly_rate'].'USD' ?>
                </div>
                <div class="details">
                    <p> 
                        <?php echo $label_text ?>
                    </p>
                    <p><?php echo $full_name ?></p>
                </div>
            </div>

            <div class="sub_frame">
                <h3>Make Payment</h3>
                <form action="./payment_action.php" method="post">

                    <input type="hidden" name="amount" value="<?php echo $pckg_data['monthly_rate'] ?>">
                    <input type="hidden" name="user" value="<?php echo $user['id'] ?>">
                    <input type="hidden" name="plan" value="<?php echo $pckg_data['id'] ?>">

                    <div class="input_box">
                        <label for="credit_card">Credit Card</label>
                        <input type="text" name="credit_card" id="credit_card">
                    </div>
                    <div class="row">
                        <div class="input_box">
                            <label for="expire_month">Expire Month</label>
                            <input type="month" name="expire_month" id="expire_month">
                        </div>
                        <div class="input_box">
                            <label for="ccv">CCV</label>
                            <input type="text" maxlength="3" name="ccv" id="ccv">
                        </div>
                    </div>
                    <div class="input_box">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name">
                    </div>

                    <button type="submit"><?php echo 'Pay '.$pckg_data['monthly_rate'] ?></button>
                </form>
            </div>
        </div>
    </main>

<?php
    include '../includes/footer.php';
?>

</body>
</html>