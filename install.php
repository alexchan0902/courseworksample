<?php
    #create variables with server detailson
    $servername="localhost";
    $username="root";
    $password="root";

    $conn=new PDO("mysql:host=$servername",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql="CREATE DATABASE IF NOT EXISTS Lunches";
    $conn->exec($sql);
    $sql="USE Lunches";
    $conn->exec($sql);
    echo("DB made");
    $stmt1=$conn->prepare("DROP TABLE IF EXISTS tblusers;
    CREATE TABLE tblusers
    (UserID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(20) NOT NULL,
    Surname VARCHAR(20) NOT NULL,
    Forename VARCHAR(20) NOT NULL,
    Password VARCHAR(200) NOT NULL,
    Year INT(2) NOT NULL,
    Balance DECIMAL (15,2) NOT NULL,
    Role TINYINT(1))
    ");
    $stmt1->execute();
    $hashedpassword=password_hash("Password",PASSWORD_DEFAULT);
    echo($hashedpassword);
    //add in some default data
    $stmt1= $conn->prepare("INSERT INTO tblusers
    (UserID,Username, Surname, Forename, Password, Year, Balance, Role)
    VALUES
    (NULL,'Chan.A','Chan','Alex', :Password,'2008','1000000','1'),
    (NULL,'Yeung.R','Yeung','Rico', :Password,'2008','100','0')
    ");
    $stmt1->bindParam(":Password",$hashedpassword);
    $stmt1->execute();

    $stmt1= $conn->prepare("DROP TABLE IF EXISTS tblfood;
    CREATE TABLE tblfood
    (FoodID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(20) NOT NULL,
    Description VARCHAR(200) NOT NULL,
    Category VARCHAR(20) NOT NULL,
    Price DECIMAL (15,2) NOT NULL);
    ");
    $stmt1->execute();
    $stmt1=$conn->prepare("INSERT INTO tblfood 
    (FoodID,Name,Description,Category,Price)
    VALUES
    (NULL,'Fries','Yellow potato strips' ,'Snack','5.00'),
    (NULL,'Chocolate bar','Chocolate' ,'Snack','2.00'),
    (NULL,'BLT','Bacon Lettuce Tomato' ,'Sandwich','3.40'),
    (NULL,'Ham and cheese','Sandwich' ,'Sandwich','3.40'),
    (NULL,'Water','Pure water','Drink','0.00'),
    (NULL,'Coke','Coca Cola' ,'Drink','2.00')
    ");
    
    $stmt1->execute();
?>