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
  <title>Job Listings</title>
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

    if (isset($_GET['category'])) {
      $category = mysqli_real_escape_string($connect, $_GET['category']);
      $sql = "SELECT * FROM all_jobs WHERE job_category='$category'";
      $select = mysqli_query($connect, $sql);

      if (mysqli_num_rows($select) > 0) {
        while ($row = mysqli_fetch_assoc($select)) {
    ?>  
     <div class="jobs_link">
       <a href="../views/view_details.php?job_id=<?php echo $row['all_jobs_id'] ?>"> 
         <div class="jumbotron">
           <h3><?php echo htmlspecialchars($row["company_name"]); ?></h3>
           <h3><?php echo htmlspecialchars($row["position_name"]); ?></h3>
           <table>
             <tr>
               <td class="label">Education</td>
               <td class="value"><?php echo htmlspecialchars($row["educational_requirements"]); ?></td>
             </tr>
             <tr>
               <td class="label">Experience</td>
               <td class="value"><?php echo htmlspecialchars($row["experience_requirement"]); ?></td>
             </tr>
           </table>
         </div>
       </a>
       
     </div>
    <?php
        }
      } else {
        echo "<p>No jobs found for the selected category.</p>";
      }
    } else {
      echo "<p>No category selected.</p>";
    }

    $connect->close();
    ?>
  </div>
</div>

<?php include('../shared/footer.php'); ?>

</body>
</html>
