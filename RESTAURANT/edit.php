<?php
require_once("session.php");
require_once("db_connect.php");
$id=intval($_GET['f']);
$str=strval($_POST['newcomm']);
try{
    
    $SQLQuery="UPDATE comments SET comment='".$str."'WHERE id=".$id;
    $conn->exec($SQLQuery);
    header("location:dish.php");
}catch(PDOException $e){
    echo "Error".$e->getMessage();
}

?>