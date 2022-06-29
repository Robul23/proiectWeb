<?php
session_start();
    include("connection.php");
    include("functions.php");
$_SESSION;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>Robu Library</title>
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

    <!-- body -->
    <?php
    if(!isset($_SESSION['user_id']))
    {
    ?>
    <h1 class="wish-title">Trebuie sa fii logat pentru a avea acces la wishlist</h1>
    <?php
    }
     else{
               $user_data = check_login($conn);
            ?>


    <div class="wrapper"></div>
    <h1 class="wish-title">Buna <?php echo $user_data['username'];?></h1>
    <h1 class="wish-title">Acesta este wishlist-ul tau</h1>
    <div class="tabel-container">
        <table class="wish-table">
            <tr>
                <th>Id Wishlist</th>
                <th>Titlu carte</th>
                <th>Pret carte</th>
                <th>Nume autor</th>
            </tr>
            <?php echo wishlistTable($conn, $user_data['user_id']); ?>

        </table>
    </div>
    <?php
          }
          ?>

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