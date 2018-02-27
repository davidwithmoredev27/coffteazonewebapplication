<?php require "admin/connection.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--[if lt IE 9]>
        <script type="text/javascript" src="js/html5shiv.min.js"></script>
    <![endif]-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="img/logo/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="img/logo/favicon.ico" type="image/x-icon"/>
    <title>Coffteazone Cavite City</title>
    <meta property="og:url" content="http://coffteazone.com">
    <meta property="og:type" content="website">
    <meta property="og:title" content="coffteazone Cavite City">
    <meta property="og:site_name" content="Coffteazone">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" media="screen , projection">
    <link rel="stylesheet" type="text/css" href="css/materialize.min.css" media="screen , projection">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/paddingfixed.css">
    <style type="text/css">
        .indicator-item:active {
            background-color:red;
        }
        .menutitle {
            padding-left:30px;
        }
    </style>
</head>
<body id="bodyshit">
    <header class="sliderbackground" class="paddingfixed">
        <nav class="brown darken-4">
            <div class="nav-wrapper z-depth-5">
                <a href="index.php"  class="brand-logo uplogo" role="coffteazonelogo">
                    <img src="img/logo/cofftealogo.png" width="100px" height="100px" alt="">
                </a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">             
                    <li class="white-text"><a href="index.php" style="color:brown;">HOME</a></li>
                    <li class="white-text" id="showdropdown"><a href="menu.php">OUR MENU</a>
                        <div id="megadropdown" style="height:400px;left:0px;" class="row" role="coffteazonemenu">
                            <div class="dropdowndevider col l4 xl4">
                                <div class="col l12 xl12 menutitle">
                                    <h3>Drinks</h3>
                                </div>
                                <nav class="dropdowndishcategory col l12 xl12">
                                    <ul>
                                        <li class="col l12 xl12"><a href="menu/signaturedrinks.php">Signature Drinks</a></li>
                                        <li class="col l12 xl12"><a href="menu/italliansoda.php">Italian Soda</a></li>
                                        <li class="col l12 xl12"><a href="menu/fruittea.php">Fruit Tea</a></li>
                                        <li class="col l12 xl12"><a href="menu/hotdrinks.php">Hot Drinks</a></li>
                                        <li class="col l12 xl12"><a href="menu/icedcoffee.php">Iced Coffee</a></li>
                                        <li class="col l12 xl12"><a href="menu/frappucino.php">Frappucino</a></li>
                                        <li class="col l12 xl12"><a href="menu/yakultdrinks.php">Yakult Drinks</a></li>
                                        <li class="col l12 xl12"><a href="menu/milktea.php">Milk Tea</a></li>
                                        <li class="col l12 xl12"><a href="menu/smoothies.php">Smoothies</a></li>
                                        <li class="col l12 xl12"><a href="menu/cocktails.php">Cocktails</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="dropdowndevider col l4 xl4">
                                <div class="col l12 xl12 menutitle">
                                    <h3>Foods</h3>
                                </div>
                                <nav class="dropdowndishcategory col l12 xl12">
                                    <ul>
                                        <li class="col l12 xl12"><a href="menu/starter.php">Starter</a></li>
                                        <li class="col l12 xl12"><a href="menu/burger_and_sandwiches.php">Burger and Sandwiches</a></li>
                                        <li class="col l12 xl12"><a href="menu/pizza.php">Pizza</a></li>
                                        <li class="col l12 xl12"><a href="menu/soup.php">Soup</a></li>
                                        <li class="col l12 xl12"><a href="menu/maincourse.php">Main Course</a></li>
                                        <li class="col l12 xl12"><a href="menu/groupmeals.php">Group Meals</a></li>
                                        <li class="col l12 xl12"><a href="menu/platter.php">Platter</a></li>
                                        <li class="col l12 xl12"><a href="menu/pasta.php">Pasta</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="dropdowndevider col l4 xl4">
                                <div class="col l12 xl12 menutitle">
                                    <h3>Desserts</h3>
                                </div>
                                <nav class="dropdowndishcategory col l12 xl12">
                                    <ul>
                                        <li class="col l12 xl12"><a href="menu/dessert.php">Dessert</a></li>
                                </ul>
                                </nav>
                            </div>
                        </div>
                    </li>
                    <li class="white-text"><a href="services.php">SERVICES</a></li>
                    <li class="white-text"><a href="gallery.php">GALLERY</a></li>
                    <li class="white-text"><a href="contactus.php">CONTACT US</a></li>
                    <li class="white-text"><a href="faq.php">FAQ</a></li>
                    <li class="white-text"><a href="aboutus.php">ABOUT US</a></li>
                </ul>
                 <ul class="side-nav brown darken-3" id="mobile-demo">
                    <li><a style="color:brown;" href="index.php">HOME</a></li>
                    <li><a class="white-text" href="menu.php">OUR MENU</a></li>
                    <li><a class="white-text" href="services.php">SERVICES</a></li>
                    <li><a class="white-text" href="gallery.php">GALLERY</a></li>
                    <li><a class="white-text" href="contactus.php">CONTACT US</a></li>
                    <li><a class="white-text" href="faq.php">FAQ</a></li>
                    <li><a class="white-text" href="aboutus.php">ABOUT US</a></li>
                </ul>
            </div> 
        </nav>
        <div class="row">
            <div class="slider">
                <ul class="slides">
                    <?php
                        $sql = "SELECT * FROM tbl_slider";
                        $result = mysqli_query($connection , $sql);
            
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "\t\t\t<li>". "<img src=\"". $row['path']."\"></li>\n";
                        }
                    ?>
                </ul>
            </div>
        </div>
    </header>
    <main class="paddingfixed">
        <div class="row">
            <div class="col s12 m12 l5 xl5">
                <div class="newproduct">
                    <div class="header">
                        <h2 class="center-align">New Products.</h2>
                    </div>
                    <div class="row">
                        <?php
                            $sql = "SELECT * FROM tbl_newproduct";
                            $newproductQuery = mysqli_query($connection , $sql);                            
                            if (isset($newproductQuery)) {
                                if (mysqli_num_rows($newproductQuery) > 0) {
                                    while ($newproductrow = mysqli_fetch_assoc($newproductQuery)) {
                                        echo "\t\t\t<div class=\"col s12 m12 xl12 l12\">\n";
                                        echo "\t\t\t\t<a href=\"newproduct.php\">\n";
                                        echo "\t\t\t\t\t<img src=". $newproductrow['image'] . " width=\"100%\" height=\"30%\">\n";
                                        echo "\t\t\t\t</a>\n";
                                        echo "\t\t\t\t<div class=\"container producttitle\">\n";
                                        echo "\t\t\t\t\t<h4 class=\"center-align\">".$newproductrow['title'] . "</h4>\n";
                                        echo "\t\t\t\t</div>\n"; 
                                        echo "\t\t\t</div>\n";
                                    }
                                }
                            } else if (!@mysqli_query($connection , $sql)) {
                                // die("theres an error".mysqli_connect_error());
                            }
                           // mysqli_close($connection);
                        ?>
                    </div>
                </div>
                <div class="promos">
                    <div class="header">
                        <h2 class="center-align">Our Promos</h2>
                    </div>
                    <div class="row">
                        <?php 
                            $sql = "SELECT * FROM tbl_promos";
                            $promoQuery = mysqli_query($connection , $sql);
                            if (isset($promoQuery)) {
                                if (mysqli_num_rows($promoQuery) > 0) {
                                    while ($promorow = mysqli_fetch_assoc($promoQuery)) {
                                        echo "\t\t\t<div class=\"col s12 m12 xl12 l12\">\n";
                                        echo "\t\t\t\t<a href=\"promos.php\">\n";
                                        echo "\t\t\t\t\t<img src=". $promorow['image'] . " width=\"100%\" height=\"30%\">\n";
                                        echo "\t\t\t\t</a>\n";
                                        echo "\t\t\t\t<div class=\"container producttitle\">\n";
                                        echo "\t\t\t\t\t<h4 class=\"center-align\">". $promorow['title'] . "</h4>\n";
                                        echo "\t\t\t\t</div>\n"; 
                                        echo "\t\t\t</div>\n";
                                    }
                                }
                            } else if (!@mysqli_query($connection , $sql)) {
                                // die("theres an error".mysqli_connect_error());
                            }
                            //mysqli_close($connection);
                        ?>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l7 xl7">
                <div class="container bestsellertitle">
                    <h2 class="center-align">Our Bestseller</h2>
                </div>
                <div class="row">
                    <?php
                        $sql = "SELECT * FROM tbl_bestseller";
                        $sellerQuery = mysqli_query($connection , $sql);
                        if (isset($sellerQuery)) {
                            if (mysqli_num_rows($sellerQuery) > 0 ) {
                                while($sellerrow = mysqli_fetch_assoc($sellerQuery)) { 
                                    echo "\t\t\t\t\t<div class=\"col s12 m12 l6 xl6\">";
                                    echo "\n\t\t\t\t\t\t<div class=\"col s12 m12 l12 xl12 sellerimg\" style=\"padding:0px;\">\n";
                                    echo "\t\t\t\t\t\t\t<img class=\"materialboxed\" data-caption=\"". $sellerrow['caption']. "\" src=\"img/home/bestsellerimages/". $sellerrow['image']."\" height=\"200px\" width=\"100%\">\n";
                                    echo "\t\t\t\t\t\t</div>\n";
                                    echo "\t\t\t\t\t\t<div class=\"sellertitle col s12 m12 l12 xl12\">\n";
                                    echo "\t\t\t\t\t\t\t<h3 class=\"center-align\">".$sellerrow['title'] ."</h3>\n";
                                    echo "\t\t\t\t\t\t</div>\n";
                                    
                                    echo "\t\t\t\t\t\t<div class=\"row\"><div class=\"col s12 m12 l6 xl6\"></div></div>\n";
                                     echo "\t\t\t\t\t\t<div class=\"row\"><div class=\"col s12 m12 l6 xl6\"></div></div>\n";
                                    echo "\t\t\t\t\t</div>\n";
                                }
                            }
                        } else if (!@mysqli_query($connection , $sql)) {
                                die("theres an error".mysqli_connect_error());
                        }
                        mysqli_close($connection);
                    ?>
                </div>
            </div>
        </div>
    </main>
    <footer  class="page-footer brown darken-4">
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <span class="col s12 m12 l6 xl6 center-align">&copy; <?php echo htmlspecialchars(date("Y")) . " "."Coffteazone";?></span>
                    <a class="grey-text text-lighten-4 col s12 m12 l6 xl6 center-align" href="#!">http://www.coffteazone.com</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- for development javascript file -->
    <script  type="text/javascript" src="js/jquery.min.js"></script>
    <script  type="text/javascript" src="js/materialize.min.js"></script>

    <!-- for production ready javascript file -->
    <!-- uncomment all the script for production used -->
    <!-- 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js" type="text/javascript"></script>
     -->
    <script src="js/main.js" type="text/javascript"></script>
</body>
</html>