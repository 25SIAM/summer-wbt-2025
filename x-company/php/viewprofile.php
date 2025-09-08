<!DOCTYPE html>
<html>
<head>
    <title>View Profile</title>
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
        .profile-pic {
            width: 100px;
            height: 100px;
            border: 1px solid #000;
            display: block;
        }
    </style>
</head>
<body>
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
                    <legend><b>PROFILE</b></legend>
                    <table>
                        <tr>
                            <td>Name</td>
                            <td>: Bob</td>
                            <td rowspan="4" style="padding-left: 50px;">
                                <img src="../image/image.jpg" alt="Profile Picture" class="profile-pic"><br>
                                <a href="changeprofilepic.php">Change</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>: bob@aiub.edu</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>: Male</td>
                        </tr>
                        <tr>
                            <td>Date of Birth</td>
                            <td>: 19/09/1998</td>
                        </tr>
                    </table>
                    <br>
                    <a href="editprofile.php">Edit Profile</a>
                </fieldset>
            </div>
        </div>

       
        <div class="footer">
            Copyright &copy; 2017
        </div>
    </div>
</body>
</html>
