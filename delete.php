<?php

$sid = $_GET['sid'];


$connection = mysqli_connect("localhost","root","","lapincao_db");
     
     $sql = "DELETE FROM product WHERE sid=$sid";
     
     $result = $connection->query($sql);
     
     $connection->close();
     
     header("location:index.php");

