<?php
session_start();

	include("connection.php");
	include("functions.php");


if($_SERVER['REQUEST_METHOD'] == "POST"){
$book_id= $_POST['book_id'];
$user_id= $_POST['user_id'];


$query= "INSERT INTO ORDERS VALUES (NULL,'$user_id', '$book_id')";
$result= mysqli_query($conn,$query);
if(empty($result)){
echo 'eroare';
}


$query2 = "UPDATE books SET nr_copies = nr_copies - 1 WHERE book_id='$book_id'";
$result2= mysqli_query($conn,$query2);
if(empty($result2)){
echo 'eroare';
}

header("Location:carti.php");
}