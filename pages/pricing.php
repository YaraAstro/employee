<?php

include '../includes/get_user.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pricing | RECRUITMENT COMPANY</title>
    <link rel="stylesheet" href="./styles/pricingStyle.css">
</head>
<body>

<?php
    include_once '../includes/header.php';
?>

    <div class="pricing-table">
        <h1>Pricings</h1>
        <div class="pricing-cards">

        <?php

$pricing_sql = "SELECT * FROM packages";
$fetch_pkgs = $conn->query($pricing_sql);

if ($fetch_pkgs->num_rows > 0) {
    while ($pkgs = $fetch_pkgs->fetch_assoc()) {

        echo "
        <div class=\"card\">
            <h2>{$pkgs['name']}</h2>
            <div class=\"price\">
                <span>{$pkgs['monthly_rate']}</span>
            </div>
            <ul class=\"features\">";

        $specs = explode(",", $pkgs['features']);
        
        foreach ($specs as $key => $feature) {
            echo "<li>✔ {$feature}</li>";
        }

        echo "</ul>
            <a class=\"button\" href='../includes/add_pkg.php?pkgID={$pkgs['id']}'>Choose</a>
        </div>
        ";

    }
} else {
    echo "<p>No packages available.</p>"; // Optional: message when no packages found
}

?>

        </div>
    </div>

<?php
    include_once '../includes/footer.php';
?>

</body>
</html>