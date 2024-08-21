<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'employer') {
    header('Location: ../index.php');
    exit();
}

// error_reporting(E_ALL);
// ini_set('display_errors', 1);
include('database.php'); 

if (isset($_GET['update_job_id'])) {
    $id = intval($_GET['update_job_id']);
    $query = "SELECT * FROM all_jobs WHERE all_jobs_id = $id"; // Adjust the column name if needed
    // echo $sql;
    $result = mysqli_query($connect, $query);
    if ($result && mysqli_num_rows($result) == 1) {
        $job = mysqli_fetch_assoc($result);
    } else {
        echo '<script>alert("Job not found!"); window.location.href="../employer/employer_home.php";</script>';
        exit;
    }
}

if (isset($_POST['submit'])) {
    $position_name = test_input($_POST['position_name']);
    $company_name = test_input($_POST['company_name']);
    $job_category = test_input($_POST['job_category']);
    $vacancy = test_input($_POST['vacancy']);
    $job_responsibility = mysqli_real_escape_string($connect, $_POST['job_responsibility']);
    $job_nature = test_input($_POST['job_nature']);
    $job_requirements = mysqli_real_escape_string($connect, $_POST['job_requirements']);
    $educational_requirements = test_input($_POST['educational_requirements']);
    $experience_requirements = test_input($_POST['experience_requirements']);
    $last_date_of_application = test_input($_POST['last_date_of_application']);
    $job_location = test_input($_POST['job_location']);
    $salary_range = test_input($_POST['salary_range']);

    $update_query = "UPDATE all_jobs SET 
                        position_name = '$position_name', 
                        company_name = '$company_name', 
                        job_category = '$job_category', 
                        vacancy = '$vacancy', 
                        job_responsibility = '$job_responsibility', 
                        job_nature = '$job_nature', 
                        job_requirments = '$job_requirements', 
                        educational_requirements = '$educational_requirements', 
                        experience_requirement = '$experience_requirements', 
                        last_date_of_apply = '$last_date_of_application', 
                        job_location = '$job_location', 
                        salary_rang = '$salary_range' 
                    WHERE all_jobs_id = $id";

    $update_result = mysqli_query($connect, $update_query);

    if ($update_result) {
        echo '<script>alert("Job post updated successfully."); window.location.href="../employer/employer_home.php";</script>';
    } else {
        echo '<script>alert("Error updating job post: ' . mysqli_error($connect) . '");</script>';
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Job Post</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/post.css">
</head>
<body>
    <?php include('../shared/navbar.php'); ?>

    <div class="container">
        <h1>Update Job Post</h1>
        <form method="post" action="">
            <div class="form-group">
                <label>Position Name</label>
                <input type="text" name="position_name" value="<?php echo htmlspecialchars($job['position_name']); ?>" required>
            </div>

            <div class="form-group">
                <label>Company Name</label>
                <input type="text" name="company_name" value="<?php echo htmlspecialchars($job['company_name']); ?>" required>
            </div>

            <div class="form-group">
                <label>Job Category</label>
                <select name="job_category" required>
                    <option value="">Select Category</option>
                    <option value="Bank" <?php echo ($job['job_category'] == 'Bank') ? 'selected' : ''; ?>>Bank</option>
                    <option value="IT" <?php echo ($job['job_category'] == 'IT') ? 'selected' : ''; ?>>IT</option>
                    <option value="Engineering" <?php echo ($job['job_category'] == 'Engineering') ? 'selected' : ''; ?>>Engineering</option>
                    <option value="Marketing" <?php echo ($job['job_category'] == 'Marketing') ? 'selected' : ''; ?>>Marketing</option>
                    <option value="NGO" <?php echo ($job['job_category'] == 'NGO') ? 'selected' : ''; ?>>NGO</option>
                    <option value="Accounting" <?php echo ($job['job_category'] == 'Accounting') ? 'selected' : ''; ?>>Accounting</option>
                    <option value="Commercial" <?php echo ($job['job_category'] == '') ? 'selected' : ''; ?>>Commercial</option>
                    <option value="Education" <?php echo ($job['job_category'] == 'Education') ? 'selected' : ''; ?>>Education</option>
                    <option value="Support" <?php echo ($job['job_category'] == 'Support') ? 'selected' : ''; ?>>Support</option>
                    <option value="Garments" <?php echo ($job['job_category'] == 'Garments') ? 'selected' : ''; ?>>Garments</option>
                    <option value="Industry" <?php echo ($job['job_category'] == 'Industry') ? 'selected' : ''; ?>>Industry</option>
                    <option value="Others" <?php echo ($job['job_category'] == 'Others') ? 'selected' : ''; ?>>Others</option>

                </select>
            </div>

            <div class="form-group">
                <label>Vacancy</label>
                <input type="text" name="vacancy" value="<?php echo htmlspecialchars($job['vacancy']); ?>" required>
            </div>

            <div class="form-group">
                <label>Job Responsibility</label>
                <textarea name="job_responsibility" required><?php echo htmlspecialchars($job['job_responsibility']); ?></textarea>
            </div>

            <div class="form-group">
                <label>Job Nature</label>
                <input type="text" name="job_nature" value="<?php echo htmlspecialchars($job['job_nature']); ?>" required>
            </div>

            <div class="form-group">
                <label>Job Requirements</label>
                <textarea name="job_requirements" required><?php echo htmlspecialchars($job['job_requirments']); ?></textarea>
            </div>

            <div class="form-group">
                <label>Educational Requirements</label>
                <input type="text" name="educational_requirements" value="<?php echo htmlspecialchars($job['educational_requirements']); ?>" required>
            </div>

            <div class="form-group">
                <label>Experience Requirements</label>
                <input type="text" name="experience_requirements" value="<?php echo htmlspecialchars($job['experience_requirement']); ?>" required>
            </div>

            <div class="form-group">
                <label>Last Date of Application</label>
                <input type="date" name="last_date_of_application" value="<?php echo htmlspecialchars($job['last_date_of_apply']); ?>" required>
            </div>

            <div class="form-group">
                <label>Job Location</label>
                <input type="text" name="job_location" value="<?php echo htmlspecialchars($job['job_location']); ?>" required>
            </div>

            <div class="form-group">
                <label>Salary Range</label>
                <input type="text" name="salary_range" value="<?php echo htmlspecialchars($job['salary_rang']); ?>" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <div class="footer">
        <?php include('../shared/footer.php'); ?>
    </div>
</body>
</html>
