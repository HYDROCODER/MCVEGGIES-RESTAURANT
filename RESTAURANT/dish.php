<?php
require_once("session.php");
require_once("db_connect.php");
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Dish Display</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Montaga&display=swap" rel="stylesheet"> 
    <style>
        body{
            background-image: url("dish.jpg");
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
            height: 100%;
        }
    </style>
</head>
<body>
    <div class="container d-flex h-100">
        <div class="row w-100 align-self-center">
            <div class="col-12-md mx-auto">
                <div class="jumbotron" style="background-color: rgba(255,255,255,0.8);">
                    <div class="display-3 text-center" style="font-family: 'Roboto Slab', serif; background-color:bisque;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                        <?php echo $_SESSION['foodname'];?>
                    </div>
                    <div class="display-4 text-center" style="font-family: 'Roboto Slab', serif; background-color:bisque;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                        <?php echo "(PRICE :₹".$_SESSION['price'].")";?>
                    </div>
                    <div class="container" style="box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                        
                        <?php 
                        if(isset($_SESSION['filename']))
                        {
                            echo '<img class="img-fluid mx-auto d-block rounded-circle" src="uploads/'.$_SESSION['filename'].'">';
                        }
                        else{
                            echo '<img class="img-fluid mx-auto d-block rounded-circle" src="data:image/jpeg;base64,'.base64_encode($_SESSION['foodimg']).'"/>';
                        }
                        ?>
                        <p class="text-center" style="font-family: 'Montaga', serif;font-size:large"><?php echo $_SESSION['details'];?></p>
                    </div>

                </div>
                <div class="jumbotron" style="background-color:rgba(255,255,255,0.8)">
                    <div class="display-3 text-center" style="font-family: 'Roboto Slab', serif; background-color:bisque;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                        COMMENTS SECTION:
                    </div>
                    
                        <?php
                            

                            
                            try{
                                $SQLQuery="SELECT * FROM comments WHERE food_name=:fname";
                                $statement=$conn->prepare($SQLQuery);
                                $statement->execute(array(":fname"=>$_SESSION['foodname']));
                                while($food=$statement->fetch())
                                {
                                    echo "<div class='container' style='box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);'>";
                                    echo $food['username']." : ".$food['comment'];
                                   
                                    if(isset($_SESSION['username'])){    
                                    if($food['username']==$_SESSION['username'])
                                        {
                                            echo '<a href="delete.php?f='.$food['id'].'">';
                                            echo '<button class="btn btn-danger float-right">';
                                            echo "Delete";
                                            echo "</button>";
                                            echo '</a>';
                                            
                                            echo '<button class="btn btn-warning float-right" data-toggle="modal" data-target="#editForm'.$food['id'].'">';
                                            echo "Edit";
                                            echo "</button>";
                                            
                                            echo '<div class="modal" id="editForm'.$food['id'].'">';
                                            echo '<div class="modal-dialog">';
                                                echo '<div class="modal-content">';
                                                    echo '<div class="modal-header">';
                                                        echo '<h4>Edit Form</h4>';
                                                    echo '</div>';
                                                    echo '<div class="modal-body">';
                                                        echo '<form method="POST" action="edit.php?f='.$food['id'].'">';
                                                            echo '<input type="text" name="newcomm" value="'.$food['comment'].'">';
                                                                echo '<button type="submit" class="btn btn-primary">';
                                                                    echo "Submit";
                                                                echo '</button>';
                                                        echo '</form>';
                                                    echo '</div>';
                                                    echo '<div class="modal-footer">';
                                                        echo '<button type="button" class="btn btn-danger" data-dismiss="modal">';
                                                            echo 'Close';
                                                        echo '</button>';
                                                    echo '</div>';
                                                echo '</div>';
                                            echo '</div>';
                                        echo '</div>';
                                    
                                            
                                            
                                        }
                                    }
                                   
                                    echo "</div>";
                                    echo "<br>";
                                }
                                
                            
                            
                            
                            }catch(PDOException $e)
                            {
                                echo "Error".$e->getMessage();
                            }
                        ?>
                    
                    <?php if(isset($_SESSION['username'])):?>
                    <div class="container text-center" style="box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                       <button class="btn btn-primary" data-toggle="modal" data-target="#commentForm">Comment!</button>
                    </div>
                    <?php endif;?>
                    <?php if(!isset($_SESSION['username'])):?>
                    <div class="container text-center" style="box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                       <a href="index.html"><button class="btn btn-primary">Want to comment?Login/Register Here!</button></a>
                    </div>
                    <?php endif;?>
                    <?php if(isset($_SESSION['username']) && $_SESSION['username']=="admin"):?>
                    <div class="container text-center" style="box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                       <button class="btn btn-warning" data-toggle="modal" data-target="#updateForm">Update Dish</button>
                    </div>
                    <?php endif;?>
                    
                    <?php if(isset($_SESSION['username']) && $_SESSION['username']=="admin"):?>
                    <div class="container text-center" style="box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <a href="deldish.php?id=<?php echo $_SESSION['id'];?>&foodtype=<?php echo $_SESSION['foodtype'];?>"><button class="btn btn-danger" >Delete Dish</button></a>
                    </div>
                    <?php endif;?>

                </div>
            </div>
        </div>
    </div>
    

<div class="modal" id="commentForm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Comment Form</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="comment.php">
                    <input type="text" placeholder="Write a comment" name="comment" required>
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="updateForm">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                  <h4>Update Form</h4>
            </div>
            <div class="modal-body">
              <form action="update.php" method="POST" enctype="multipart/form-data">
                <div class="form-group"><label>Food Name:</label>
                    <input type="text" class="form-control" name="food_name" placeholder="Enter the food name you wish to create" value="<?php echo $_SESSION['foodname'];?>"required>
                </div>
                <div class="form-group"><label>Food Type:</label>
                    <input type="text" class="form-control" name="food_type" placeholder="Enter the food type you wish to create" value="<?php echo $_SESSION['foodtype'];?>"required>
                </div>
                <div class="form-group">
                  <label>Details of food</label>
                    <input type="text" class="form-control" name="details" value="<?php echo $_SESSION['details'];?>"required>
                </div>
                <div class="form-group">
                  <label>Price</label>
                    <input type="text" class="form-control" name="price" placeholder="Just enter the value of the price in digits" value="<?php echo $_SESSION['price'];?>"required>
                </div>
                <div class="form-group">
                <label>Food Image</label>
                <input type="file" class="form-control" name="image" id="image" required>
                </div>
               
                    <button type="submit" id="insert" class="btn btn-primary" name="submit_btn">Submit</button>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" name="create_btn" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
<script>
  $(document).ready(function(){
    $("#insert").click(function(){
        var image_name=$("#image").val();
        if(image_name=='')
        {
          alert("Please Select An Image ");
          return(false);
        }
        else{
          var extension=$("#image").val().split('.').pop().toLowerCase();
          if(jQuery.inArray(extension,['jpg','jpeg'])==-1)
          {
            alert("INVALID IMAGE FILE");
            $("#image").val()='';
            return(false);
          }
        }
    });

  });
</script>

</body>
</html>
