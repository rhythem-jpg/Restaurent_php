<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['table_no']) && isset($_POST['no_people'])
    && isset($_POST['date']) && isset($_POST['phone'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$table_no = validate($_POST['table_no']);
	$no_people = validate($_POST['no_people']);

	$date = validate($_POST['date']);
	$phone = validate($_POST['phone']);

	$user_data = 'table_no='. $table_no. '&phone='. $phone;


	if (empty($table_no)) {
		header("Location: reservation.php?error=Table No is required&$user_data");
	    exit();
	}else if(empty($no_people)){
        header("Location: reservation.php?error=No of people is required&$user_data");
	    exit();
	}
	else if(empty($date)){
        header("Location: reservation.php?error=Date is required&$user_data");
	    exit();
	}

	else if(empty($phone)){
        header("Location: reservation.php?error=Phone is required&$user_data");
	    exit();
	}

	else{
		$num = rand(1,100);
    if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
        $user_id = $_SESSION["id"];
        $username = $_SESSION["user_name"];
        $sql = "INSERT INTO reservations VALUES($num,$table_no,$user_id, $no_people, '$date', '$username', '$phone')"; 
        $result = mysqli_query($conn, $sql);
        if ($result) {
           	 header("Location: reservation.php?success=Reservation was sucessful");
	         exit();
           }else {
	           	header("Location: reservation.php?error=unknown error occurred&$sql");
		        exit();
           }
    }
	}
	
}else{
	header("Location: reservation.php");
	exit();
}