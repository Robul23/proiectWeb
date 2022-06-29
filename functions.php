<?php

function check_login($conn)
{

	if(isset($_SESSION['user_id']))
	{

		$id = $_SESSION['user_id'];
		$query = "select * from clients where user_id = '$id' limit 1";

		$result = mysqli_query($conn,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location:/proiectWeb/login.html");
	die;

}function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}

//functie tabel wishlist

function wishlistTable($conn, $client_id)
{
	$query = "SELECT wishlist_id, book_title, price, author_name 
			  FROM wishlist INNER JOIN books 
			  ON wishlist.book_id=books.book_id
			  INNER JOIN authors ON authors.author_id=books.author_id
			  WHERE wishlist.client_id='$client_id'";

			

	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	    while ($row = mysqli_fetch_array($result)) {

        echo "<tr><td>" . 
		$row['wishlist_id'] . "</td><td>" . 
		$row['book_title'] . "</td><td>" . 
		$row['price'] . "</td><td>" . 
		$row['author_name'] . "</td></tr>";
    }
}

function orderTable($conn, $client_id)
{
	$query = "SELECT order_id, book_title, price, author_name 
			  FROM orders INNER JOIN books 
			  ON orders.book_id=books.book_id
			  INNER JOIN authors ON authors.author_id=books.author_id
			  WHERE orders.client_id='$client_id'";

			

	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	    while ($row = mysqli_fetch_array($result)) {

        echo "<tr><td>" . 
		$row['order_id'] . "</td><td>" . 
		$row['book_title'] . "</td><td>" . 
		$row['price'] . "</td><td>" . 
		$row['author_name'] . "</td></tr>";
    }
}

//functie tabel cumparare

//functie cummparare produse

//functie get title
 function get_title($conn, $id)
{   
        $query = "SELECT book_title FROM books WHERE book_id='$id'";
		$result = mysqli_query($conn, $query);
		$data = mysqli_fetch_assoc($result) or die(mysqli_error($conn));
		$name = $data['book_title'];
    	return $name;

}

// FUNCTIE GET PRICE
 function get_price($conn, $id)
{   
        $query = "SELECT price FROM books WHERE book_id='$id'";
		$result = mysqli_query($conn, $query);
		$data = mysqli_fetch_assoc($result) or die(mysqli_error($conn));
		$price = $data['price'];
    	return $price;

}
//FUNCTIE GET AUTHOR
function get_auth_name($conn, $id)
{
	$query = "SELECT author_name FROM authors INNER JOIN books
		ON authors.author_id=books.author_id WHERE books.book_id='$id'";
		$result = mysqli_query($conn, $query);
		$data = mysqli_fetch_assoc($result) or die(mysqli_error($conn));
		$name = $data['author_name'];
    	return $name;

}
// FUNCTIE GET GEN
 function get_genre($conn, $id)
{   
        $query = "SELECT genre FROM books WHERE book_id='$id'";
		$result = mysqli_query($conn, $query);
		$data = mysqli_fetch_assoc($result) or die(mysqli_error($conn));
		$genre = $data['genre'];
    	return $genre;

}

// FUNTIE GET STOCK
 function get_stock($conn, $id)
{   
        $query = "SELECT nr_copies FROM books WHERE book_id='$id'";
		$result = mysqli_query($conn, $query);
		$data = mysqli_fetch_assoc($result) or die(mysqli_error($conn));
		$stock = $data['nr_copies'];
    	return $stock;

}

function get_img($conn, $id)
{   
        $query = "SELECT poza FROM books WHERE book_id='$id'";
		$result = mysqli_query($conn, $query);
		$data = mysqli_fetch_assoc($result) or die(mysqli_error($conn));
		$img = $data['poza'];
    	return $img;

}

function get_number($conn)
{
 $query = "SELECT COUNT(*) FROM books";
		$result = mysqli_query($conn, $query);
		$data = mysqli_fetch_assoc($result) or die(mysqli_error($conn));
		$count = $data['COUNT(*)'];
    	return $count;
}




 