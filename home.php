<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<style>
          html {
  height: 100%;
  margin: 0;
  padding: 0;
}

body {
  height: 100%;
  background-image: url(https://images.unsplash.com/photo-1579751626657-72bc17010498?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2069&q=80);
  background-repeat: no-repeat;
  background-size: cover;
margin: 0;
  padding: 0;
}

div {
  width: 300px;
  background-color: #040509;
  height: 100%;
  color: #CFC2B1;
  padding: 50px;
  overflow: hidden;
  position: absolute;
  left: 10vw;
  text-align: center;
}

nav {
  float: right;
  text-transform: uppercase;
  font-family: 'Open Sans Condensed', sans-serif;
  letter-spacing: 2px;
  font-size: 20px;
  margin-top: 10vh;
  margin-right: 10vw;
}

hr {
width: 200px;  
  color: #CA6338;
  opacity: 0.4;
}

h1 {
  font-family: 'WindSong', cursive;
  font-size: 50px;
  font-weight: 400;
}

h2 {
  text-transform: uppercase;
  font-family: 'Open Sans Condensed', sans-serif;
  font-size: 25px;
}

p {
      font-family: 'Open Sans Condensed', sans-serif;
  letter-spacing: 1px;
  font-size: 17px;
}

.nav-link {
  text-decoration: none;
  color: #CFC2B1;
  margin-right: 30px;
  font-size: 25px;
}

.nav-link:hover {
  color: #CA6338;
}
     </style>
</head>
<body>
<nav>
  <a href="./reservation.php" class="nav-link">Reservations</a>
  <a href="./menu.php" class="nav-link">Menu</a>
  <a href="./show_orders.php" class="nav-link">Order</a>
</nav>

<div>
<h1>レストラン<h1>
  <hr>
  <h2>Welcome! <?php echo $_SESSION['name']; ?></h2>
  <p>
    Every time you use the word ‘healthy,’ you lose. The key is to make yummy, delicious food that happens to be healthy.
  </p>
  </div>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>