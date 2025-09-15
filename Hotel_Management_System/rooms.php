<?php
// ---- Room Data (Ideally, this should come from a database) ---- //
$rooms = [
    [
        'id' => 1,
        'name' => 'Deluxe Room',
        'description' => 'A spacious room with king-size bed, ensuite bathroom, and balcony.',
        'price' => 120,
        'image' => 'images/deluxe.jpg'
    ],
    [
        'id' => 2,
        'name' => 'Standard Room',
        'description' => 'Comfortable room with queen-size bed and city view.',
        'price' => 80,
        'image' => 'images/standard.jpg'
    ],
    [
        'id' => 3,
        'name' => 'Suite',
        'description' => 'Luxury suite with living area, kitchenette, and premium amenities.',
        'price' => 200,
        'image' => 'images/suite.jpg'
    ]
];

// ---- Basic PHP Validation ---- //
function sanitize_output($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Rooms - Grand Palace Hotel</title>
    <style>
        /* General body styles */
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Header */
        header {
            background: #0077cc;
            color: white;
            text-align: center;
            padding: 15px;
        }
        header h1 {
            margin: 0;
        }

        /* Navigation */
        .nav-main {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #f4f4f9;
            padding: 10px 20px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        .nav-links a {
            margin-right: 18px;
            color: #1abc9c;
            text-decoration: none;
            font-weight: bold;
        }
        .nav-links a:hover {
            color: #16a085;
        }

        /* Dropdown Menu */
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropbtn {
            background: none;
            border: none;
            font-size: 28px;
            cursor: pointer;
            color: #1abc9c;
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

        /* Page container */
        .container {
            padding: 20px;
            max-width: 1200px;
            margin: auto;
        }

        /* Rooms Grid */
        .room-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px 0;
        }
        .room {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 12px;
            width: 320px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.2s ease-in-out;
        }
        .room:hover {
            transform: translateY(-5px);
        }
        .room img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }
        .book-button {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            background: #1abc9c;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            transition: background 0.3s;
        }
        .book-button:hover {
            background: #16a085;
        }
        .price {
            font-weight: bold;
            color: #444;
        }
        h2.section-title {
            color: #0077cc;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <h1>Grand Palace Hotel</h1>
        <p>“Step into Comfort, Stay with Elegance"</p>
    </header>

    <!-- Navigation -->
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

    <!-- Page Title -->
    <div class="container">
        <h2 class="section-title">Available Rooms for Booking</h2>
    </div>

    <!-- Rooms Grid -->
    <div class="room-container">
        <?php if (!empty($rooms)): ?>
            <?php foreach ($rooms as $room): ?>
                <?php
                    $roomName = sanitize_output($room['name']);
                    $roomDesc = sanitize_output($room['description']);
                    $roomPrice = number_format((float)$room['price'], 2);
                    $roomId   = intval($room['id']);
                    $roomImg  = file_exists($room['image']) ? $room['image'] : 'images/no-image.jpg';
                ?>
                <div class="room">
                    <img src="<?php echo $roomImg; ?>" alt="<?php echo $roomName; ?>">
                    <h3><?php echo $roomName; ?></h3>
                    <p><?php echo $roomDesc; ?></p>
                    <p class="price">Price: $<?php echo $roomPrice; ?> per night</p>
                    <a href="book.php?room_id=<?php echo $roomId; ?>" class="book-button">Book Now</a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="text-align:center; color:red;">Sorry, no rooms are available right now.</p>
        <?php endif; ?>
    </div>

</body>
</html>
