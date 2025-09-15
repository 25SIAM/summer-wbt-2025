<?php include 'database.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Search Product</title>
    <style>
    body { font-family: Arial, sans-serif; }
    .box { 
        border: 1px solid black; 
        width: 300px; 
        padding: 10px; 
        margin: 20px 0 20px 20px; 
    }
    .box legend { 
        font-weight: bold; 
    }
    .box input[type=text],
    .box input[type=number] { 
        width: 95%; 
        margin: 4px 0; 
    }
    .box hr { 
        margin: 8px 0; 
    }
</style>

</head>
<body>
    <fieldset class="box">
        <legend>SEARCH</legend>
        <form method="GET">
            <input type="text" name="q" value="<?= isset($_GET['q']) ? $_GET['q'] : '' ?>">
            <input type="submit" value="Search By Name">
        </form>
 
        <table>
            <tr>
                <th>NAME</th>
                <th>PROFIT</th>
                <th></th>
            </tr>
            <?php
            if (isset($_GET['q'])) {
                $q = $_GET['q'];
                $sql = "SELECT * FROM products WHERE display='Yes' AND name LIKE '%$q%'";
            } else {
                $sql = "SELECT * FROM products WHERE display='Yes'";
            }
 
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $profit = $row['selling_price'] - $row['buying_price'];
                    echo "<tr>
                            <td>{$row['name']}</td>
                            <td>{$profit}</td>
                            <td>
                                <a href='edit.php?id={$row['id']}'>edit</a>
                                <a href='delete.php?id={$row['id']}'>delete</a>
                            </td>
                          </tr>";
                }
            }
            ?>
        </table>
    </fieldset>
</body>
</html>
 