<?php
require_once("session.php");
require_once("db_connect.php");


try{
    $str=$_POST['comment'];
    $SQLQuery="INSERT INTO comments(username,food_type,food_name,comment) VALUES(:username,:foodtype,:foodname,:comment)";
    $statement=$conn->prepare($SQLQuery);
    $statement->execute(array(":username"=>$_SESSION['username'],":foodtype"=>$_SESSION['foodtype'],":foodname"=>$_SESSION['foodname'],":comment"=>$str));
    header("location:dish.php");
}catch(PDOException $e)
{
    echo "Error".$e->getMessage();
}
?>