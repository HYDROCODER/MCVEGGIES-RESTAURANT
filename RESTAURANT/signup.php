<?php


require_once("db_connect.php");
if(isset($_POST['signup_btn']))
{
    $username=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $hashed_password=password_hash($password, PASSWORD_DEFAULT);
    try{
        $SQLInsert="INSERT INTO users(username,email,password) VALUES(:username,:email,:password)";
        $statement=$conn->prepare($SQLInsert);
        $statement->execute(array(':username'=>$username,':email'=>$email,':password'=>$hashed_password));
        if($statement->rowCount()==1)
            {
                header('location: index.html');
            }
    }catch(PDOException $e){
      
        echo "Error:".$e->getMessage();
        
    }
}

?>
