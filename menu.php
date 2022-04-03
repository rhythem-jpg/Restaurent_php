<?php 
session_start();
include "db_conn.php";

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <style>
     @import url('https://fonts.googleapis.com/css?family=Playfair+Display');
@import url('https://fonts.googleapis.com/css?family=Playfair+Display|Source+Sans+Pro');
.card{
  top: 20px;
  margin: 0 auto;
  float: none;
  margin-bottom: 10px;
}
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-home</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="background-color:black;">
    <?php
    $sql = "SELECT * FROM food_menu";
    $result =  mysqli_query($conn, $sql);
    while($row = $result->fetch_array()){
        $id = $row['id'];
        $name = $row['name'];
        $price = $row['price'];
        $description = $row['description'];
        $image = $row['image_location'];
        echo "<div class=\"card\" style=\"width: 18rem;\">";
        echo "<img class=\"card-img-top\" src=\"/admin/$image\" alt=\"Card image cap\">";
        echo "<div class=\"card-body\">";
        echo " <h5 class=\"card-title\">$name</h5>";
        echo " <h5 class=\"card-title\">$price</h5>";
        echo "<p class=\"card-text\">$description</p>";
        echo "<form action=\"orders.php\" method=\"POST\">";
        echo "<input name=\"quantity\" placeholder=\"Quantity\" type=\"number\" value=\"1\" class=\"form-control\">";
        echo "<input name=\"food_id\" placeholder=\"Quantity\" type=\"number\" value=\"$id\" class=\"form-control\" hidden>";
        echo "<input type=\"submit\" value=\"submit\">";
        echo "</form>";
        echo "</div>";
        echo "</div>";
    }
    ?>
    <!-- <div class="card">
  <div class="card-image">
    <img src=\"/admin/$image\" alt="Orange" />
  </div>
  
  <div class="card-body">
          <div class="card-date">
      <time>$price</time>
    </div>
    <div class="card-title">
      <h3>$name</h3>    
    <div class="card-excerpt">
      <p>description</p>
    </div> -->
    
  <!-- </div>
</div> -->

    <button type="submit">          <a href="home.php" class="ca">Go Home</a></button>
    
</body>
</html>
 <?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>