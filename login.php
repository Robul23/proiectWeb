<?php 

session_start();

	include("connection.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query = "select * from clients where username = '$username' limit 1";
		$qres = mysqli_query($conn, $query);

		if(!empty($qres))
		{
				$user_data = mysqli_fetch_assoc($qres);
				if($user_data['password'] === $password && $user_data['username']===$username)
				{
					$_SESSION['user_id'] = $user_data['user_id'];
					header("Location:index.php");
				}
                 else
                {
                    echo "Username/parola incorecta";
                }
		}
        else
        {
            echo "Nu lasa campuri goale";
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
    <title>RobuLibrary</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar">
        <img src="imgs/logobook.png" class="logo-class" alt="Logo">
        <div class="brand-title">Robu's Library</div>
        <div class="navbar-links" id="navbar-links">
            <ul>
                <?php
          if(!isset($_SESSION['user_id']))
          { 
             
          ?>
                <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="carti.php"> <i class="fas fa-book-open"></i> Carti</a></li>
                <li><a href="cos.php"> <i class="fas fa-star"></i> Wishlist</a></li>
                <li><a href="login.php"> <i class="fas fa-sign-in-alt"></i> Login</a></li>
                <li><a href="about.php"> <i class="fas fa-address-card"></i> Despre noi </a></li>
                <li><a href="login.php"> <i class="fas fa-user-circle"></i> Contul tau</a></li>
                <?php
          }
          else{
               $user_data = check_login($conn);
            ?>
                <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="carti.php"> <i class="fas fa-book-open"></i> Carti</a></li>
                <li><a href="cos.php"> <i class="fas fa-star"></i> Wishlist</a></li>
                <li><a href="login.php"> <i class="fas fa-sign-in-alt"></i> Login</a></li>
                <li><a href="about.php"> <i class="fas fa-address-card"></i> Despre noi </a></li>
                <li>
                    <a href="account.php"><i class="fas fa-user-circle"></i> <?php echo $user_data['username'];?></a>
                </li>
                <li><a href="logout.php"> <i class="fas fa-sign-out-alt"></i> Log out</a></li>
                <?php
          } 
          ?>
            </ul>
        </div>
    </nav>

    <div class="login">
        <h1 class="login-title">Bine ati venit</h1>
        <form class="login-form" method="POST">
            <input type="text" id="username" placeholder="Username" name="username" />
            <input type="password" id="password" placeholder="Parola" name="password" />
            <button type="submit">Log in</button>
            <p>Nu ai un cont?</p>
            <a href="signup.php">Creeaza-ti unul acum!</a>
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