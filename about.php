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
    <h1 class="about-title">About us</h1>
    <div class="container-about">
        <div class="about-text">
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem
                quibusdam cupiditate iusto id fugit, quo vitae maxime non illum
                ratione nam doloribus soluta earum porro sunt esse debitis quam ipsum?
                Quia quibusdam exercitationem rem vitae quidem optio cumque explicabo
                accusantium a autem! Debitis deserunt aliquid repudiandae quasi illum,
                quis voluptates saepe! Vitae veniam illo delectus nihil unde corporis
                amet explicabo? Laboriosam, repellat? Cupiditate sunt sequi maiores
                enim eos ullam voluptates consequuntur! Quam nesciunt officiis ipsum
                rem eum architecto dolorem, enim dicta voluptatibus, tempora corporis
                alias nihil. Ipsam porro natus similique? Eius fugit quis quo minima
                praesentium enim omnis iste aperiam cumque alias, autem laborum
                molestias provident eaque reiciendis, nulla maiores, itaque dolor
                temporibus. Numquam aspernatur, at est officia nobis laudantium. Quam,
                rerum odio est aut itaque laborum architecto! Ipsam, sapiente
                reiciendis, soluta ad doloremque provident modi doloribus labore et
                error voluptatem. Nemo nihil aperiam harum illum dicta rerum unde
                dignissimos.
            </p>
        </div>

        <div class="slideshow-container">


            <div class="mySlides fade">
                <img src="imgs/books/slider1.jpg" style="width:100%">
            </div>
            <div class="mySlides fade">
                <img src="imgs/books/slider2.jpg" style="width:100%">
            </div>
            <div class="mySlides fade">
                <img src="imgs/books/slider3.jpg" style="width:100%">
            </div>

            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
            <div class="dots">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>

        </div>
        <script src="slider.js"></script>

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