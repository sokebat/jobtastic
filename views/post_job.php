<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'employer') {
  header('Location: ../index.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Job Post</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/css/post.css">
</head>

<body>
  <?php include('../shared/navbar.php'); ?>



  <?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  include('../helper/database.php');

  $position_name = $company_name = $job_category = $vacancy = $job_responsibility = $job_nature = $job_requirements = $educational_requirements = $experience_requirements = $last_date_of_application = $job_location = $salary_range = "";

  if (isset($_POST["submit"])) {
    $position_name = test_input($_POST["position_name"]);
    $company_name = test_input($_POST["company_name"]);
    $job_category = test_input($_POST["job_category"]);
    $vacancy = test_input($_POST["vacancy"]);
    $job_responsibility = mysqli_real_escape_string($connect, $_POST['job_responsibility']);
    $job_nature = test_input($_POST["job_nature"]);
    $job_requirements = mysqli_real_escape_string($connect, $_POST['job_requirements']);
    $educational_requirements = test_input($_POST["educational_requirements"]);
    $experience_requirements = test_input($_POST["experience_requirements"]);
    $last_date_of_application = test_input($_POST["last_date_of_application"]);
    $job_location = test_input($_POST["job_location"]);
    $salary_range = test_input($_POST["salary_range"]);
    if ($connect) {
      $sql = "INSERT INTO all_jobs (position_name, company_name, job_category, vacancy, job_responsibility, job_nature, job_requirments, educational_requirements, experience_requirement, last_date_of_apply, job_location, salary_rang) VALUES ('$position_name', '$company_name', '$job_category', '$vacancy', '$job_responsibility', '$job_nature', '$job_requirements', '$educational_requirements', '$experience_requirements', '$last_date_of_application', '$job_location', '$salary_range')";
      // echo $sql; 

      $insert = mysqli_query($connect, $sql);

      if ($insert) {
        echo '<script>alert("Congrats! Job posted successfully."); window.location.href="../employer/employer_home.php";</script>';
      } else {
        echo '<script>alert("Sorry! Submission unsuccessful. Error: ' . mysqli_error($connect) . '"); window.location.href="../views/post_job.php";</script>';
      }

      mysqli_close($connect);
    }
  }

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>

  <div class="container">
    <h1>Job Post Form</h1>
    <form method="post" action="">
      <div class="form-group">
        <label>Position Name</label>
        <input type="text" placeholder="Enter Position Name Here.." name="position_name" value="<?php echo htmlspecialchars($position_name); ?>" required>
      </div>

      <div class="form-group">
        <label>Company Name</label>
        <input type="text" placeholder="Enter Company Name Here.." name="company_name" value="<?php echo htmlspecialchars($company_name); ?>" required>
      </div>

      <div class="form-group">
        <label>Job Category<small> (select one)</small></label>
        <select name="job_category" required>
          <option value="">Select Category</option>
          <option value="Bank" <?php echo ($job_category == 'Bank') ? 'selected' : ''; ?>>Bank</option>
          <option value="IT" <?php echo ($job_category == 'IT') ? 'selected' : ''; ?>>IT</option>
          <option value="Engineering" <?php echo ($job_category == 'Engineering') ? 'selected' : ''; ?>>Engineering</option>
          <option value="Garments" <?php echo ($job_category == 'Garments') ? 'selected' : ''; ?>>Garments</option>
          <option value="Industry" <?php echo ($job_category == 'Industry') ? 'selected' : ''; ?>>Industry</option>
          <option value="Hospital" <?php echo ($job_category == 'Hospital') ? 'selected' : ''; ?>>Hospital</option>
          <option value="NGO" <?php echo ($job_category == 'NGO') ? 'selected' : ''; ?>>NGO</option>
          <option value="Education" <?php echo ($job_category == 'Education') ? 'selected' : ''; ?>>Education</option>
          <option value="Commercial" <?php echo ($job_category == 'Commercial') ? 'selected' : ''; ?>>Commercial</option>
          <option value="Accounting" <?php echo ($job_category == 'Accounting') ? 'selected' : ''; ?>>Accounting</option>
          <option value="Marketing" <?php echo ($job_category == 'Marketing') ? 'selected' : ''; ?>>Marketing</option>
          <option value="Others" <?php echo ($job_category == 'Others') ? 'selected' : ''; ?>>Others</option>
        </select>
      </div>

      <div class="form-group">
        <label>Number of Vacancy</label>
        <input type="text" placeholder="Enter Vacancy Here.." name="vacancy" value="<?php echo htmlspecialchars($vacancy); ?>" required>
      </div>

      <div class="form-group">
        <label>Job Responsibility</label>
        <textarea placeholder="Enter Job Responsibilities Here.." name="job_responsibility" required><?php echo htmlspecialchars($job_responsibility); ?></textarea>
      </div>

      <div class="form-group">
        <label>Job Nature</label>
        <input type="text" placeholder="Enter Job Nature Here.." name="job_nature" value="<?php echo htmlspecialchars($job_nature); ?>" required>
      </div>

      <div class="form-group">
        <label>Job Requirements</label>
        <textarea placeholder="Enter Job Requirements Here.." name="job_requirements" required><?php echo htmlspecialchars($job_requirements); ?></textarea>
      </div>

      <div class="form-group">
        <label>Educational Requirements</label>
        <input type="text" placeholder="Enter Educational Requirements Here.." name="educational_requirements" value="<?php echo htmlspecialchars($educational_requirements); ?>" required>
      </div>

      <div class="form-group">
        <label>Experience Requirements</label>
        <input type="text" placeholder="Enter Experience Requirements Here.." name="experience_requirements" value="<?php echo htmlspecialchars($experience_requirements); ?>" required>
      </div>

      <div class="form-group">
        <label>Last Date of Application</label>
        <input type="date" placeholder="Enter Last Date Here.." name="last_date_of_application" value="<?php echo htmlspecialchars($last_date_of_application); ?>" required>
      </div>

      <div class="form-group">
        <label>Job Location</label>
        <input type="text" placeholder="Enter Job Location Here.." name="job_location" value="<?php echo htmlspecialchars($job_location); ?>" required>
      </div>

      <div class="form-group">
        <label>Salary Range</label>
        <input type="text" placeholder="Enter Salary Range Here.." name="salary_range" value="<?php echo htmlspecialchars($salary_range); ?>" required>
      </div>

      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <div class="footer">
    <?php include('../shared/footer.php'); ?>
  </div>
</body>

</html>