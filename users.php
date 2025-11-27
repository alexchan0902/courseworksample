<!DOCTYPE html>
<html>
    <head>
        <title>Add users</title>
    <head>

    <body>
        <form action="addusers.php" method="post">
            Surname: <input type ="text" name="surname"><br>
            Forename: <input type ="text" name="forename"><br>
            Password: <input type ="password" name="password"><br>
            Year: <input type ="number" name="year"><br>
            Initial Balance: <input type ="number" name="balance"><br>
            Role:
            <input type ="radio" name="role" value="pupil" checked>Pupil
            <input type ="radio" name="role" value="admin" checked>Admin<br>
            <input type ="submit" name="Add user"><br>
        </form>
        <?php
            include_once("connection.php");
            $stmt1= $conn->prepare("SELECT * FROM tblusers");
            $stmt1->execute();
            while($row = $stmt1->fetch(PDO::FETCH_ASSOC))
            {
                echo($row["Forename"]." "."<br>".$row["Surname"]."<br>");
            }
            ?>
    </body>
</html>
