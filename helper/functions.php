

<?php
require_once("database.php");
session_start();

// User login acceptance:
if (isset($_POST["login"])) {
    $uname = $_POST["username"];
    $password = $_POST["password"];

    if (!empty($uname) && !empty($password)) {
        $query = "SELECT * FROM user_table WHERE username = ? AND password = ?";
        $stmt = $connect->prepare($query);
        $stmt->bind_param("ss", $uname, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = 'user';  
            echo "<script>location='../user/user_home.php'</script>";
        } else {
            echo "<script>alert('Incorrect Username or Password. Please Retry...')</script>";
            echo "<script>location='../user/user_login.php'</script>";
        }
    } else {
        echo "<script>alert('Username or Password cannot be empty!')</script>";
        echo "<script>location='../user/user_login.php'</script>";
    }
}

// Employer login acceptance:
if (isset($_POST["signin"])) {
    $uname = $_POST["username"];
    $password = $_POST["password"];

    if (!empty($uname) && !empty($password)) {
        $query = "SELECT * FROM employer_table WHERE username = ? AND password = ?";
        $stmt = $connect->prepare($query);
        $stmt->bind_param("ss", $uname, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = 'employer';  
            echo "<script>location='../employer/employer_home.php'</script>";
        } else {
            echo "<script>alert('Incorrect Username or Password. Please Retry...')</script>";
            echo "<script>location='../employer/employer_login.php'</script>";
        }
    } else {
        echo "<script>alert('Username or Password cannot be empty!')</script>";
        echo "<script>location='../employer/employer_login.php'</script>";
    }
}

// Logout
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    echo "<script>location='../index.php'</script>";
    exit();
}



// delete job post from all jobs

    if (isset($_GET['j_id'])) {
      $id=$_GET['j_id'];
      $q="DELETE FROM all_jobs WHERE all_jobs_id='$id'";
      $r=mysqli_query($connect,$q);
      if(!$r){
        echo "<script>alert('Not Deleted')</script>";
        echo "<script>location='admin_home.php'</script>";
      }else{
        echo "<script>location='admin_home.php'</script>";
      }
    }




 // delete job post from all jobs by employee

    if (isset($_GET['job_delete_id'])) {
      $id=$_GET['job_delete_id'];
      $q="DELETE FROM all_jobs WHERE all_jobs_id='$id'";
      $r=mysqli_query($connect,$q);
      if(!$r){
        echo "<script>alert('Not Deleted')</script>";
        echo "<script>location='../employer/employer_home.php'</script>";
      }else{
        echo "<script>location='../employer/employer_home.php'</script>";
      }
    }

?>
