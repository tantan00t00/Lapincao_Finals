<?php


$sid = $_POST['sid'];
$brand = $_POST['brand'];
$color = $_POST['color'];
$size = intval($_POST['size']); 
$price = floatval($_POST['price']); 

$connection = mysqli_connect("localhost", "root", "", "lapincao_db");


if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "UPDATE product SET brand = ?, color = ?, size = ?, price = ? WHERE sid = ?";


$stmt = $connection->prepare($sql);


if ($stmt === false) {
    die("Error preparing the SQL statement: " . $connection->error);
}


$stmt->bind_param("ssidi", $brand, $color, $size, $price, $sid); 


if ($stmt->execute()) {
    
    header('Location: index.php');
    exit(); 
} else {
    
    echo "Error updating record: " . $stmt->error;
}


$stmt->close();
$connection->close();

?>


