<?php
session_start();

	include("connection.php");
	include("functions.php");


if($_SERVER['REQUEST_METHOD'] == "POST"){
$book_id= $_POST['book_id_wish'];
$user_id= $_POST['user_id_wish'];


$query= "INSERT INTO wishlist VALUES (NULL,'$book_id', '$user_id')";
$result= mysqli_query($conn,$query);
if(empty($result)){
echo 'eroare';
}
header("Location:carti.php");
}