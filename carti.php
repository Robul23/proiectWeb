<?php
session_start();
    include("connection.php");
    include("functions.php");
$_SESSION;

$count = get_number($conn)

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

    <div class="main-wrapper">
        <div class="book-container">
            <?php   
$index = 1;
     while($index <= $count )
          {
             ?>
            <?php
          if(!isset($_SESSION['user_id']))
          { 
             
          ?>

            <!-- cand user nu e logat -->
            <div class="books">
                <div class="img-carte">
                    <img src=<?php echo get_img($conn, $index); ?>>
                </div>
                <div class="about">
                    <h1 class="title"><?php echo get_title($conn, $index); ?></h1>
                    <h1 class="subtitle">Autor : <?php echo get_auth_name($conn, $index); ?></h1>
                    <h1 class="subtitle">Gen: <?php echo get_genre($conn, $index);?> </h1>
                    <h1 class="subtitle"> In stoc: <?php echo get_stock($conn, $index);?></h1>
                </div>

                <div class="prices">
                    <div class="price">Pret :<?php echo get_price($conn, $index);?> lei</div>


                </div>
            </div>
            <hr />

            <?php
          }
          else{
               $user_data = check_login($conn);
            ?>
            <!-- cand e logat -->
            <div class="books">
                <div class="img-carte">
                    <img src=<?php echo get_img($conn, $index); ?>>
                </div>
                <div class="about">
                    <h1 class="title"><?php echo get_title($conn, $index); ?></h1>
                    <h1 class="subtitle">Autor : <?php echo get_auth_name($conn, $index); ?></h1>
                    <h1 class="subtitle">Gen: <?php echo get_genre($conn, $index);?> </h1>
                    <h1 class="subtitle"> In stoc: <?php echo get_stock($conn, $index);?></h1>
                </div>

                <div class="prices">
                    <div class="price">Pret :<?php echo get_price($conn, $index);?> lei</div>

                    <!-- butoane de buy si de wishlist -->
                    <form action="buy_book.php" method="POST" class="buy-form">
                        <input class="buy-input" type="text" name="book_id" value="<?php echo $index ?> ">
                        <input class="buy-input" type=" text" name="user_id"
                            value="<?php echo $_SESSION['user_id'] ?> ">
                        <div class="buy"><input type="submit" value="Cumpara acum!"></input> </div>
                    </form>

                    <form action="wishlist-book.php" method="POST" class="wishlist-form">
                        <input class="buy-input" type="text" name="book_id_wish" value="<?php echo $index ?> ">
                        <input class="buy-input" type=" text" name="user_id_wish"
                            value="<?php echo $_SESSION['user_id'] ?> ">
                        <div class=" buy"> <input type="submit" value="Adauga "></input> </div>
                    </form>
                </div>
            </div>
            <hr />

            <?php
          } 
          ?>
            <?php
        $index++;
          } ?>
        </div>
    </div>
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