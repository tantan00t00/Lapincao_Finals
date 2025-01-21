<?php

$connection = mysqli_connect("localhost", "root", "", "lapincao_db");


if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


$brnd = mysqli_real_escape_string($connection, $_GET['brand']);
$clr = mysqli_real_escape_string($connection, $_GET['color']);
$sz = intval($_GET['size']); 
$prc = mysqli_real_escape_string($connection, $_GET['price']);


echo $brnd . " clr: " . $clr . " sz: " . $sz . " prc: " . $prc;


$sql = "INSERT INTO product (brand, color, size, price) VALUES ('$brnd', '$clr', $sz, '$prc')";


if (mysqli_query($connection, $sql)) {
    echo "Product added successfully!";
} else {
    echo "Error: " . mysqli_error($connection);
}


mysqli_close($connection);


header("Location: index.php");
exit();
?>


