<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header('Location: index.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Job Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/css/user.css">
</head>
<body>

<?php include('../shared/navbar.php'); ?>

<div class="content">
  <div class="container">
    <?php
    include('../helper/database.php');

    if (isset($_GET['job_id'])) {
      $job_id = intval($_GET['job_id']);
      $sql = "SELECT * FROM all_jobs WHERE all_jobs_id = $job_id";
      $select = mysqli_query($connect, $sql);

      if (mysqli_num_rows($select) > 0) {
        while ($row = mysqli_fetch_assoc($select)) {
    ?>  
      <div class="jumbotron">
        <h3><?php echo htmlspecialchars($row["position_name"]); ?></h3>
        <h3><?php echo htmlspecialchars($row["company_name"]); ?></h3>
        <h4>Vacancy</h4>
        <h5><?php echo htmlspecialchars($row["vacancy"]); ?></h5>
        <h4>Job Responsibility</h4>
        <h5><?php echo htmlspecialchars_decode(stripslashes($row["job_responsibility"])); ?></h5>
        <h4>Job Nature</h4>
        <h5><?php echo htmlspecialchars($row["job_nature"]); ?></h5>
        <h4>Educational Requirements</h4>
        <h5><?php echo htmlspecialchars($row["educational_requirements"]); ?></h5>
        <h4>Experience Requirements</h4>
        <h5><?php echo htmlspecialchars($row["experience_requirement"]); ?></h5>
        <h4>Job Requirements</h4>
        <h5><?php echo htmlspecialchars_decode(stripslashes($row["job_requirments"])); ?></h5>
        <h4>Job Location</h4>
        <h5><?php echo htmlspecialchars($row["job_location"]); ?></h5>
        <h4>Salary Range</h4>
        <h5><?php echo htmlspecialchars($row["salary_rang"]); ?></h5>
        <h4>Application Deadline</h4>
        <h5><?php echo htmlspecialchars($row["last_date_of_apply"]); ?></h5>
      </div>

      <a href="apply_form.php?app_name=<?php echo urlencode($_SESSION['username']); ?>&job_id=<?php echo $row['all_jobs_id']; ?>" 
             class="btn btn-success" onclick="return handleApply()">Apply Now</a>
    <?php
        }
      } else {
        echo "<p>No job details found.</p>";
      }
    } else {
      echo "<p>No job ID specified.</p>";
    }

    $connect->close();
    ?>
  </div>
</div>
<script type="text/javascript">
  function handleApply() {
    alert('Application submitted successfully');
    window.location.href = 'user_home.php';
    return false; 
  }
</script>

<?php include('../shared/footer.php'); ?>

</body>
</html>
