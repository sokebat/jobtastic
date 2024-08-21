<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Login</title>
    <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
<?php include('../shared/navbar.php'); ?>
    <div class="login-container">
        <h2>Employer Login</h2>
        <form action="../helper/functions.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter Username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn" name="signin">Sign In</button>
        </form>
        <div class="register-link">
            Not a member? <a href="./employer_register.php">Sign Up</a>
        </div>
    </div>
    <?php include('../shared/footer.php'); ?>
</body>
</html>
