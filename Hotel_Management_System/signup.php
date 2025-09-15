<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up - Hotel Management System</title>
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="bookroom.css">
</head>
<body>
    <header>
        <h1>Grand Palace Hotel</h1>
        <p>“Step into Comfort, Stay with Elegance"</p>
    </header>
    <nav>
        <a href="homepage.php">Home</a>
        <a href="booking.php">Book a Room</a>
        <a href="rooms.php">Rooms</a>
        <a href="customers.php">Customers</a>
        <a href="staff.php">Staff</a>
        <a href="signin.php">Sign In</a>
        <a href="signout.php">Sign Out</a>
    </nav>
    <div class="container">
        <h2 style="color:#3498db;">Sign Up</h2>
        <form class="bookroom-form" method="post" action="signup.php">
            <label for="fullname">Full Name</label>
            <input type="text" id="fullname" name="fullname" required>

            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required>

             <label for="phone">Phone Number</label>
            <input type="text" id="phone" name="phone" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

           

            <button type="submit">Sign Up</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $fullname = htmlspecialchars($_POST["fullname"]);
            $email = htmlspecialchars($_POST["email"]);
            $username = htmlspecialchars($_POST["username"]);
            $phone = htmlspecialchars($_POST["phone"]);
            // Password handling should be secure in production
            echo "<div class='confirmation'><h3>Sign Up Successful!</h3><p>Welcome, <strong>$fullname</strong>! Your account has been created.</p></div>";
        }
        ?>
    </div>
</body>
</html>
