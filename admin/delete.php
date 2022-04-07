<?php
session_start();
include "db_conn.php";
ini_set('display_errors', 1);
     if (isset($_GET['id'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$id = validate($_GET['id']);


	$user_data = 'id='. $id;


	if (empty($id)) {
		header("Location: users.php?error=Table No is required&$user_data");
	    exit();
	}
	else{
        $delete = mysqli_query($conn, "DELETE FROM users WHERE id=$id");
        if ($delete){
                      header("Location: users.php?success=User Deleted was sucessful");
                   exit();
                }else {
                          header("Location: users.php?error=unknown error occurred&$id");
                       exit();
                }
        }
	
}else{
	header("Location: users.php");
	exit();
}

?>