<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Product</title>
</head>
<body>
    <h2>Update Product</h2>

    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM products WHERE Id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        $sql = "UPDATE products SET Name = '$name', Description = '$description', Price = '$price', Quantity = '$quantity' WHERE Id = $id";
        if ($conn->query($sql) === TRUE) {
            echo "Product updated successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>

    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['Id']; ?>">

        <label for="name">Name:</label><br>
        <input type="text" name="name" value="<?php echo $row['Name']; ?>" required><br><br>

        <label for="description">Description:</label><br>
        <textarea name="description" required><?php echo $row['Description']; ?></textarea><br><br>

        <label for="price">Price:</label><br>
        <input type="number" step="0.01" name="price" value="<?php echo $row['Price']; ?>" required><br><br>

        <label for="quantity">Quantity:</label><br>
        <input type="number" name="quantity" value="<?php echo $row['Quantity']; ?>" required><br><br>

        <input type="submit" value="Update Product">
    </form>

    <br><a href="index.php">Back to Product List</a>
</body>
</html>
