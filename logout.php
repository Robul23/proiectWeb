<?php
session_start();
    include("connection.php");
	include("functions.php");

unset($_SESSION['user_id']);
header("Location: login.php");
?>