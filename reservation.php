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
   <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>
<body>
    <form action="reservation-check.php" method="post">
     	<h2>Reservation</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Table No</label>
               <input type="text" 
                      name="table_no" 
                      placeholder="Table Number"><br>

     	<label>Number of People</label>
     	<input type="Number" 
                 name="no_people" 
                 placeholder="No of People"><br>

          <label>Date</label>
          <input type="text" 
                 name="date" 
                 placeholder="Date"><br>
                           <label>phone</label>
          <input type="text" 
                 name="phone" 
                 placeholder="Phone Number"><br>

     	<button type="submit">Submit</button>
          <a href="home.php" class="ca">Go Home</a>
     </form>
</body>
</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}