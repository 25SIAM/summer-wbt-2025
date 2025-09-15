<?php include 'database.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete Product</title>
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
<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM products WHERE id=$id");
$row = $result->fetch_assoc();
 
if (isset($_POST['delete'])) {
    $conn->query("DELETE FROM products WHERE id=$id");
    header("Location: display.php");
    exit;
}
?>
    <form method="POST">
        <fieldset class="box">
            <legend>DELETE PRODUCT</legend>
            Name: <?= $row['name'] ?><br>
            Buying Price: <?= $row['buying_price'] ?><br>
            Selling Price: <?= $row['selling_price'] ?><br>
            Displayable: <?= $row['display'] ?><br>
            <hr>
            <input type="submit" name="delete" value="Delete">
        </fieldset>
    </form>
</body>
</html>