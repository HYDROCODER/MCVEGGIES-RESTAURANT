<?php 
require_once("session.php");
require_once("db_connect.php");
try{
    $id=$_GET['id'];
    $foodtype=$_GET['foodtype'];
    $SQLQuery='DELETE FROM '.$foodtype.' WHERE id='.$id ;
    $conn->exec($SQLQuery);
    header("location:mcveggies1.php");
    

}catch(PDOException $E){
    echo "Error:".$e->getMessage();
}
?>
