<!DOCTYPE html>
<html>
<head>
    <title>Add users</title>
<head>

<body>
    <form action="adduser.php">
        Surname: <input type ="text" name="surname"><br>
        Forename: <input type ="text" name="forname"><br>
        Password: <input type ="password" name="password"><br>
        Year: <input type ="number" name="year"><br>
        Initial Balance: <input type ="number" name="balance"><br>
        Role:
        <input type ="radio" name="role" value="pupil" checked>Pupil
        <input type ="radio" name="role" value="admin" checked>Admin<br>
        <input type ="submit" name="Add user"><br>
    </form>
</body>
</html>