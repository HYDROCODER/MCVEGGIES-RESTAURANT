<?php
require_once("session.php");
require_once("db_connect.php");
?>
<!DOCTYPE HTML>
<html>
<head>
        <title>Get Nav Items</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    try{
        $q=strval($_GET['q']);
        $SQLQuery="SELECT * FROM ".$q;
        $statement=$conn->prepare($SQLQuery);
        $statement->execute();
        while($row=$statement->fetch())
        {
            echo "</a>";
            echo "<div class="dropdown-menu">";
                
            foreach($row['food_name'] as $f])
            {
                echo "<a class="dropdown-item" href="#">";
                    echo strval($f);
                echo "</a>";
            }
            echo "</div>";
        }
    }catch(PDOException $e{
        echo "Error".$e->getMessage();

    }

    $conn=NULL;




</body>
</html>