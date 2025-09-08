<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
        a {
            text-decoration: none;
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
$username = $password = "";
$usernameErr = $passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Username Validation
    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
    } else {
        $username = $_POST["username"];
        if (strlen($username) < 4) {
            $usernameErr = "Must be at least 4 characters";
        } elseif (!preg_match("/^[a-zA-Z][a-zA-Z0-9_]*$/", $username)) {
            $usernameErr = "Cannot start with special char";
        }
    }

    // Password Validation
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = $_POST["password"];
        if (strlen($password) < 6) {
            $passwordErr = "Must be at least 6 characters";
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
                <legend><b>LOGIN</b></legend>
                <form method="post" action="">
                    <table>
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
                            <td></td>
                            <td>
                                <input type="checkbox" name="remember" <?php if(isset($_POST["remember"])) echo "checked"; ?>> Remember Me
                            </td>
                        </tr>
                    </table>
                    <br>
                    <input type="submit" value="Login">
                    &nbsp;&nbsp;
                    <a href="forgotpassword.php">Forgot Password?</a>
                </form>
            </fieldset>
        </div>

        <div class="footer">
            Copyright &copy; 2017
        </div>
    </div>
</body>

</html>
