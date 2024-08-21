<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header('Location: ../index.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>JobTastic Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/user.css">
</head>

<body>

    <?php include('../shared/navbar.php'); ?>

    <div class="intro-section">
        <h1>Welcome to JobTastic</h1>
        <p>Your one-stop destination for finding the perfect job. Whether you're looking for a career in IT,
            engineering, marketing, or any other field, we have a wide range of job categories to explore. Our mission
            is to connect job seekers with employers and provide a platform that facilitates smooth and efficient job
            searches. Start your journey with us today and discover the opportunities waiting for you.</p>
    </div>

    <div class="job_category">
        <h3><span class="glyphicon glyphicon-th-list"></span>&nbspExplore Our Job Categories</h3>
        <div class="row">
            <div class="col-sm-4">
                <ul>
                    <li><a href="../views/job_listings.php?category=Engineering">Engineering </a></li>
                    <li><a href="../views/job_listings.php?category=IT">IT & Telecommunication</a></li>
                    <li><a href="../views/job_listings.php?category=Marketing">Marketing/Sales</a></li>
                    <li><a href="../views/job_listings.php?category=NGO">NGO</a></li>
                </ul>
            </div>

            <div class="col-sm-4">
                <ul>
                    <li><a href="../views/job_listings.php?category=Accounting">Accounting/Finance</a></li>
                    <li><a href="../views/job_listings.php?category=Bank">Bank</a></li>
                    <li><a href="../views/job_listings.php?category=Commercial">Commercial</a></li>
                    <li><a href="../views/job_listings.php?category=Education">Education</a></li>
                </ul>
            </div>

            <div class="col-sm-4">
                <ul>
                    <li><a href="../views/job_listings.php?category=Support">Customer support/Call center</a></li>
                    <li><a href="../views/job_listings.php?category=Garments">Garments/Textile</a></li>
                    <li><a href="../views/job_listings.php?category=Industry">Industry</a></li>
                    <li><a href="../views/job_listings.php?category=Others">Others</a></li>
                </ul>
            </div>
        </div>
    </div>


    <?php include('../shared/footer.php'); ?>

</body>

</html>