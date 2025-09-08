<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { border: 1px solid black; width: 800px; margin: auto; }
        .header, .footer { border-bottom: 1px solid black; padding: 10px; }
        .footer { border-top: 1px solid black; border-bottom: none; text-align: center; font-size: 12px; padding: 5px; }
        .nav { float: right; }
        .sidebar { width: 200px; border-right: 1px solid black; padding: 10px; }
        .content { padding: 20px; flex-grow: 1; }
        .main { display: flex; }
        table { border-collapse: collapse; }
        td { padding: 5px; }
        a { text-decoration: none; }
        a:hover { text-decoration: underline; }
        .profile-box { border: 1px solid black; padding: 10px; }
        .error { color: red; font-size: 12px; margin-left: 10px; }
    </style>
</head>
<body>
<?php
$current_password = $new_password = $confirm_password = "";
$currentErr = $newErr = $confirmErr = "";
$successMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid = true;

    // Current password validation
    if (empty($_POST["current_password"])) {
        $currentErr = "Current password is required";
        $valid = false;
    } else {
        $current_password = $_POST["current_password"];
    }

    // New password validation
    if (empty($_POST["new_password"])) {
        $newErr = "New password is required";
        $valid = false;
    } else {
        $new_password = $_POST["new_password"];
        if (strlen($new_password) < 6) {
            $newErr = "New password must be at least 6 char";
            $valid = false;
        } elseif ($new_password === $current_password) {
            $newErr = "New password cannot be same as current password";
            $valid = false;
        }
    }

    // Confirm password validation
    if (empty($_POST["confirm_password"])) {
        $confirmErr = "Please retype new password";
        $valid = false;
    } else {
        $confirm_password = $_POST["confirm_password"];
        if ($confirm_password !== $new_password) {
            $confirmErr = "Passwords do not match";
            $valid = false;
        }
    }

    if ($valid) {
        $successMsg = "Password changed successfully!";
        $current_password = $new_password = $confirm_password = "";
    }
}
?>
    <div class="container">
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

        <div class="main">
            <div class="sidebar">
                <b>Account</b><br><hr>
                <a href="dashboard.php">Dashboard</a><br>
                <a href="viewprofile.php">View Profile</a><br>
                <a href="editprofile.php">Edit Profile</a><br>
                <a href="changeprofilepic.php">Change Profile Picture</a><br>
                <a href="changepassword.php">Change Password</a><br>
                <a href="logout.php">Logout</a><br>
            </div>

            <div class="content">
                <fieldset class="profile-box">
                    <legend><b>CHANGE PASSWORD</b></legend>
                    <?php if($successMsg): ?>
                        <p style="color:green; font-weight:bold;"><?= $successMsg ?></p>
                    <?php endif; ?>
                    <form method="post" action="">
                        <table>
                            <tr>
                                <td>Current Password</td>
                                <td>: 
                                    <input type="password" name="current_password" value="<?= htmlspecialchars($current_password) ?>">
                                    <span class="error"><?= $currentErr ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>New Password</td>
                                <td>: 
                                    <input type="password" name="new_password" value="<?= htmlspecialchars($new_password) ?>">
                                    <span class="error"><?= $newErr ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Retype New Password</td>
                                <td>: 
                                    <input type="password" name="confirm_password" value="<?= htmlspecialchars($confirm_password) ?>">
                                    <span class="error"><?= $confirmErr ?></span>
                                </td>
                            </tr>
                        </table>
                        <br>
                        <input type="submit" value="Submit">
                        <input type="reset" value="Reset">
                    </form>
                </fieldset>
            </div>
        </div>

        <div class="footer">
            Copyright &copy; 2017
        </div>
    </div>
</body>
</html>
