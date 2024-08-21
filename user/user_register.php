<!DOCTYPE html>
<html lang="en">

<head>
  <title>User Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets//css/register.css">

</head>

<body>
  <!-- <?php include('../shared/navbar.php'); ?> -->

  <?php
  $name = $username = $password = $confirmpassword = $jobcategory = $phonenumber = $email = "";

  if (isset($_POST["submit"])) {
    $name = test_input($_POST["name"]);
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);
    $confirmpassword = test_input($_POST["confirmpassword"]);

    if ($password !== $confirmpassword) {
      echo "<script>alert('Passwords do not match!'); window.location.href='user_register.php';</script>";
      exit();
    }

    $jobcategory = test_input($_POST["jobcategory"]);
    $phonenumber = test_input($_POST["phonenumber"]);
    $email = test_input($_POST["email"]);

    include('../helper/database.php');  

    if ($connect) {
      $checkName = $username;
      $check = "SELECT * FROM user_table WHERE username='$checkName'";

      $find = mysqli_query($connect, $check);

      if (mysqli_num_rows($find) > 0) {
        echo '<script>alert("Sorry! This username already exists. Use another one."); window.location.href="user_register.php";</script>';
        exit();
      }

      $sql = "INSERT INTO user_table (name, username, password, confirm_password, job_category, phone_number, email, role) 
                    VALUES ('$name', '$username', '$password', '$confirmpassword', '$jobcategory', '$phonenumber', '$email', 'user')";

      $insert = mysqli_query($connect, $sql);

      if ($insert) {
        echo '<script>alert("Congratulations! Successfully Registered."); window.location.href="../index.php";</script>';
      } else {
        echo '<script>alert("Sorry! Registration Unsuccessful."); window.location.href="user_register.php";</script>';
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
    <h1>User Registration Form</h1>
    <form action="#" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="name">Name</label><span class="error"></span>
        <input type="text" id="name" placeholder="Enter Name Here.." name="name" required>
      </div>

      <div class="form-group">
        <label for="username">Username</label><span class="error"></span>
        <input type="text" id="username" placeholder="Enter Username Here.." name="username" required>
      </div>

      <div class="form-group">
        <label for="password">Password</label><span class="error"></span>
        <input type="password" id="password" placeholder="Enter Password Here.." name="password" required>
      </div>

      <div class="form-group">
        <label for="confirmpassword">Confirm Password</label><span class="error"></span>
        <input type="password" id="confirmpassword" placeholder="Enter Confirm Password Here.." name="confirmpassword" required>
      </div>

      <div class="form-group">
        <label for="jobcategory">Job Category <small>(select one)</small></label><span class="error"></span>
        <select id="jobcategory" name="jobcategory" required>
          <option value="">Select a category</option>
          <option value="Bank">Bank</option>
          <option value="IT">IT</option>
          <option value="Engineering">Engineering</option>
          <option value="Garments">Garments</option>
          <option value="Industry">Industry</option>
          <option value="NGO">NGO</option>
          <option value="Education">Education</option>
          <option value="Commercial">Commercial</option>
          <option value="Accounting">Accounting</option>
          <option value="Support">Support</option>
          <option value="Marketing">Marketing</option>
          <option value="Others">Others</option>
        </select>
      </div>

      <div class="form-group">
        <label for="phonenumber">Phone Number</label><span class="error"></span>
        <input type="text" id="phonenumber" placeholder="Enter Phone Number Here.." name="phonenumber" required>
      </div>

      <div class="form-group">
        <label for="email">Email Address</label><span class="error"></span>
        <input type="email" id="email" placeholder="Enter Email Address Here.." name="email" required>
      </div>

      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      <button type="reset" class="btn btn-danger" name="reset">Reset</button>
    </form>
  </div>

  <div class="footer">
    <?php include('../shared/footer.php'); ?>
  </div>
</body>

</html>