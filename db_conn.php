<?php

$sname= "localhost";
$unmae= "rohith";
$password = "Sairohith@9";

$db_name = "php";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}