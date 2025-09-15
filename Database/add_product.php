<?php include 'database.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
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
    .error { color: red; margin-left: 20px; }
</style>
</head>
<body>
    <?php
    // Initialize variables
    $name = $buying = $selling = "";
    $displayChecked = "";
    $errors = [];

    if (isset($_POST['save'])) {
        $name = trim($_POST['name']);
        $buying = $_POST['buying_price'];
        $selling = $_POST['selling_price'];
        $display = isset($_POST['display']) ? 'Yes' : 'No';
        $displayChecked = ($display == 'Yes') ? "checked" : "";

        // ✅ Validation
        if (empty($name)) {
            $errors[] = "Name is required.";
        }
        if (!is_numeric($buying) || $buying <= 0) {
            $errors[] = "Buying Price must be a positive number.";
        }
        if (!is_numeric($selling) || $selling <= 0) {
            $errors[] = "Selling Price must be a positive number.";
        }
        if (is_numeric($buying) && is_numeric($selling) && $selling < $buying) {
            $errors[] = "Selling Price should not be less than Buying Price.";
        }

        if (empty($errors)) {
            $sql = "INSERT INTO products (name, buying_price, selling_price, display)
                    VALUES ('$name','$buying','$selling','$display')";
            if ($conn->query($sql) === TRUE) {
                header("Location: display.php");
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    ?>

    <!-- Form -->
    <form method="POST">
        <fieldset class="box">
            <legend>ADD PRODUCT</legend>
            Name<br>
            <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" required><br>
            Buying Price<br>
            <input type="number" step="0.01" name="buying_price" value="<?php echo htmlspecialchars($buying); ?>" required><br>
            Selling Price<br>
            <input type="number" step="0.01" name="selling_price" value="<?php echo htmlspecialchars($selling); ?>" required><br>
            <hr>
            <input type="checkbox" name="display" value="Yes" <?php echo $displayChecked; ?>> Display
            <hr>
            <input type="submit" name="save" value="SAVE">
        </fieldset>
    </form>

    <!-- Error messages -->
    <?php
    if (!empty($errors)) {
        foreach ($errors as $e) {
            echo "<p class='error'>⚠ $e</p>";
        }
    }
    ?>
</body>
</html>
