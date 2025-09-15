<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In - Hotel Management System</title>
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="bookroom.css">
    <style>
        .nav-main { display: flex; justify-content: space-between; align-items: center; }
        .nav-links a { margin-right: 18px; }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropbtn {
            background: none;
            border: none;
            font-size: 28px;
            cursor: pointer;
            color: #f3eeeeff;
            padding: 0 12px;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background: #fff;
            min-width: 160px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.12);
            z-index: 1;
            border-radius: 6px;
        }
        .dropdown-content a {
            color: #2d3e50;
            padding: 12px 18px;
            text-decoration: none;
            display: block;
        }
        .dropdown-content a:hover {
            background: #eafaf1;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>
<body>
    <header>
        <h1>Grand Palace Hotel</h1>
        <p>“Step into Comfort, Stay with Elegance"</p>
    </header>
    <nav class="nav-main">
        <div class="nav-links">
            <a href="homepage.php">Home</a>
            <a href="bookroom.php">Book a Room</a>
            <a href="signin.php">Sign In</a>
        </div>
        <div class="dropdown">
            <button class="dropbtn">&#8942;</button>
            <div class="dropdown-content">
                <a href="rooms.php">Rooms</a>
                <a href="customers.php">Customers</a>
                <a href="staff.php">Staff</a>
                <a href="signout.php">Sign Out</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <h2 style="color:#1abc9c;">Sign In</h2>
        <form class="bookroom-form" method="post" action="signin.php">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Submit</button>
        </form>
        <div style="text-align:right; margin-top:10px;">
            <a href="signup.php">
                <button type="button" style="background:#3498db;color:#fff;border:none;padding:8px 18px;border-radius:4px;cursor:pointer;">
                    Sign Ups
                </button>
            </a>
        </div>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Simple placeholder logic for demonstration
            $username = htmlspecialchars($_POST["username"]);
            $password = htmlspecialchars($_POST["password"]);
            if ($username === "admin" && $password === "admin") {
                echo "<div class='confirmation'><h3>Log In Successful!</h3><p>Welcome, <strong>$username</strong>.</p></div>";
            } else {
                echo "<div class='confirmation' style='background:#fdecea;color:#c0392b;'><h3>Log In Failed</h3><p>Invalid username or password.</p></div>";
            }
        }
        ?>
    </div>
</body>
</html>
