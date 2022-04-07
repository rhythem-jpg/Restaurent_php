<?php 
session_start(); 
include "db_conn.php";

if (isset($_FILES['userfile']) && isset($_POST['food_name'])&& isset($_POST['price']) && isset($_POST['description'])) {
	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
    $food_image = $_FILES['userfile'];
	$food_name = validate($_POST['food_name']);
	$price = validate($_POST['price']);
	$description = validate($_POST['description']);
	$user_data = 'food_name='. $food_name. '&price='. $price;
	if (empty($food_image)) {
		header("Location: index.php?error=Food_Image No is required&$user_data");
	    exit();
	}else if(empty($food_name)){
        header("Location: index.php?error=Food Name of people is required&$user_data");
	    exit();
	}
	else if(empty($price)){
        header("Location: index.php?error=Price is required&$user_data");
	    exit();
	}
	else if(empty($description)){
        header("Location: index.php?error=description is required&$user_data");
	    exit();
	}
	else{
    $uploaddir = '/home/rohith/Desktop/Cyber-sec/php_class/admin/uploads/';
    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
    $filename = $_FILES["userfile"]["name"];
        $user_id = $_SESSION["id"];
        $username = $_SESSION["user_name"];
    if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
        $number = rand(1,100);
        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
            $userlocation = "/uploads/$filename";
            $sql = "INSERT INTO food_menu VALUES($number,'$food_name',$price, '$description', '$userlocation')"; 
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("Location: index.php?success=Food Added Sucessfully was sucessful");
                exit();
            }else {
                    header("Location: index.php?error=unknown error occurred&$sql");
                    exit();
            }
    } else{
        $error = $_FILES['userfile']['error'];
        header("Location: index.php?error=File Upload&$error");
        exit();
    }
    }else{
                header("Location: index.php?error=Session Error&$user_id");
        exit();
    }
	}
	
}else{
	header("Location: home.php?error=Inputs Not Passed");
	exit();
}