<?php require "../admin/connection.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--[if lt IE 9]>
        <script type="text/javascript" src="js/html5shiv.min.js"></script>
    <![endif]-->
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../img/logo/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="../img/logo/favicon.ico" type="image/x-icon"/>
    <title>Our Menu | Frapuccino</title>
    <meta property="og:url" content="http://coffteazone.com">
    <meta property="og:type" content="website">
    <meta property="og:title" content="coffteazone Cavite City">
    <meta property="og:site_name" content="Coffteazone">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" media="screen , projection">
    <!-- <link rel="stylesheet" type="text/css" href="../css/materialize.min.css" media="screen , projection"> -->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/paddingfixed.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">

</head>
<body id="bodyshit">
    <header>
        <nav class="brown darken-4">
            <div class="nav-wrapper z-depth-5">
                <a href="../index.php"  class="brand-logo uplogo" role="coffteazonelogo">
                    <img src="../img/logo/cofftealogo.png" width="100px" height="100px" alt="">
                </a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">             
                    <li class="white-text"><a href="../index.php" >HOME</a></li>
                    <li class="white-text" id="showdropdown"><a style="color:brown;" href="../menu.php">OUR MENU</a>
                         <div id="megadropdown" style="height:400px;left:-1px;" class="row" role="coffteazonemenu">
                            <div class="dropdowndevider col l3 xl3 offset-l1 offset-xl1">
                                <div class="col l12 xl12 menutitle">
                                    <h3>Foods</h3>
                                </div>
                                <nav class="dropdowndishcategory col l12 xl12">
                                    <ul>
                                        <li class="col l12 xl12"><a href="starter.php">Starter</a></li>
                                        <li class="col l12 xl12"><a href="burger_and_sandwiches.php">Burger and Sandwiches</a></li>
                                        <li class="col l12 xl12"><a href="pizza.php">Pizza</a></li>
                                        <li class="col l12 xl12"><a href="soup.php">Soup</a></li>
                                        <li class="col l12 xl12"><a href="maincourse.php">Main Course</a></li>
                
                                        <li class="col l12 xl12"><a href="platter.php">Platter</a></li>
                                        <li class="col l12 xl12"><a href="pasta.php">Pasta</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="dropdowndevider col l4 xl4 offset-l1 offset-xl1">
                                <div class="col l12 xl12 menutitle">
                                    <h3>Drinks</h3>
                                </div>
                                <nav class="dropdowndishcategory col l12 xl12">
                                    <ul>
                                        <li class="col l12 xl12"><a href="signaturedrinks.php">Signature Drinks</a></li>
                                        <li class="col l12 xl12"><a href="italliansoda.php">Italian Soda</a></li>
                                        <li class="col l12 xl12"><a href="fruittea.php">Fruit Tea</a></li>
                                        <li class="col l12 xl12"><a href="hotdrinks.php">Hot Drinks</a></li>
                                        <li class="col l12 xl12"><a href="icedcoffee.php">Iced Coffee</a></li>
                                        <li class="col l12 xl12"><a href="frappucino.php">Frappucino</a></li>
                                        <li class="col l12 xl12"><a href="yakultdrinks.php">Yakult Drinks</a></li>
                                        <li class="col l12 xl12"><a href="milktea.php">Milk Tea</a></li>
                                        <li class="col l12 xl12"><a href="smoothies.php">Smoothies</a></li>
                                        <li class="col l12 xl12"><a href="cocktails.php">Cocktails</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="dropdowndevider col xl1 l1">
                                <div class="col l12 xl12 menutitle">
                                    <h3>Desserts</h3>
                                </div>
                                 <nav class="dropdowndishcategory col l12 xl12">
                                    <ul>
                                        <li><a href="muffins">Muffins</a></li>
                                        <li><a href="cakes.php">Cakes</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </li>
                    <li class="white-text"><a href="../services.php">SERVICES</a></li>
                    <li class="white-text"><a href="../gallery.php">GALLERY</a></li>
                    <li><a class="white-text" href="../aboutus.php">ABOUT US</a></li>
                    <li><a class="white-text" href="../faq.php">FAQ'S</a></li>
                    <li><a class="white-text" href="../contactus.php">CONTACT US</a></li>
                </ul>
                 <ul class="side-nav brown darken-3" id="mobile-demo">
                    <li><a class="white-text" href="../index.php">HOME</a></li>
                    <li><a style="color:brown;"  href="../menu.php">OUR MENU</a></li>
                    <li><a class="white-text" href="../services.php">SERVICES</a></li>
                    <li><a class="white-text" href="../gallery.php">GALLERY</a></li>
                    <li><a class="white-text" href="../aboutus.php">ABOUT US</a></li>
                    <li><a class="white-text" href="../faq.php">FAQ'S</a></li>
                    <li><a class="white-text" href="../contactus.php">CONTACT US</a></li>
                </ul>
            </div> 
        </nav>

    </header>
    <main>
        <div class="row">
            <div class="col s12 m12 l12 xl12">
                <h3 class="center-align individualtitle">Hot drinks</h3>
            </div>
            <div class="row">
                <div class="col s12 m12 l12 xl12">
                    <div class="row menumaincontainer">
                        <?php
                            $sql = "SELECT * FROM tbl_menu_hotdrinks";
                            $result = mysqli_query($connection , $sql);
                            while ($rows = mysqli_fetch_assoc($result)) {
                                $title = $rows['title'];
                                $path = $rows['path'];
                                $price = $rows['oz12price'];
                                $caption = $rows['caption'];
                                echo "<div class=\"left-align col s12 m12 l2 xl2\" style=\"margin-bottom:10px;\">\n";
                                echo "<div class=\"borderstyle\" style=\"padding:10px;\">\n";
                                echo "<img width=\"100%\" class=\"menuimagestyle\" src=\""."../". $path . "\">\n";
                                echo "<h5 class='center-align' style=\"font-size:1.1em;\">$title</h5>\n";
                                echo "<h6 class='center-align'>&#8369;$price</h6>\n";
                                echo "<p class='center-align'>$caption</p>\n";
                                echo "</div>\n";
                                echo "</div>\n";
                            }
                        ?>
                      
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php 
        $sql = "SELECT address FROM tbl_contact_details";
        $result = mysqli_query($connection , $sql);
        
        while ($rows = mysqli_fetch_assoc($result)) {
            $address = $rows['address'];

        }
    
    ?>
    <footer  class="page-footer brown darken-4">
        <div class="row">
            <span class="col s12 m12 l4 xl4 offset-xl1 offset-l1">&copy; <?php echo htmlspecialchars(date("Y")) . " "."Coffteazone";?></span>
            <span class="col s12 m12 xl4 l4"><?php echo $address; ?></span>
            <a href="https://www.facebook.com/CoffteaZone" class="col s12 m2 l3 xl3 center-align"><img src="../img/logo/FACEBOOKLOGO.png" width="30px" height="100%" alt=""></a>
        </div>
    </footer>
    <!-- for development javascript file -->
    <!-- <script  type="text/javascript" src="../js/jquery.min.js"></script>
    <script  type="text/javascript" src="../js/materialize.min.js"></script> -->

    <!-- for production ready javascript file -->
    <!-- uncomment all the script for production used -->
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js" type="text/javascript"></script>
    
    <script src="js/main.js" type="text/javascript"></script>
</body>
</html>

