<?php
include_once("session.php");
include_once("db_connect.php");


?>
<!DOCTYPE html>
<html>
    <head>
        <title>McVeg Restaurant</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/7aea1eeb6e.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@700&display=swap" rel="stylesheet">
        <style>
           .carousel-inner img{
                width:100%;
                height: 100%;
            }
            .dropdown-link{
              padding: 1em 1.3em;
              text-align:center;
              
            }
          </style>
    </head>
    <body data-spy="scroll" data-target=".navbar" data-offset="50">
        <div class="jumbotron-fluid ">
            <img class="mx-auto d-block" src="1veggie-cm-white-.jpg" style="width: 300px;height: 150px;">
            <p class="mx-auto text-center" style="font-family: 'Dancing Script', cursive; font-size:xxx-large;">
              <b>McVeggies</b><br>
              <p class="mx-auto text-center" style="font-family: 'Dancing Script', cursive; font-size:x-large;color:#DC143C">
                Vegetarian cuisine
              </p>
            </p>
            <p class="mx-auto text-center" style="font-family: 'Bitter', serif; font-size:xxx-large;">Welcome <b><?php if(isset($_SESSION['username'])){echo $_SESSION['username'];} else{echo "Customer!";}?></b>
              </p>
        </div>
          <nav class="navbar navbar-expand-md justify-content-center sticky-top bg-dark navbar-dark">
            
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#collapsibleNavBar">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapsibleNavBar">
              <ul class="navbar-nav">
                <li class="nav-item"><a href="#aboutus" class="nav-link">About Us</a></li>
              
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="south_indian"  data-toggle="dropdown">South Indian</a>
                    <div class="dropdown-menu" id="s_i">
                      <?php
                        try{
                          
                          $SQLQuery="SELECT * FROM south_indian";
                          $statement=$conn->prepare($SQLQuery);
                          $statement->execute();
                          $row=$statement->fetchAll(PDO::FETCH_ASSOC);
                          }catch(PDOException $e){
                              echo "Error".$e->getMessage();
                          }
                       ?> 
                        
                            <script>
                              
                              <?php foreach($row as $r):?>
                                var dish= document.createElement("A");
                                dish.innerHTML="<?php echo $r['food_name'];?><br>";
                                dish.setAttribute("class","dropdown-link");
                                dish.setAttribute("style","display:block");
                                dish.setAttribute("href","source.php?foodtype=south_indian&id=<?php echo $r['id'];?>"); 
                                document.getElementById('s_i').appendChild(dish);
                                
                              <?php endforeach;?>
                            </script>
                        
                      
			              </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle"  id="chinese" data-toggle="dropdown">Chinese</a>
                  <div class="dropdown-menu" id="c_i">
                  <?php
                        try{
                          
                          $SQLQuery="SELECT * FROM chinese";
                          $statement=$conn->prepare($SQLQuery);
                          $statement->execute();
                          $row=$statement->fetchAll(PDO::FETCH_ASSOC);
                          }catch(PDOException $e){
                              echo "Error".$e->getMessage();
                          }
                       ?> 
                        
                            <script>
                              
                              <?php foreach($row as $r):?>
                                var dish= document.createElement("A");
                                dish.innerHTML="<?php echo $r['food_name'];?><br>";
                                dish.setAttribute("class","dropdown-link");
                                dish.setAttribute("style","display:block");
                                dish.setAttribute("href","source.php?foodtype=chinese&id=<?php echo $r['id'];?>"); 
                                document.getElementById('c_i').appendChild(dish);
                              
                              <?php endforeach;?>
                            </script>
                    
			              </div>
                    
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="north_indian"  data-toggle="dropdown">North Indian</a>
                  <div class="dropdown-menu" id="n_i">
                  <?php
                        try{
                         
                          $SQLQuery="SELECT * FROM north_indian";
                          $statement=$conn->prepare($SQLQuery);
                          $statement->execute();
                          $row=$statement->fetchAll(PDO::FETCH_ASSOC);
                          }catch(PDOException $e){
                              echo "Error".$e->getMessage();
                          }
                       ?> 
                        
                            <script>
                              
                              <?php foreach($row as $r):?>
                                var dish= document.createElement("A");
                                dish.innerHTML="<?php echo $r['food_name'];?><br>";
                                dish.setAttribute("class","dropdown-link");
                                dish.setAttribute("style","display:block");
                                dish.setAttribute("href","source.php?foodtype=north_indian&id=<?php echo $r['id'];?>"); 
                                document.getElementById('n_i').appendChild(dish);
                                
                              <?php endforeach;?>
                            </script>
                     
			              </div>
                    
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="special_snacks"  data-toggle="dropdown">Special Snacks</a>
                  <div class="dropdown-menu" id="s_s">
                  <?php
                        try{
                          
                          $SQLQuery="SELECT * FROM special_snacks";
                          $statement=$conn->prepare($SQLQuery);
                          $statement->execute();
                          $row=$statement->fetchAll(PDO::FETCH_ASSOC);
                          }catch(PDOException $e){
                              echo "Error".$e->getMessage();
                          }
                       ?> 
                        
                            <script>
                              
                              <?php foreach($row as $r):?>
                                var dish= document.createElement("A");
                                dish.innerHTML="<?php echo $r['food_name'];?><br>";
                                dish.setAttribute("class","dropdown-link");
                                dish.setAttribute("style","display:block");
                                dish.setAttribute("href","source.php?foodtype=special_snacks&id=<?php echo $r['id'];?>"); 
                                document.getElementById('s_s').appendChild(dish);
                                
                              <?php endforeach;?>
                            </script>
                      
			              </div>
                   
                </li>
                
                <?php if(isset($_SESSION['username'])):?>
                <li class="nav-item">
                  <a href="logout.php" class="nav-link" >Logout</a>
                </li>
                <?php endif;?>
                <?php if(!isset($_SESSION['username'])):?>
                  <li class="nav-item">
                      <a href="index.html" class="nav-link">Login/Register</a>
                  </li>
                  <li class="nav-item">
                      <a href="index.html" class="nav-link">Admin</a>
                  </li>
                <?php endif;?>
                <?php if(isset($_SESSION['username']) && $_SESSION['username']=="admin"):?>
                    
                    
                    <li class="nav-item">
                      <a class="nav-link" ><button class="btn btn-success" data-toggle="modal" data-target="#createModal">Create Dish</button></a>
                    </li>
                   
                <?php endif;?>
              </ul>
            </div>


          </nav>        
      <div id="demo" class="carousel slide" data-ride="carousel">
            
            <ul class="carousel-indicators">
              <li data-target="#demo" data-slide-to="0" class="active"></li>
              <li data-target="#demo" data-slide-to="1"></li>
              <li data-target="#demo" data-slide-to="2"></li>
            </ul>

            <div class="carousel-inner">
              
              <div class="carousel-item active">
                <img src="caption1.jpg" alt="Los Angeles" width="550" height="250">
                <div class="carousel-caption">
                  <h3>A BIG NO TO ARTIFICIAL FLAVOURS</h3>
                  <p>We take pride in using natural and organic ingredients in our food!</p>
                </div>   
              </div>
              
              <div class="carousel-item">
                <img src="cleankitchen.jpg" alt="Chicago" width="550" height="250">
                <div class="carousel-caption">
                  <h3>Cleanliness</h3>
                  <p>Food is prepared in hygeinic conditions!</p>
                </div>   
              </div>
              
              <div class="carousel-item">
                <img src="introfood - Copy.jpg" alt="New York" width="550" height="250">
                <div class="carousel-caption">
                  <h3 style="color: black;background-color: bisque;">Fresh Fruits and Vegetables</h3>
                  <p style="color: black;background-color: bisque;">We buy our groceries freshly cut from the farms!</p>
                </div>   
              </div>

            </div>
            
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>
        </div>
          
          
        <div class="container border rounded-lg" id="aboutus" style="box-shadow: 2px 2px 8px 5px #696969;">
          <div class="row h-100">
            <div class="col-sm-12 my-auto">
                <h3 class="text-center">About Us  : McVeggies</h3>
                  <p class="text-center">
                      McVeggies was founded in 2015 by a group of anonymous students from IIT BHUBANESWAR,unknown till date,specifically for the
                      purpose of providing not just healthy but also tasty food to the IITians residing at the campus who were bored of the regular meals
                      at the hostels. Particularly, the Vegetarian community of the student body suffered for tasty food since they disliked eating non-veg(as the name goes).
                      The restaurant didn't receive postive response in the beginning from majority of the student-body and the administration ,but when the taste of the food fell on thier tongues,
                      they began accepting the restaurant and has since then flourished throughout the campus. Even the PM has visited the restaurant once and commended 
                      our efforts in bringing taste to the cyclone-hit and absolutely unpredictable weather tolerating campus. Do go through the menu above to 
                      see what we have in store! 
                  </p>
            </div>
          </div>
        </div>
          
      <div class="container-fluid" id="contact" style="background-color: yellowgreen;">
        <div class="row h-100">
          <div class="col-md-12 my-auto text-center">
            <p style="margin-bottom: 0em;">Reach us out here:</p><br>
            <button class="btn"><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i>
            </a></button>
            <button class="btn"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i>
            </a></button>
            <button class="btn"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i>
            </a></button>

          </div>
        </div>
      </div>
      <div class="modal" id="createModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                  <h4>Create Form</h4>
            </div>
            <div class="modal-body">
              <form action="create.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group"><label>Food Name:</label>
                        <input type="text" class="form-control" name="food_name" placeholder="Enter the food name you wish to create" required>
                    </div>
                    <div class="form-group"><label>Food Type:</label>
                        <input type="text" class="form-control" name="food_type" placeholder="Enter the food type you wish to create" required>
                    </div>
                    <div class="form-group">
                      <label>Details of food</label>
                        <input type="text" class="form-control" name="details" required>
                    </div>
                    <div class="form-group">
                      <label>Price</label>
                        <input type="text" class="form-control" name="price" placeholder="Just enter the value of the price in digits" required>
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