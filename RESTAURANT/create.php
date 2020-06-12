<?php
require_once("session.php");
require_once("db_connect.php");
if(isset($_POST['submit_btn']))
{
    try
    {
        $_SESSION['food_name']=$_POST['food_name'];
        $_SESSION['food_type']=$_POST['food_type'];
        $_SESSION['price']=$_POST['price'];
        $_SESSION['details']=$_POST['details'];
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
            $SQLQuery="INSERT INTO ".$_SESSION['food_type']."(food_name,details,price,filename)
             VALUES('".$_SESSION['food_name']."','".$_SESSION['details']."','".$_SESSION['price']."','".$filename."')";
            $conn->exec($SQLQuery);
            $_SESSION['filename']=$filename;
        }
        header("location:mcveggies1.php");
    }catch(PDOException $e){
        echo "Error".$e->getMessage();
    }
}

?>