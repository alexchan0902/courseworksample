<?php
        Session_start();
        if(isset($_SESSION["loggedinuser"])){
            echo("Hello " . $_SESSION["firstname"]);
            echo("<br>");
            echo("Your balance: £" . $_SESSION["balance"]);
        }else{
            header("Location: Login.php");
        }
?>
<!DOCTYPE html>
<html>
<head>
    <h1>Packed Lunches - buy food</h1>
</head>
<body>
    <h1>Choose Food</h1>
        
    <?php
        include_once("connection.php");
        $stmt=$conn->prepare("SELECT * FROM tblfood ORDER BY Category, Name");
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            //print_r($row);
            echo('<form action="addtobasket.php" method="POST">');
            echo($row["Name"]." ".$row["Description"]." ".$row["Price"]);
            echo('<input type="number" name="qty" min="0" max="5" value="0">');
            echo('<input type="hidden" name="foodid" value='.$row["FoodID"].'>');
            echo('<input type="submit" value="Add to basket">');
            echo("</form>");
        }   
    ?>
</body>
</html>