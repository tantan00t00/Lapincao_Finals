<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Product</title>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php
            $sid = $_GET['sid']; 
            
            $connection = mysqli_connect("localhost", "root", "", "lapincao_db");

           
            if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }

           
            $sql = "SELECT * FROM product WHERE sid = ?";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("i", $sid); 
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

           
            $stmt->close();
            mysqli_close($connection);
        ?>

        <form action="editshirt.php" method="POST">
            <input type="hidden" id="sid" name="sid" value="<?php echo htmlspecialchars($row['sid']); ?>">

            <label for="brand">BRAND</label>
            <input type="text" id="brand" name="brand" placeholder="Brand" value="<?php echo htmlspecialchars($row['brand']); ?>">

            <label for="color">COLOR</label>
            <input type="text" id="color" name="color" placeholder="Color" value="<?php echo htmlspecialchars($row['color']); ?>">

            <label for="size">SIZE</label>
            <input type="text" id="size" name="size" placeholder="Size" value="<?php echo htmlspecialchars($row['size']); ?>">

            <label for="price">PRICE</label>
            <input type="text" id="price" name="price" placeholder="Price" value="<?php echo htmlspecialchars($row['price']); ?>">

            <input type="submit" value="Edit" onclick="return confirm('Are you sure you want to edit this product?')">
        </form>
    </body>
</html>


