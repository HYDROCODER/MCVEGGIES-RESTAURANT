<?php
            require_once("session.php");
            require_once("db_connect.php");
            $id=$_GET['f'];
            try{

                $SQLQuery="DELETE FROM comments WHERE id=".$id;
                $conn->exec($SQLQuery);
                echo"Record Deleted Succesfully";
                header("location:dish.php");
            }catch(PDOException $e){
                echo "Error".$e->getMessage();
            }

?>