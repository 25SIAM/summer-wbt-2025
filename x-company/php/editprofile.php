<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            border: 1px solid black;
            width: 800px;
            margin: auto;
        }
        .header, .footer {
            border-bottom: 1px solid black;
            padding: 10px;
        }
        .footer {
            border-top: 1px solid black;
            border-bottom: none;
            text-align: center;
            font-size: 12px;
            padding: 5px;
        }
        .nav {
            float: right;
        }
        .sidebar {
            width: 200px;
            border-right: 1px solid black;
            padding: 10px;
        }
        .content {
            padding: 20px;
            flex-grow: 1;
        }
        .main {
            display: flex;
        }
        table {
            border-collapse: collapse;
        }
        td {
            padding: 5px;
        }
        a {
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .profile-box {
            border: 1px solid black;
            padding: 10px;
        }
        .error {
            color: red;
            font-size: 12px;
            margin-left: 10px;
        }
        input[type="text"], input[type="email"], input[type="date"] {
            height: 15px; 
            width: 205px;
        }
    </style>
</head>
<body>
<?php
$name = $email = $gender = $dob = "";
$nameErr = $emailErr = $dobErr = "";
$successMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid = true;

    // Name validation
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $valid = false;
    } elseif (!preg_match("/^[a-zA-Z][a-zA-Z ]*$/", $_POST["name"])) {
        $nameErr = "Name must start with a letter and contain only letters & spaces";
        $valid = false;
    } else {
        $name = $_POST["name"];
    }

    // Email validation
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $valid = false;
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        $valid = false;
    } else {
        $email = $_POST["email"];
    }

    // Gender
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = $_POST["gender"];
    }
    // DOB validation
     if (empty($_POST["dob"])) {
        $dobErr = "Date of Birth is required";
    } else {
        $dob = $_POST["dob"];
        $dobDate = strtotime($dob);
        $age = (int)date("Y") - (int)date("Y", $dobDate);
        if ($dobDate === false) {
            $dobErr = "Invalid date format";
        } elseif ($age < 5) {
            $dobErr = "Must be at least 5 years old";
        }
    }
    if ($valid) {
        $successMsg = "Profile updated successfully!";
        $name = $email = $gender = $dob = "";
    }
}
?>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div style="display: flex; align-items: center; justify-content: space-between;">
                <div style="display: flex; align-items: center;">
                    <img src="../image/xlogo.png" alt="Company" height="40">
                    <span style="font-size: 20px; font-weight: bold; margin-left: 10px;">Company</span>
                </div>
                <div class="nav">
                    Logged in as <a href="viewprofile.php">Bob</a> | <a href="logout.php">Logout</a>
                </div>
            </div>
        </div>

        <!-- Sidebar + Content -->
        <div class="main">
            <!-- Sidebar -->
            <div class="sidebar">
                <b>Account</b><br><hr>
                <a href="dashboard.php">Dashboard</a><br>
                <a href="viewprofile.php">View Profile</a><br>
                <a href="editprofile.php">Edit Profile</a><br>
                <a href="changeprofilepic.php">Change Profile Picture</a><br>
                <a href="changepassword.php">Change Password</a><br>
                <a href="logout.php">Logout</a><br>
            </div>

            <!-- Content -->
            <div class="content">
                <fieldset class="profile-box">
                    <legend><b>EDIT PROFILE</b></legend>
                    <?php if ($successMsg): ?>
                        <p style="color:green; font-weight:bold;"><?= $successMsg ?></p>
                    <?php endif; ?>
                    <form method="post" action="">
                        <table>
                            <tr>
                                <td>Name</td>
                                <td>: 
                                    <input type="text" name="name" value="<?= htmlspecialchars($name) ?>">
                                    <span class="error"><?= $nameErr ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>: 
                                    <input type="email" name="email" value="<?= htmlspecialchars($email) ?>">
                                    <span class="error"><?= $emailErr ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td>:
                                    <input type="radio" name="gender" value="Male" <?= ($gender=="Male")?"checked":"" ?>> Male
                                    <input type="radio" name="gender" value="Female" <?= ($gender=="Female")?"checked":"" ?>> Female
                                    <input type="radio" name="gender" value="Other" <?= ($gender=="Other")?"checked":"" ?>> Other
                                </td>
                            </tr>
                            <tr>
                                <td>Date of Birth</td>
                                <td>: 
                                    <input type="date" name="dob" value="<?= htmlspecialchars($dob) ?>">
                                    <span class="error"><?= $dobErr ?></span>
                                </td>
                            </tr>
                        </table>
                        <br>
                        <input type="submit" value="Save">
                        <input type="reset" value="Reset">
                    </form>
                </fieldset>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            Copyright &copy; 2017
        </div>
    </div>
</body>
</html>
