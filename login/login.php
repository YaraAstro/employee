<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sing In | RECRUITMENT COMPANY</title>

    <link rel="shortcut icon" href="../images/logo/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./loginStyles.css">
</head>
<body>
    <div class="container">
        <div class="left-section">
            <div class="content">
                <h2>Welcome to <span>My Dashboard</span></h2>
                <p>Login to access your account</p>
            </div>
        </div>
        <div class="right-section">
            <div class="login-box">
                <h3>Login</h3>
                <form action="./login_action.php" method="post">
                    <div class="input-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email">
                    </div>
                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password">
                    </div>
                    <div class="actions">
                        <button type="submit">Log in</button>
                        <div class="checkbox">
                            <input type="checkbox" id="keep-logged-in">
                            <label for="keep-logged-in">Keep me logged in</label>
                        </div>
                    </div>
                    <a href="#" class="forgot-password">Forgot password?</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>