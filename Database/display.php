<?php
$conn = new mysqli("localhost", "root", "", "product_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle delete
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $conn->query("DELETE FROM products WHERE id=$id");
    header("Location: display.php");
    exit;
}

// Fetch products with display=Yes
$result = $conn->query("SELECT * FROM products WHERE display='Yes'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Display Products</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .box {
            border: 1px solid black;
            width: 520px;              
            padding: 8px 12px;
            margin: 20px 0 20px 20px;   
            box-sizing: border-box;
            background: #fff;
        }
        .box .title {
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            padding: 6px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse; 
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        a { text-decoration: none; color: blue; }
        
        .empty {
            padding: 12px;
            text-align: center;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="box">
        <div class="title">DISPLAY</div>

        <?php if ($result && $result->num_rows > 0): ?>
        <table>
            <tr>
                <th>NAME</th>
                <th>BUYING</th>
                <th>SELLING</th>
                <th>PROFIT</th>
                <th colspan="2">ACTION</th>
            </tr>

            <?php while($row = $result->fetch_assoc()): 
                $profit = $row['selling_price'] - $row['buying_price'];
            ?>
            <tr>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo number_format($row['buying_price'], 2); ?></td>
                <td><?php echo number_format($row['selling_price'], 2); ?></td>
                <td><?php echo number_format($profit, 2); ?></td>
                <td><a href="edit.php?id=<?php echo $row['id']; ?>">edit</a></td>
                <td><a href="display.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete this product?')">delete</a></td>
            </tr>
            <?php endwhile; ?>
        </table>

        <?php else: ?>
            <div class="empty">No products to display (Display = Yes)</div>
        <?php endif; ?>

    </div>
</body>
</html>
