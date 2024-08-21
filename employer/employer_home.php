<?php
include('../helper/functions.php');

session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'employer') {
    session_unset();
    session_destroy();
    header("Location: ../index.php");
    exit;
}

$empName = $_SESSION['username'];

$query = "SELECT company_name FROM employer_table WHERE username='$empName'";

 

$result = mysqli_query($connect, $query);

 
$companyName = mysqli_fetch_assoc($result)['company_name'];

$jobsQuery = "SELECT * FROM all_jobs WHERE company_name='$companyName'";
 
$jobsResult = mysqli_query($connect, $jobsQuery);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Employer Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/employer.css">
</head>

<body>

    <?php include('../shared/navbar.php'); ?>

    <div class="container">
        <h2 class="text-center">My Posts</h2>
        <div class="text-center">
            <a href="../views/post_job.php" class="btn btn-info">Post a Job</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Company Name</th>
                    <th>Position Name</th>
                    <th>Vacancy</th>
                    <th>Applying Last Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($jobsResult) > 0) {
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($jobsResult)) {
                        echo "<tr>";
                        echo "<td>" . $i++ . "</td>";
                        echo "<td>" . $row['company_name'] . "</td>";
                        echo "<td>" . $row['position_name'] . "</td>";
                        echo "<td>" . $row['vacancy'] . "</td>";
                        echo "<td>" . $row['last_date_of_apply'] . "</td>";
                        echo "<td>
                            <a href='../helper/update.php?update_job_id=" . $row['all_jobs_id'] . "' class='btn btn-info'>Update</a>
                            <a href='../helper/functions.php?job_delete_id=" . $row['all_jobs_id'] . "' class='btn btn-danger' onclick='return confirm(\"Are you sure to delete?\")'>Delete</a>
                          </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No jobs posted yet.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php include('../shared/footer.php'); ?>

</body>

</html>