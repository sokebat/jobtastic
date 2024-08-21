<!DOCTYPE html>
<html lang="en">

<head>
    <title>JobTastic Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./assets/css/index.css">
</head>

<body>

    <?php include('./shared/navbar.php'); ?>

    <div class="content">
        <div class="intro-section">
            <h1>Welcome to JobTastic</h1>
            <p>Your one-stop destination for finding the perfect job. Whether you're looking for a career in IT,
                engineering, marketing, or any other field, we have a wide range of job categories to explore. Our mission
                is to connect job seekers with employers and provide a platform that facilitates smooth and efficient job
                searches. Start your journey with us today and discover the opportunities waiting for you.</p>
        </div>

        <div class="login-section">
            <h2>Login to Access Your Account</h2>
            <p>Log in to your account to manage your job applications and more.</p>
            <div class="login-buttons">
                <a href="./user/user_login.php">User Login</a>
                <a href="./employer/employer_login.php">Employer Login</a>
            </div>
        </div>
        <div class="login-section">
            <h2>Register Your Account</h2>
            <p>Register your account to manage your job applications and more.</p>
            <div class="login-buttons">
                <a href="./user/user_register.php">User Register</a>
                <a href="./employer/employer_register.php">Employer Register</a>
            </div>
        </div>
    </div>

    <?php include('./shared/footer.php'); ?>

</body>

</html>