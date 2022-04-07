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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-home</title>
    <style>
      .ca {
  font-size: 14px;
  display: inline-block;
  padding: 10px;
  text-decoration: none;
  color: #444;
}
.ca:hover {
  text-decoration: underline;
}
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Food_ID</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
          <?php
    $data = array();
    $id= $_SESSION['id'];
        
    $sql = "select * from orders";
    $result =  mysqli_query($conn, $sql);
    while($row = $result->fetch_array()){
        $id = $row['id'];
        $food_id = $row['food_id'];
        $price = $row['total'];
        echo "<tr>";
          echo "<th scope=\"row\">$id</th>";
          echo "<td>$food_id</td>";
          echo "<td>$price</td>";
        echo "</tr>";
    }
    ?>

  </tbody>
</table>

         	<button type="submit">          <a href="home.php" class="ca">Go Home</a></button>
</body>
</html>
 <?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>