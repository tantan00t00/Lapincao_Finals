<!DOCTYPE html>
<html>
        </table>
    </body>
</html> 
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>  
       <form action="addshirt.php">
            <label for='type'>BRAND</label>
            <input type="text" id="brand" name="brand">
            <label for='brand'>COLOR</label>
            <input type="text" id="color" name="color">
             <label for='price'>SIZE</label>
            <input type="text" id="size" name="size">
            <label for='price'>PRICE</label>
            <input type="text" id="price" name="price">
            <input type="submit" value="ADD" name="ADD"/>
            </form>
        <table>
            <tr>
                <th>SID</th>
                <th>BRAND</th>
                <th>COLOR</th>
                <th>SIZE</th>
                <th>PRICE</th>
            </tr>
       
     <?php
        $connection = mysqli_connect("localhost","root","","lapincao_db");
        $sql = "SELECT * FROM product";
       
       $result = $connection->query($sql);
     
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$row['sid']."</td>";
            echo "<td>".$row['brand']."</td>";
            echo "<td>".$row['color']."</td> ";
            echo "<td>".$row['size']."</td> ";
             echo "<td>".$row['price']."</td> ";
            echo "<td>"
            . "<a class=\"btn\"href=\"editshirtview.php?sid=".$row['sid']."\">Edit</a>"
                    . "<a class=\"btn\"href=\"deleteshirt.php?sid=".$row['sid']."\" onclick=\"return confirm('Delete lapincao_db?')\">Delete</a>"
                    . "</td> ";
            echo "</tr>";
        }
       $connection->close();
     
     ?>
        </table>
    </body>
</html>

