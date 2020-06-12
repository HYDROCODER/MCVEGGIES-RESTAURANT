<?php
require_once("session.php");
require_once("db_connect.php");


try{
    $SQLQuery="SELECT * FROM ".$_GET['foodtype']." WHERE id=".$_GET['id'];
    $statement=$conn->prepare($SQLQuery);
    $statement->execute();
    $row=$statement->fetch();
    $_SESSION['foodtype']=$_GET['foodtype'];
    $_SESSION['id']=$_GET['id'];
    $_SESSION['foodimg']=$row['food_image'];
    $_SESSION['filename']=$row['filename'];
    $_SESSION['foodname']=$row['food_name'];
    $_SESSION['details']=$row['details'];
    $_SESSION['price']=$row['price'];

    header("location: dish.php");
    
}catch(PDOException $e)
{
    echo "Error".$e->getMessage();
    header("location: mcveggies1.php");

}




?>