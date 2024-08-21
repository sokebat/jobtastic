<!DOCTYPE html>
<html lang="en">

<head>
    <title>Navbar</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f4f4f9;
        }

        .navbar {
            background-color: #000;
            overflow: hidden;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 40px;
            width: 98%;
        }

        .navbar-header {
            display: flex;
            align-items: center;
        }

        .navbar-header img {
            margin-right: 10px;
        }

        .navbar-header a,
        .navbar a {
            color: #f4f4f9;
            padding: 8px 15px;
            text-decoration: none;
            display: inline-block;
            font-weight: bold;
            line-height: 40px;
        }

        .navbar-header a {
            font-size: 20px;
        }

        .navbar a:hover {
            background-color: #575757;
            border-radius: 4px;
        }

        .navbar .active {
            background-color: #444;
            border-radius: 4px;
        }

        .navbar-right {
            display: flex;
            align-items: center;
        }

        .navbar-right li {
            margin-left: 15px;
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="navbar-header">
            <a href="../index.php">JOBTASTIC.COM</a>
        </div>

        <div class="navbar-right">
            <?php
            session_start();
            if (isset($_SESSION['username']) || isset($_SESSION['employer'])) {
                echo '<a href="./helper/logout.php">Logout</a>';
            } else {
            }
            ?>
        </div>
    </nav>

</body>

</html>