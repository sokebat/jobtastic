<!DOCTYPE html>
<html lang="en">
<head>
  <title>Employer Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/css/register.css">
</head>
<body>
<?php include('../shared/navbar.php'); ?>

<?php
    $name = $username = $password = $confirmpassword = $companyname = $companycategory = $address = $city = $zip = $phonenumber = $email = $website = "";
    $nameErr = $usernameErr = $passwordErr = $confirmpasswordErr = $companynameErr = $companycategoryErr = $addressErr = $cityErr = $zipErr = $phonenumberErr = $emailErr = $websiteErr = "";

    if (isset($_POST["submit"])) {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
        }

        if (empty($_POST["username"])) {
            $usernameErr = "Username is required";
        } else {
            $username = test_input($_POST["username"]);
        }

        if (empty($_POST["password"])) {
            $passwordErr = "Password is required";
        } else {
            $password = test_input($_POST["password"]);
        }

        if (empty($_POST["confirmpassword"])) {
            $confirmpasswordErr = "Confirm password is required";
        } else {
            $confirmpassword = test_input($_POST["confirmpassword"]);
        }

        if (empty($_POST["companyname"])) {
            $companynameErr = "Company name is required";
        } else {
            $companyname = test_input($_POST["companyname"]);
        }

        if (empty($_POST["companycategory"])) {
            $companycategoryErr = "Company category is required";
        } else {
            $companycategory = test_input($_POST["companycategory"]);
        }

        if (empty($_POST["address"])) {
            $addressErr = "Address is required";
        } else {
            $address = test_input($_POST["address"]);
        }

        if (empty($_POST["city"])) {
            $cityErr = "City is required";
        } else {
            $city = test_input($_POST["city"]);
        }

        if (empty($_POST["zip"])) {
            $zipErr = "Zip is required";
        } else {
            $zip = test_input($_POST["zip"]);
        }

        if (empty($_POST["phonenumber"])) {
            $phonenumberErr = "Phone number is required";
        } else {
            $phonenumber = test_input($_POST["phonenumber"]);
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
        }

        if (empty($_POST["website"])) {
            $websiteErr = "Website is required";
        } else {
            $website = test_input($_POST["website"]);
        }

        if ($password !== $confirmpassword) {
            echo "<script>alert('Passwords do not match!'); window.location.href='employer_register.php';</script>";
            exit();
        }

        include('../helper/database.php'); 

        if ($connect) {
            $checkName = $username;
            $check = "SELECT * FROM employer_table WHERE username='$checkName'";
            $find = mysqli_query($connect, $check);

            if (mysqli_num_rows($find) > 0) {
                echo '<script>alert("Sorry! This username already exists. Use another one."); window.location.href="employer_register.php";</script>';
                exit();
            }

            $sql = "INSERT INTO employer_table (name, username, password, confirm_password, company_name, company_category, address, city, zip, phone_number, email, website,role) 
                    VALUES ('$name', '$username', '$password', '$confirmpassword', '$companyname', '$companycategory', '$address', '$city', '$zip', '$phonenumber', '$email', '$website','employer')";

            $insert = mysqli_query($connect, $sql);

            if ($insert) {
                echo '<script>alert("Congratulations! Successfully Registered."); window.location.href="../index.php";</script>';
            } else {
                echo '<script>alert("Sorry! Registration Unsuccessful."); window.location.href="../employer/employer_register.php";</script>';
            }

            mysqli_close($connect);
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<div class="container">
  <h1>Employer Registration Form</h1>
  <form action="#" method="post">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" id="name" placeholder="Enter Name Here.." name="name" required>
    </div>

    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" id="username" placeholder="Enter Username Here.." name="username" required>
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" placeholder="Enter Password Here.." name="password" required>
    </div>

    <div class="form-group">
      <label for="confirmpassword">Confirm Password</label>
      <input type="password" id="confirmpassword" placeholder="Re-enter Password Here.." name="confirmpassword" required>
    </div>

    <div class="form-group">
      <label for="companyname">Company Name</label>
      <input type="text" id="companyname" placeholder="Enter Company Name Here.." name="companyname" required>
    </div>

    <div class="form-group">
      <label for="companycategory">Company Category</label>
      <select id="companycategory" name="companycategory" required>
        <option value="" disabled selected>Select Company Category</option>
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
      <label for="address">Address</label>
      <input type="text" id="address" placeholder="Enter Address Here.." name="address" required>
    </div>

    <div class="form-group">
      <label for="city">City</label>
      <input type="text" id="city" placeholder="Enter City Here.." name="city" required>
    </div>

    <div class="form-group">
      <label for="zip">Zip</label>
      <input type="text" id="zip" placeholder="Enter Zip Here.." name="zip" required>
    </div>

    <div class="form-group">
      <label for="phonenumber">Phone Number</label>
      <input type="text" id="phonenumber" placeholder="Enter Phone Number Here.." name="phonenumber" required>
    </div>

    <div class="form-group">
      <label for="email">Email Address</label>
      <input type="email" id="email" placeholder="Enter Email Here.." name="email" required>
    </div>

    <div class="form-group">
      <label for="website">Website</label>
      <input type="text" id="website" placeholder="Enter Website Here.." name="website" required>
    </div>

    <div class="form-group">
      <button type="submit" name="submit" class="btn btn-primary">Register</button>
      <button type="reset" class="btn btn-danger">Reset</button>
    </div>
  </form>
</div>

<?php include('../shared/footer.php'); ?>

</body>
</html>
