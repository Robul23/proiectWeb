<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$username = $_POST['username'];
		$email = $_POST['email'];
        $password = $_POST['password'];
		$lastname = $_POST['last_name'];
        $firstname = $_POST['first_name'];
		$adress = $_POST['adress'];
        $phone = $_POST['phone'];

		if(!empty($username) && !empty($email) &&  !empty($password) && !empty($lastname) && !empty($firstname) && !empty($adress) && !empty($phone))
		{

			
			$query = $conn->prepare("INSERT INTO clients VALUES (null,'$username','$password' ,'$lastname' ,'$firstname','$email','$adress','$phone' )");

			
            $query->execute();
            $query->close();

			header("Location:login.php");
			die;
		}else
		{
			echo "Eroare la introducerea datelor";
		}
	}
    else
    {
			echo "Eroare generala";
	}
	?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>RobuLibrary</title>
</head>

<body>
    <nav class="navbar">
        <img src="imgs/logobook.png" class="logo-class" alt="Logo">
        <div class="brand-title">Robu's Library</div>
        <a href="#" class="toggle-btn" id="toggle-btn">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>
        <div class="navbar-links" id="navbar-links">
            <ul>
                <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="carti.php"> <i class="fas fa-book-open"></i> Carti</a></li>
                <li><a href="cos.php"> <i class="fas fa-star"></i> Wishlist</a></li>
                <li><a href="login.php"> <i class="fas fa-sign-in-alt"></i> Login</a></li>
                <li><a href="about.php"> <i class="fas fa-address-card"></i> Despre noi </a></li>
                <li><a href="login.php"> <i class="fas fa-user-circle"></i> Contul tau</a></li>
            </ul>
        </div>
    </nav>

    <div class="login">
        <h1 class="login-title">Bine ati venit</h1>
        <form class="login-form" action="signup.php" method="POST">
            <input type="text" id="username" placeholder="Username" name="username" />
            <input type="email" id="email" placeholder="Email" name="email" />
            <input type="password" id="password" placeholder="Parola" name="password" />
            <input type="text" id="nume" placeholder="Nume" name="last_name" />
            <input type="text" id="prenume" placeholder="Prenume" name="first_name" />
            <input type="text" id="addres" placeholder="Adresa" name="adress" />
            <input type="tel" id="phone" placeholder="Telefon" name="phone" />
            <button type="submit">Inregistreaza-te</button>
        </form>
    </div>

    <footer class="footer">
        <div class="footer-links" id="footer-links">
            <ul>
                <li><img src="imgs/logobook.png" alt="Logo" /></li>
                <li><img src="imgs/instagram.png" alt="Instagram" /></li>
                <li><img src="imgs/facebook.png" alt="Facebook" /></li>
                <li><img src="imgs/unitbv.PNG" alt="Unitbv" /></li>
            </ul>
        </div>
    </footer>
</body>

</html>