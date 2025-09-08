<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
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
        .content {
            padding: 20px;
        }
        table {
            border-collapse: collapse;
        }
        td {
            padding: 5px;
        }
        .error {
            color: red;
            font-size: 12px;
            margin-left: 10px;
        }
    </style>
</head>
<body>
<?php
$name = $email = $username = $password = $confirmpassword = $gender = $dob = "";
$nameErr = $emailErr = $usernameErr = $passwordErr = $confirmpasswordErr = $genderErr = $dobErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Name validation
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = trim($_POST["name"]);
        if (strlen($name) < 2) {
            $nameErr = "Must be at least 2 characters";
        } elseif (!preg_match("/^[A-Za-z][A-Za-z\s.'-]*$/", $name)) {
            $nameErr = "Name must start with a letter";
        }
    }

    // Email validation
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = trim($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        } elseif (!preg_match("/^[A-Za-z]/", $email)) {
            $emailErr = "Email must start with a letter";
        }
    }

    // Username validation
    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
    } else {
        $username = trim($_POST["username"]);
        if (strlen($username) < 4) {
            $usernameErr = "Must be at least 4 characters";
        } elseif (!preg_match("/^[A-Za-z][A-Za-z0-9_]*$/", $username)) {
            $usernameErr = "Username must start with a letter & Can't accept special char";
        }
    }

    // Password validation
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = $_POST["password"];
        if (strlen($password) < 6) {
            $passwordErr = "Must be at least 6 characters";
        }
    }

    // Confirm password validation
    if (empty($_POST["confirmpassword"])) {
        $confirmpasswordErr = "Confirm your password";
    } else {
        $confirmpassword = $_POST["confirmpassword"];
        if ($password !== $confirmpassword) {
            $confirmpasswordErr = "Passwords do not match";
        }
    }

    // Gender validation
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = $_POST["gender"];
    }

    // Date of birth validation
    if (empty($_POST["dob"])) {
        $dobErr = "Date of Birth is required";
    } else {
        $dob = $_POST["dob"];
        $dobDate = strtotime($dob);

        if ($dobDate === false) {
            $dobErr = "Invalid date format";
        } else {
            $today = new DateTime();
            $birthdate = new DateTime($dob);
            $age = $today->diff($birthdate)->y;

            if ($age < 5) {
                $dobErr = "Must be at least 5 years old";
            }
        }
    }
}

?>

    <div class="container">
        <div class="header">
            <img src="../image/xlogo.png" alt="Company" height="40">
            <span style="font-size: 20px; font-weight: bold; margin-left: 10px;">Company</span>
            <div class="nav">
                <a href="home.php">Home</a> |
                <a href="login.php">Login</a> |
                <a href="registration.php">Registration</a>
            </div>
        </div>

        <div class="content">
            <fieldset>
                <legend><b>REGISTRATION</b></legend>
                <form method="post" action="">
                    <table>
                        <tr>
                            <td>Name</td>
                            <td>: <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>">
                                <span class="error"><?php echo $nameErr; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>: <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
                                <span class="error"><?php echo $emailErr; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>User Name</td>
                            <td>: <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>">
                                <span class="error"><?php echo $usernameErr; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>: <input type="password" name="password" value="<?php echo htmlspecialchars($password); ?>">
                                <span class="error"><?php echo $passwordErr; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Confirm Password</td>
                            <td>: <input type="password" name="confirmpassword" value="<?php echo htmlspecialchars($confirmpassword); ?>">
                                <span class="error"><?php echo $confirmpasswordErr; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>:
                                <input type="radio" name="gender" value="Male" <?php if($gender=="Male") echo "checked"; ?>> Male
                                <input type="radio" name="gender" value="Female" <?php if($gender=="Female") echo "checked"; ?>> Female
                                <input type="radio" name="gender" value="Other" <?php if($gender=="Other") echo "checked"; ?>> Other
                                <span class="error"><?php echo $genderErr; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Date of Birth</td>
                            <td>: <input type="date" name="dob" value="<?php echo htmlspecialchars($dob); ?>">
                                <span class="error"><?php echo $dobErr; ?></span>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <input type="submit" value="Submit">
                    <input type="reset" value="Reset">
                </form>
            </fieldset>
        </div>
 
        <div class="footer">
            Copyright &copy; 2017
        </div>
    </div>
</body>
</html>
