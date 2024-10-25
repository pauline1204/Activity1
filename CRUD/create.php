<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Product</title>
</head>
<body>
    <h2>Create New Product</h2>

    <form action="create.php" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label for="description">Description:</label><br>
        <textarea name="description" required></textarea><br><br>

        <label for="price">Price:</label><br>
        <input type="number" step="0.01" name="price" required><br><br>

        <label for="quantity">Quantity:</label><br>
        <input type="number" name="quantity" required><br><br>

        <input type="submit" value="Create Product">
    </form>

    <br><a href="index.php">Back to Product List</a>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        $sql = "INSERT INTO products (Name, Description, Price, Quantity) VALUES ('$name', '$description', '$price', '$quantity')";
        if ($conn->query($sql) === TRUE) {
            echo "New product created successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
</body>
</html>
