<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-home</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php include("nav.php");?>
    <?php include("get_food.php");?>
    <form class="row g-3" action="upload_food.php" method="POST" enctype="multipart/form-data">
             	<?php if (isset($_GET['error'])) { ?>
     		<p class="error" style="  background: #f2dede; color: #a94442; padding: 10px; width: 95%; border-radius: 5px; margin: 20px auto;"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success" style=" background: #d4edda;
  color: #40754c;
  padding: 10px;
  width: 95%;
  border-radius: 5px;
  margin: 20px auto;"><?php echo $_GET['success']; ?></p>
          <?php } ?>
<div class="mb-3">
  <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
  <label for="formFile" class="form-label">Food Image</label>
  <input class="form-control" name="userfile" type="file" id="userfile">
</div>
  <div class="col-auto">
    <label for="Name" class="visually-hidden">Food Name</label>
    <input type="text" class="form-control" name="food_name" id="Name" placeholder="Name">
  </div>
    <div class="col-auto">
    <label for="Name" class="visually-hidden">Price</label>
    <input type="text" class="form-control" name="price" id="Name" placeholder="Price">
  </div>
      <div class="col-auto">
    <label for="Name" class="visually-hidden">description</label>
    <input type="text" class="form-control" name="description" id="Name" placeholder="Description">
  </div>
  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Submit</button>
  </div>
</form>
</body>
</html>
 <?php 
}else{
     header("Location: ../../index.php");
     exit();
}
 ?>