<?php 
session_start(); 
include "db_conn.php";

ini_set('display_errors', 1);

     if (isset($_POST['quantity']) && isset($_POST['food_id'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$quantity = validate($_POST['quantity']);
	$food_id = validate($_POST['food_id']);


	$user_data = 'quantity='. $quantity. '&food_id='. $food_id;


	if (empty($quantity)) {
		header("Location: menu.php?error=Table No is required&$user_data");
	    exit();
	}else if(empty($food_id)){
        header("Location: menu.php?error=No of people is required&$user_data");
	    exit();
	}
	else{

        $user_id = $_SESSION["id"];
        $username = $_SESSION["user_name"];
        $number = rand(1,100);
        $price = mysqli_query($conn, "SELECT price FROM food_menu WHERE id=$food_id");
        if ($price){
             $row = mysqli_fetch_array($price);
             $p =  $row["price"];
             $sql = "INSERT INTO orders VALUES($number,$food_id,$user_id,$p)"; 
             $result = mysqli_query($conn, $sql);
             if ($result) {
                      header("Location: show_orders.php?success=Reservation was sucessful");
                   exit();
                }else {
                          header("Location: menu.php?error=unknown error occurred&$sql");
                       exit();
                }
        }
	}
	
}else{
	header("Location: menu.php");
	exit();
}

 ?>