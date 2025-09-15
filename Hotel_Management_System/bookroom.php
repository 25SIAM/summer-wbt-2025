<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book a Room - Hotel Management System</title>
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
        <h2 style="color:#1abc9c;">Book a Room</h2>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars($_POST["name"]);
            $email = htmlspecialchars($_POST["email"]);
            $nid = htmlspecialchars($_POST["nid"]);
            $phone = htmlspecialchars($_POST["phone"]);
            $checkin = htmlspecialchars($_POST["checkin"]);
            $checkout = htmlspecialchars($_POST["checkout"]);
            $roomtype = htmlspecialchars($_POST["roomtype"]);
            echo '<div class="confirmation">';
            echo "<h3>Booking Confirmed!</h3>";
            echo "<p>Thank you, <strong>$name</strong>, for booking a <strong>$roomtype</strong> room.</p>";
            echo "<p>NID: <strong>$nid</strong><br>Phone: <strong>$phone</strong></p>";
            echo "<p>Check-in: <strong>$checkin</strong><br>Check-out: <strong>$checkout</strong></p>";
            echo "<p>A confirmation has been sent to <strong>$email</strong>.</p>";
            echo "</div>";
        } else {
        ?>
        <form class="bookroom-form" method="post" action="bookroom.php">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required>

            <label for="nid">NID</label>
            <input type="text" id="nid" name="nid" required>

            <label for="phone">Phone Number</label>
            <input type="text" id="phone" name="phone" required>

            <label for="checkin">Check-in Date</label>
            <input type="date" id="checkin" name="checkin" required>

            <label for="checkout">Check-out Date</label>
            <input type="date" id="checkout" name="checkout" required>

            <label for="roomtype">Room Type</label>
            <select id="roomtype" name="roomtype" required>
                <option value="">Select a room type</option>
                <option value="Single">Single</option>
                <option value="Double">Double</option>
                <option value="Suite">Suite</option>
            </select>

            <button type="submit">Book Now</button>
        </form>
        <?php } ?>
    </div>
</body>
</html>
