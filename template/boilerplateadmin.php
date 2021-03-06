<?php require "connection.php"; ?>
<?php 

    // check if there already login admin 
    if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
        header("location:login.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!--[if lt IE 9]>
        <script type="text/javascript" src="../js/html5shiv.min.js"></script>
    <![endif]-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../img/logo/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="../img/logo/favicon.ico" type="image/x-icon" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"
        media="screen , projection">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <style type="text/css">
        .indicator-item:active {
            background-color: red;
        }

        .menutitle {
            padding-left: 30px;
        }
    </style>
</head>

<body>
    <header class="sliderbackground">
        <nav class="brown darken-4 ">
            <div class="nav-wrapper">
                <a href="home.php" class="brand-logo uplogo" role="coffteazonelogo">
                    <img src="../img/logo/cofftealogo.png" width="100px" height="100px" alt="">
                </a>
                <a href="#" data-activates="mobile-demo" class="button-collapse">
                    <i class="material-icons">menu</i>
                </a>
                <ul class="right hide-on-med-and-down">
                    <li class="white-text">
                        <a href="home.php">HOME</a>
                    </li>
                    <li class="white-text" id="showdropdown">
                        <a href="menu.php">OUR MENU</a>
                        <div id="megadropdown" style="height:400px;left:0px;" class="row" role="coffteazonemenu">
                            <div class="dropdowndevider col l4 xl4">
                                <div class="col l12 xl12 menutitle">
                                    <h3>Drinks</h3>
                                </div>
                                <nav class="dropdowndishcategory col l12 xl12">
                                    <ul>
                                        <li class="col l12 xl12">
                                            <a href="menu/signaturedrinks.php">Signature Drinks</a>
                                        </li>
                                        <li class="col l12 xl12">
                                            <a href="menu/italliansoda.php">Italian Soda</a>
                                        </li>
                                        <li class="col l12 xl12">
                                            <a href="menu/fruittea.php">Fruit Tea</a>
                                        </li>
                                        <li class="col l12 xl12">
                                            <a href="menu/hotdrinks.php">Hot Drinks</a>
                                        </li>
                                        <li class="col l12 xl12">
                                            <a href="menu/icedcoffee.php">Iced Coffee</a>
                                        </li>
                                        <li class="col l12 xl12">
                                            <a href="menu/frappucino.php">Frappucino</a>
                                        </li>
                                        <li class="col l12 xl12">
                                            <a href="menu/yakultdrinks.php">Yakult Drinks</a>
                                        </li>
                                        <li class="col l12 xl12">
                                            <a href="menu/milktea.php">Milk Tea</a>
                                        </li>
                                        <li class="col l12 xl12">
                                            <a href="menu/smoothies.php">Smoothies</a>
                                        </li>
                                        <li class="col l12 xl12">
                                            <a href="menu/cocktails.php">Cocktails</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="dropdowndevider col l4 xl4">
                                <div class="col l12 xl12 menutitle">
                                    <h3>Foods</h3>
                                </div>
                                <nav class="dropdowndishcategory col l12 xl12">
                                    <ul>
                                        <li class="col l12 xl12">
                                            <a href="menu/starter.php">Starter</a>
                                        </li>
                                        <li class="col l12 xl12">
                                            <a href="menu/burger_and_sandwiches.php">Burger and Sandwiches</a>
                                        </li>
                                        <li class="col l12 xl12">
                                            <a href="menu/pizza.php">Pizza</a>
                                        </li>
                                        <li class="col l12 xl12">
                                            <a href="menu/soup.php">Soup</a>
                                        </li>
                                        <li class="col l12 xl12">
                                            <a href="menu/maincourse.php">Main Course</a>
                                        </li>
                                        <li class="col l12 xl12">
                                            <a href="menu/groupmeals.php">Group Meals</a>
                                        </li>
                                        <li class="col l12 xl12">
                                            <a href="menu/platter.php">Platter</a>
                                        </li>
                                        <li class="col l12 xl12">
                                            <a href="menu/pasta.php">Pasta</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="dropdowndevider col l4 xl4">
                                <div class="col l12 xl12 menutitle">
                                    <h3>Desserts</h3>
                                </div>
                                <nav class="dropdowndishcategory col l12 xl12">
                                    <ul>
                                        <li class="col l12 xl12">
                                            <a href="menu/dessert.php">Dessert</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </li>
                    <li class="white-text">
                        <a href="services.php">SERVICES</a>
                    </li>
                    <li class="white-text">
                        <a href="gallery.php">GALLERY</a>
                    </li>
                    <li class="white-text">
                        <a href="contactus.php">CONTACT US</a>
                    </li>
                    <li class="white-text">
                        <a href="faq.php">FAQ</a>
                    </li>
                    <li class="white-text">
                        <a href="aboutus.php">ABOUT US</a>
                    </li>
                    <li>
                        <a href="settings.php">SETTINGS</a>
                    </li>
                    <li>
                        <a class="white-text" href="logout.php">Log out
                            <?php echo "<span>" . $_SESSION['username']."</span>"; ?>
                        </a>
                    </li>
                </ul>
                <ul class="side-nav brown darken-3" id="mobile-demo">
                    <li>
                        <a class="white-text" href="index.php">HOME</a>
                    </li>
                    <li>
                        <a class="white-text" href="menu.php">OUR MENU</a>
                    </li>
                    <li>
                        <a class="white-text" href="services.php">SERVICES</a>
                    </li>
                    <li>
                        <a class="white-text" href="gallery.php">GALLERY</a>
                    </li>
                    <li>
                        <a class="white-text" href="contactus.php">CONTACT US</a>
                    </li>
                    <li>
                        <a class="white-text" href="faq.php">FAQ</a>
                    </li>
                    <li>
                        <a class="white-text" href="aboutus.php">ABOUT US</a>
                    </li>
                    <li>
                        <a class="white-text" href="logout.php">Log out
                            <?php echo "<span>" . $_SESSION['username']."</span>"; ?>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
    </main>
    <div class="row" id="">
    </div>
    <footer class="page-footer brown darken-4">
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <span class="col s12 m12 l6 xl6 center-align">&copy;
                        <?php echo htmlspecialchars(date("Y")) . " "."Coffteazone";?>
                    </span>
                    <a class="grey-text text-lighten-4 col s12 m12 l6 xl6 center-align" href="#!">http://www.coffteazone.com</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- for development javascript file -->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>

    <!-- for production ready javascript file -->
    <!-- uncomment all the script for production used -->
    <!-- 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js" type="text/javascript"></script>
     -->
    <script src="../js/main.js" type="text/javascript"></script>
    <script src="../js/validation.js" type="text/javascript"></script>
</body>

</html>