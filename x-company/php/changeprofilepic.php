<!DOCTYPE html>
<html>
<head>
    <title>Change Profile Picture</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { border: 1px solid black; width: 800px; margin: auto; }
        .header, .footer { border-bottom: 1px solid black; padding: 1px; }
        .footer { border-top: 1px solid black; border-bottom: none; text-align: center; font-size: 12px; padding: 5px; }
        .nav { float: right; }
        .content { padding: 20px; display: flex; }
        .sidebar { width: 200px; border-right: 1px solid black; padding-right: 10px; }
        .main { padding-left: 20px; }
        img { height: 100px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="../image/xlogo.png" alt="Company" height="40">
            <span style="font-size: 20px; font-weight: bold; margin-left: 10px;">Company</span>
            <div class="nav">
                Logged in as Siam <a href="viewprofile.php"></a> | <a href="logout.php">Logout</a>
            </div>
        </div>
 
        <div class="content">
            <div class="sidebar">
                <b>Account</b><br><hr>
                <a href="dashboard.php">Dashboard</a><br>
                <a href="viewprofile.php">View Profile</a><br>
                <a href="editprofile.php">Edit Profile</a><br>
                <a href="changeprofilepic.php">Change Profile Picture</a><br>
                <a href="changepassword.php">Change Password</a><br>
                <a href="logout.php">Logout</a>
            </div>
            <div class="main">
                <fieldset>
                    <legend><b>PROFILE PICTURE</b></legend>
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                        <img src="../image/image.jpg" alt="Profile Picture"><br><br>
                        Select image to upload: <br><br>
                        <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
                        <input type="submit" value="Upload Image" name="submit">
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
 
 