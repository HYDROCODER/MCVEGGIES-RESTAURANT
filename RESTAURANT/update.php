<?php
require_once("session.php");
require_once("db_connect.php");
try{
    $_SESSION['food_name']=$_POST['food_name'];
    $_SESSION['food_type']=$_POST['food_type'];
    $_SESSION['details']=$_POST['details'];
    $_SESSION['price']=$_POST['price'];
    $filename=$_FILES['image']['name'];
    $filetmpname=$_FILES['image']['tmp_name'];
    if($_FILES['image']['size']>10000000)
    {
        echo '<script type="text/javascript">alert("File Uploaded Exceeds maximum size of 10mb");</script>';
        header("location:mcveggies1.php");
    }
    else
    {
        $folder="uploads/";
        move_uploaded_file($filetmpname,$folder.$filename);
        $SQLQuery="UPDATE ".$_SESSION['food_type']." SET food_name='".$_SESSION['food_name']."',details='".$_SESSION['details']."',price='".$_SESSION['price']."',filename='".$filename."' WHERE id=".$_SESSION['id'];
        $conn->exec($SQLQuery);
        header("location:mcveggies1.php");
    }
    
    
    
    
    
}catch(PDOExcepton $e)
{
    echo "Error".$e->getMessage();
}
?>
