<?php require "admin/connection.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="img/logo/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="img/logo/favicon.ico" type="image/x-icon"/>
    <title>Our Menu | Coffteazone</title>
    <meta property="og:url" content="http://coffteazone.com">
    <meta property="og:type" content="website">
    <meta property="og:title" content="coffteazone Cavite City">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" media="screen , projection">
    <!-- <link rel="stylesheet" type="text/css" href="css/materialize.min.css" media="projection,screen"> -->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/paddingfixed.css"> 
    <!-- <link rel="stylesheet" type="text/css" href="css/slick.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" /> -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style type="text/css">
        .indicator-item:active {
            background-color:red;
        }
        .menutitle {
            padding-left:30px;
        }
         h3, h5 , h6 {
            color:white;
        }
        h2 {
            color:white;
            font-size:2.8em;
            text-transform:uppercase;
            text-align:left !important;
        }
        h3 {
            font-size:2.6em;
        }


        @media only screen and (min-width:1024px) and (max-height:1350px) {
            .menuimg p {
                font-size:.7rem !important;
            }
        }
    
    </style>
</head>
<body>
    <noscript class="no-js">
       <div class="row">
           <div class="col s12 m12 l12 xl12">
               <h1 class="center-align">Please enable javascript on your web browser!</h1>
                <p class="center-align">Our website will not function correctly if javascript is disabled.</p>
           </div>
       </div>
    </noscript>
    <header>
        <nav class="brown darken-4">
            <div class="nav-wrapper z-depth-5">
                <a href="index.php"  class="brand-logo uplogo" role="coffteazonelogo">
                    <img src="img/logo/cofftealogo.png" width="100px" height="100px" alt="">
                </a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">             
                    <li class="white-text"><a href="index.php">HOME</a></li>
                    <li id="showdropdown"><a href="menu.php" style="color:brown;">OUR MENU</a>
                         <div id="megadropdown" style="height:400px;left:-1px;" class="row" role="coffteazonemenu">
                            <div class="dropdowndevider col l3 xl3 offset-l1 offset-xl1">
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
                            <div class="dropdowndevider col l4 xl4 offset-l1 offset-xl1">
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
                            <div class="dropdowndevider col xl1 l1">
                                <div class="col l12 xl12 menutitle">
                                    <h3>Desserts</h3>
                                </div>
                                 <nav class="dropdowndishcategory col l12 xl12">
                                    <ul>
                                        <li><a href="menu/muffins.php">Muffins</a></li>
                                        <li><a href="menu/cakes.php">Cakes</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </li>
                    <li class="white-text"><a href="services.php">SERVICES</a></li>
                    <li class="white-text"><a href="gallery.php">GALLERY</a></li>
                    <li class="white-text"><a href="aboutus.php">ABOUT US</a></li>
                    <li class="white-text"><a href="faq.php">FAQ'S</a></li>
                    <li class="white-text"><a href="contactus.php">CONTACT US</a></li>
                </ul>
                 <ul class="side-nav brown darken-3" id="mobile-demo">
                    <li><a class="white-text" href="index.php">HOME</a></li>
                    <li><a href="menu.php" style="color:brown;">OUR MENU</a></li>
                    <li><a class="white-text" href="services.php">SERVICES</a></li>
                    <li><a class="white-text" href="gallery.php">GALLERY</a></li>
                   <li><a class="white-text" href="aboutus.php">ABOUT US</a></li>
                    <li><a class="white-text" href="faq.php">FAQ'S</a></li>
                    <li><a class="white-text" href="contactus.php">CONTACT US</a></li>
                </ul>
            </div> 
        </nav>

    </header>
    <!-- for development javascript file -->
    <main >
        
        <div class="row">
            <div class="col s12 m12 12 xl12">
                <h2 class="center-align">Foods</h2>
            </div>
        </div>
        <div class="row">
            <div class="row">
                <div class="col s12 m12 l12 xl12">
                     <div class="col s12 m12 l12 xl12 devider dividerstyle">
                        <h3 class="center-align">Starter</h3>
                        <div class="row">
                            <div class="col s12 m12 l12 xl12">
                                <div class="dishcat">
                                    <?php
                                        $sql = "SELECT * FROM tbl_menu_starter";
                                        $result = mysqli_query($connection , $sql);
                                        while ($rows = mysqli_fetch_assoc($result)) {
                                            $title = $rows['title'];
                                            $path = $rows['path'];
                                            $price = $rows['price'];
                                            $caption = $rows['caption'];
                                            echo "<div class='menuimg' style=\"background-size:cover;\">\n";
                                            echo "<img  src=\"". $path . "\">\n";
                                            echo "<h5 class='center-align' style=\"font-size:1.1em;\">$title</h5>\n";
                                            echo "<h6 class='center-align' style='font-size:1em;'>&#8369;$price</h6>\n";
                                            echo "<p class='center-align'>$caption</p>\n";
                                            echo "</div>\n";
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col s12 m12 l12 xl12"></div>
            </div>
            
            <div class="row">
                <div class="col s12 m12 l12 xl12">
                     <div class="col s12 m12 l12 xl12 devider dividerstyle">
                        <h3 class="center-align">Platter</h3>
                        <div class="row">
                            <div class="col s12 m12 l12 xl12 dishcat">
                                <?php
                                        $sql = "SELECT * FROM tbl_menu_platter";
                                        $result = mysqli_query($connection , $sql);
                                        while ($rows = mysqli_fetch_assoc($result)) {
                                            $title = $rows['title'];
                                            $path = $rows['path'];
                                            $price = $rows['price'];
                                            $caption = $rows['caption'];
                                            echo "<div class='menuimg' style=\"background-size:cover;\">\n";
                                            echo "<img  src=\"". $path . "\">\n";
                                            echo "<h5 class='center-align' style=\"font-size:1.1em;\">$title</h5>\n";
                                            echo "<h6 class='center-align' style='font-size:1em;'>&#8369;$price</h6>\n";
                                            echo "<p class='center-align'>$caption</p>\n";
                                            echo "</div>\n";
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             
             <div class="row">
                <div class="col s12 m12 l12 xl12"></div>
            </div>


            
            <div class="row">
                <div class="col s12 m12 l12 xl12">
                     <div class="col s12 m12 l12 xl12 devider dividerstyle" >
                        <h3 class="center-align">Pizza</h3>
                        <div class="row">
                            <div class="col s12 m12 l12 xl12 dishcat">
                                <?php
                                        $sql = "SELECT * FROM tbl_menu_pizza";
                                        $result = mysqli_query($connection , $sql);
                                        while ($rows = mysqli_fetch_assoc($result)) {
                                            $title = $rows['title'];
                                            $path = $rows['path'];
                                            $price = $rows['price'];
                                            $caption = $rows['caption'];
                                            echo "<div class='menuimg' style=\"background-size:cover;\">\n";
                                            echo "<img  src=\"". $path . "\">\n";
                                            echo "<h5 class='center-align' style=\"font-size:1.1em;\">$title</h5>\n";
                                            echo "<h6 class='center-align' style='font-size:1em;'>&#8369;$price</h6>\n";
                                            echo "<p class='center-align'>$caption</p>\n";
                                            echo "</div>\n";
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
           

             <div class="row">
                <div class="col s12 m12 l12 xl12"></div>
            </div>

            <div class="row">
                <div class="col s12 m12 l12 xl12">
                     <div class="col s12 m12 l12 xl12 devider  dividerstyle" >
                        <h3 class="center-align">Main Course</h3>
                        <div class="row">
                            <div class="col s12 m12 l12 xl12 dishcat">
                                <?php
                                        $sql = "SELECT * FROM tbl_menu_maincourse";
                                        $result = mysqli_query($connection , $sql);
                                        while ($rows = mysqli_fetch_assoc($result)) {
                                            $title = $rows['title'];
                                            $path = $rows['path'];
                                            $price = $rows['price'];
                                            $caption = $rows['caption'];
                                            echo "<div class='menuimg' style=\"background-size:cover;\">\n";
                                            echo "<img src=\"". $path . "\">\n";
                                            echo "<h5 class='center-align' style=\"font-size:1.1em;\">$title</h5>\n";
                                            echo "<h6 class='center-align' style='font-size:1em;'>&#8369;$price</h6>\n";
                                            echo "<p class='center-align'>$caption</p>\n";
                                            echo "</div>\n";
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        
             <div class="row">
                <div class="col s12 m12 l12 xl12"></div>
            </div>

            <div class="row">
                <div class="col s12 m12 l12 xl12">
                     <div class="col s12 m12 l12 xl12 devider dividerstyle" >
                        <h3 class="center-align">Pasta</h3>
                        <div class="row">
                            <div class="col s12 m12 l12 xl12 dishcat">
                                <?php
                                        $sql = "SELECT * FROM tbl_menu_pasta";
                                        $result = mysqli_query($connection , $sql);
                                        while ($rows = mysqli_fetch_assoc($result)) {
                                            $title = $rows['title'];
                                            $path = $rows['path'];
                                            $price = $rows['price'];
                                            $caption = $rows['caption'];
                                            echo "<div class='menuimg' style=\"background-size:cover;\">\n";
                                            echo "<img  src=\"". $path . "\">\n";
                                            echo "<h5 class='center-align' style=\"font-size:1.1em;\">$title</h5>\n";
                                            echo "<h6 class='center-align' style='font-size:1em;'>&#8369;$price</h6>\n";
                                            echo "<p class='center-align'>$caption</p>\n";
                                            echo "</div>\n";
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m12 l12 xl12"></div>
            </div>

            <div class="row">
                <div class="col s12 m12 l12 xl12">
                     <div class="col s12 m12 l12 xl12 devider dividerstyle" >
                        <h3 class="center-align">Soup</h3>
                        <div class="row">
                            <div class="col s12 m12 l12 xl12 dishcat">
                                <?php
                                        $sql = "SELECT * FROM tbl_menu_soup";
                                        $result = mysqli_query($connection , $sql);
                                        while ($rows = mysqli_fetch_assoc($result)) {
                                            $title = $rows['title'];
                                            $path = $rows['path'];
                                            $price = $rows['price'];
                                            $caption = $rows['caption'];
                                            echo "<div class='menuimg'style=\"background-size:cover;\">\n";
                                            echo "<img  src=\"". $path . "\">\n";
                                            echo "<h5 class='center-align' style=\"font-size:1.1em;\">$title</h5>\n";
                                            echo "<h6 class='center-align' style='font-size:1em;'>$price</h6>\n";
                                            echo "<p class='center-align'>$caption</p>\n";
                                            echo "</div>\n";
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <div class="row">
                <div class="col s12 m12 12 xl12">
                    <h2 class="center-align">Drinks</h2>
                </div>
            </div>
             <div class="row">
                <div class="col s12 m12 l12 xl12">
                     <div class="col s12 m12 l12 xl12 devider dividerstyle" >
                        <h3 class="center-align">Hot Drinks</h3>
                        <div class="row">
                            <div class="col s12 m12 l12 xl12 dishcat">
                                <?php
                                        $sql = "SELECT * FROM tbl_menu_hotdrinks";
                                        $result = mysqli_query($connection , $sql);
                                        while ($rows = mysqli_fetch_assoc($result)) {
                                            $title = $rows['title'];
                                            $path = $rows['path'];
                                            $oz12 = $rows['oz12price'];
                                            $oz16 = $rows['oz16price'];
                                            $oz22 = $rows['oz22price'];
                                            $caption = $rows['caption'];
                                            echo "<div  class='menuimg' style=\"background-size:cover;\">\n";
                                            echo "<img  src=\"". $path . "\">\n";
                                            echo "<h5 class='center-align' style=\"font-size:1.1em;\">$title</h5>\n";
                                            echo "<h6 class='center-align' style='font-size:1em;'>&#8369;$price</h6>\n";
                                            echo "<p class='center-align'>$caption</p>\n";
                                            echo "</div>\n";
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m12 l12 xl12"></div>
            </div>

            <div class="row">
                <div class="col s12 m12 l12 xl12">
                     <div class="col s12 m12 l12 xl12 devider dividerstyle" >
                        <h3 class="center-align">Iced Coffee</h3>
                        <div class="row">
                            <div class="col s12 m12 l12 xl12 dishcat">
                                <?php
                                        $sql = "SELECT * FROM tbl_menu_icedcoffee";
                                        $result = mysqli_query($connection , $sql);
                                        while ($rows = mysqli_fetch_assoc($result)) {
                                            $title = $rows['title'];
                                            $path = $rows['path'];
                                            $oz12 = $rows['oz12price'];
                                            $oz16 = $rows['oz16price'];
                                            $oz22 = $rows['oz22price'];
                                            $caption = $rows['caption'];
                                            echo "<div class='menuimg' style=\"background-size:cover;\">\n";
                                            echo "<img  src=\"". $path . "\">\n";
                                            echo "<h5 class='center-align' style=\"font-size:1.1em;\">$title</h5>\n";
                                            echo "<h6 class='center-align' style='font-size:1em;'>&#8369;$price</h6>\n";
                                            echo "<p class='center-align'>$caption</p>\n";
                                            echo "</div>\n";
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m12 l12 xl12"></div>
            </div>

            <div class="row">
                <div class="col s12 m12 l12 xl12">
                     <div class="col s12 m12 l12 xl12 devider dividerstyle" >
                        <h3 class="center-align">Frappuccino</h3>
                        <div class="row">
                            <div class="col s12 m12 l12 xl12 dishcat">
                                <?php
                                        $sql = "SELECT * FROM tbl_menu_frapuccino";
                                        $result = mysqli_query($connection , $sql);
                                        while ($rows = mysqli_fetch_assoc($result)) {
                                            $title = $rows['title'];
                                            $path = $rows['path'];
                                            $oz12 = $rows['oz12price'];
                                            $oz16 = $rows['oz16price'];
                                            $oz22 = $rows['oz22price'];
                                            $caption = $rows['caption'];
                                            echo "<div class='menuimg' style=\"background-size:cover;\">\n";
                                            echo "<img  src=\"". $path . "\">\n";
                                            echo "<h5 class='center-align' style=\"font-size:1.1em;\">$title</h5>\n";
                                            echo "<h6 class='center-align' style='font-size:1em;'>&#8369;$price</h6>\n";
                                            echo "<p class='center-align'>$caption</p>\n";
                                            echo "</div>\n";
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col s12 m12 l12 xl12"></div>
            </div>

            <div class="row">
                <div class="col s12 m12 l12 xl12">
                     <div class="col s12 m12 l12 xl12 devider dividerstyle" >
                        <h3 class="center-align">Signature Drinks</h3>
                        <div class="row">
                            <div class="col s12 m12 l12 xl12 dishcat">
                                <?php
                                        $sql = "SELECT * FROM tbl_menu_signaturedrinks";
                                        $result = mysqli_query($connection , $sql);
                                        while ($rows = mysqli_fetch_assoc($result)) {
                                            $title = $rows['title'];
                                            $path = $rows['path'];
                                            $oz12 = $rows['oz12price'];
                                            $oz16 = $rows['oz16price'];
                                            $oz22 = $rows['oz22price'];
                                            $caption = $rows['caption'];
                                            echo "<div class='menuimg'  style=\"background-size:cover;\">\n";
                                            echo "<img src=\"". $path . "\">\n";
                                            echo "<h5 class='center-align' style=\"font-size:1.1em;\">$title</h5>\n";
                                            echo "<h6 class='center-align' style='font-size:1em;'>&#8369;$price</h6>\n";
                                            echo "<p class='center-align'>$caption</p>\n";
                                            echo "</div>\n";
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m12 l12 xl12"></div>
            </div>

            <div class="row">
                <div class="col s12 m12 l12 xl12">
                     <div class="col s12 m12 l12 xl12 devider dividerstyle" >
                        <h3 class="center-align">Italian soda</h3>
                        <div class="row">
                            <div class="col s12 m12 l12 xl12 dishcat">
                                <?php
                                        $sql = "SELECT * FROM tbl_menu_italliansoda";
                                        $result = mysqli_query($connection , $sql);
                                        while ($rows = mysqli_fetch_assoc($result)) {
                                            $title = $rows['title'];
                                            $path = $rows['path'];
                                            $oz12 = $rows['oz12price'];
                                            $oz16 = $rows['oz16price'];
                                            $oz22 = $rows['oz22price'];
                                            $caption = $rows['caption'];
                                            echo "<div class='menuimg' style=\"background-size:cover;\">\n";
                                            echo "<img  src=\"". $path . "\">\n";
                                            echo "<h5 class='center-align' style=\"font-size:1.1em;\">$title</h5>\n";
                                            echo "<h6 class='center-align' style='font-size:1em;'>&#8369;$price</h6>\n";
                                            echo "<p class='center-align'>$caption</p>\n";
                                            echo "</div>\n";
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m12 l12 xl12"></div>
            </div>

            <div class="row">
                <div class="col s12 m12 l12 xl12">
                     <div class="col s12 m12 l12 xl12 devider dividerstyle" >
                        <h3 class="center-align">Yakult Drinks</h3>
                        <div class="row">
                            <div class="col s12 m12 l12 xl12 dishcat">
                                <?php
                                        $sql = "SELECT * FROM tbl_menu_yakultdrinks";
                                        $result = mysqli_query($connection , $sql);
                                        while ($rows = mysqli_fetch_assoc($result)) {
                                            $title = $rows['title'];
                                            $path = $rows['path'];
                                            $oz12 = $rows['oz12price'];
                                            $oz16 = $rows['oz16price'];
                                            $oz22 = $rows['oz22price'];
                                            $caption = $rows['caption'];
                                            echo "<div class='menuimg' style=\"background-size:cover;\">\n";
                                            echo "<img src=\"". $path . "\">\n";
                                            echo "<h5 class='center-align' style=\"font-size:1.1em;\">$title</h5>\n";
                                            echo "<h6 class='center-align' style='font-size:1em;'>&#8369;$price</h6>\n";
                                            echo "<p class='center-align'>$caption</p>\n";
                                            echo "</div>\n";
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m12 l12 xl12"></div>
            </div>

            <div class="row">
                <div class="col s12 m12 l12 xl12">
                     <div class="col s12 m12 l12 xl12 devider dividerstyle" >
                        <h3 class="center-align">Milk Tea</h3>
                        <div class="row">
                            <div class="col s12 m12 l12 xl12 dishcat">
                                <?php
                                        $sql = "SELECT * FROM tbl_menu_milktea";
                                        $result = mysqli_query($connection , $sql);
                                        while ($rows = mysqli_fetch_assoc($result)) {
                                            $title = $rows['title'];
                                            $path = $rows['path'];
                                            $oz12 = $rows['oz12price'];
                                            $oz16 = $rows['oz16price'];
                                            $oz22 = $rows['oz22price'];
                                            $caption = $rows['caption'];
                                            echo "<div class='menuimg' style=\"background-size:cover;\">\n";
                                            echo "<img src=\"". $path . "\">\n";
                                            echo "<h5 class='center-align' style=\"font-size:1.1em;\">$title</h5>\n";
                                            echo "<h6 class='center-align' style='font-size:1em;'>&#8369;$price</h6>\n";
                                            echo "<p class='center-align'>$caption</p>\n";
                                            echo "</div>\n";
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                                        
            <div class="row">
                <div class="col s12 m12 l12 xl12"></div>
            </div>

            <div class="row">
                <div class="col s12 m12 l12 xl12">
                     <div class="col s12 m12 l12 xl12 devider dividerstyle">
                        <h3 class="center-align">Smoothies</h3>
                        <div class="row">
                            <div class="col s12 m12 l12 xl12 dishcat">
                                <?php
                                        $sql = "SELECT * FROM tbl_menu_smoothies";
                                        $result = mysqli_query($connection , $sql);
                                        while ($rows = mysqli_fetch_assoc($result)) {
                                            $title = $rows['title'];
                                            $path = $rows['path'];
                                            $oz12 = $rows['oz12price'];
                                            $oz16 = $rows['oz16price'];
                                            $oz22 = $rows['oz22price'];
                                            $caption = $rows['caption'];
                                            echo "<div class='menuimg' style=\"background-size:cover;\">\n";
                                            echo "<img  src=\"". $path . "\">\n";
                                            echo "<h5 class='center-align' style=\"font-size:1.1em;\">$title</h5>\n";
                                            echo "<h6 class='center-align' style='font-size:1em;'>&#8369;$price</h6>\n";
                                            echo "<p class='center-align'>$caption</p>\n";
                                            echo "</div>\n";
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m12 l12 xl12"></div>
            </div>

            <div class="row">
                <div class="col s12 m12 l12 xl12">
                     <div class="col s12 m12 l12 xl12 devider dividerstyle" >
                        <h3 class="center-align">Cocktails</h3>
                        <div class="row">
                            <div class="col s12 m12 l12 xl12 dishcat">
                                <?php
                                        $sql = "SELECT * FROM tbl_menu_cocktails";
                                        $result = mysqli_query($connection , $sql);
                                        while ($rows = mysqli_fetch_assoc($result)) {
                                            $title = $rows['title'];
                                            $path = $rows['path'];
                                            $oz12 = $rows['oz12price'];
                                            $oz16 = $rows['oz16price'];
                                            $oz22 = $rows['oz22price'];
                                            $caption = $rows['caption'];
                                            echo "<div class='menuimg' style=\"background-size:cover;\">\n";
                                            echo "<img src=\"". $path . "\">\n";
                                            echo "<h5 class='center-align' style=\"font-size:1.1em;\">$title</h5>\n";
                                            echo "<h6 class='center-align' style='font-size:1em;'>&#8369;$price</h6>\n";
                                            echo "<p class='center-align'>$caption</p>\n";
                                            echo "</div>\n";
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="row">
                <div class="col s12 m12 12 xl12">
                    <h2 class="center-align">Desserts</h2>
                </div>
            </div>
            
             <div class="row">
                <div class="col s12 m12 l12 xl12">
                     <div class="col s12 m12 l12 xl12 devider dividerstyle" >
                        <h3 class="center-align">Cakes</h3>
                        <div class="row">
                            <div class="col s12 m12 l12 xl12 dishcat">
                                <?php
                                        $sql = "SELECT * FROM tbl_menu_cakes";
                                        $result = mysqli_query($connection , $sql);
                                        while ($rows = mysqli_fetch_assoc($result)) {
                                            $title = $rows['title'];
                                            $path = $rows['path'];
                                            $price = $rows['price'];
                                            $caption = $rows['caption'];
                                            echo "<div class='menuimg' style=\"background-size:cover;\">\n";
                                            echo "<img  src=\"". $path . "\">\n";
                                            echo "<h5 class='center-align' style=\"font-size:1.1em;\">$title</h5>\n";
                                            echo "<h6 class='center-align' style='font-size:1em;'>&#8369;$price</h6>\n";
                                            echo "<p class='center-align'>$caption</p>\n";
                                            echo "</div>\n";
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="row">
                <div class="col s12 m12 l12 xl12"></div>
            </div>
            
            <div class="row">
                <div class="col s12 m12 l12 xl12">
                     <div class="col s12 m12 l12 xl12 devider dividerstyle" >
                        <h3 class="center-align">Muffins</h3>
                        <div class="row">
                            <div class="col s12 m12 l12 xl12 dishcat">
                                <?php
                                        $sql = "SELECT * FROM tbl_menu_muffins";
                                        $result = mysqli_query($connection , $sql);
                                        while ($rows = mysqli_fetch_assoc($result)) {
                                            $title = $rows['title'];
                                            $path = $rows['path'];
                                            $price = $rows['price'];
                                            $caption = $rows['caption'];
                                            echo "<div class='menuimg' style=\"background-size:cover;\">\n";
                                            echo "<img src=\"". $path . "\">\n";
                                            echo "<h5 class='center-align' style=\"font-size:1.1em;\">$title</h5>\n";
                                            echo "<h6 class='center-align' style='font-size:1em;'>$price</h6>\n";
                                            echo "<p class='center-align'>$caption</p>\n";
                                            echo "</div>\n";
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </main>
    <?php 
        $sql = "SELECT * FROM tbl_contact_details";
        $result = mysqli_query($connection , $sql);
        
        while ($rows = mysqli_fetch_assoc($result)) {
            $address = $rows['address'];

        }
    
    ?>
    <footer  class="page-footer brown darken-4">
        <div class="row">
            <span class="col s12 m12 l4 xl4 offset-xl1 offset-l1">&copy; <?php echo htmlspecialchars(date("Y")) . " "."Coffteazone";?></span>
            <span class="col s12 m12 xl4 l4"><?php echo $address; ?></span>
            <a href="https://www.facebook.com/CoffteaZone"  class="col s12 m2 l3 xl3 center-align"><img src="img/logo/FACEBOOKLOGO.png" width="30px" height="30px" alt=""></a>
        </div>
    </footer>
    <script type="text/javascript">
        function showtheSlides() {
            var devider = document.getElementsByClassName("devider");

            for (var i = 0 ; i < devider.length ; i++) {
                devider[i].style.visibility = "visible";
            }
            console.log("Hello world");
        }

        setTimeout(showtheSlides ,2000);
   
    </script>
    <!-- <script  type="text/javascript" src="js/jquery.min.js"></script>
    <script  type="text/javascript" src="js/materialize.min.js"></script> -->

    <!-- for production ready javascript file -->
    <!-- uncomment all the script for production used -->
    
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <!-- <script src="js/slick.js" type="text/javascript"></script> -->

    <script src="js/main.js" type="text/javascript"></script>
    <script src="js/carousel.js" type="text/javascript"></script>
    <script type="text/javascript">
       
        $(document).ready(function() {
            $(".dishcat").slick({
                infinite: true,
                slidesToShow: 5,
                centerPadding: "60px",
                slidesToScroll : 5,
                mobileFirst:true,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 4,
                            infinite: true,
                
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                             infinite: true,
                    
                        }
                    },
                    {
                    breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            infinite: true,
                        }
                    }
                ]
            });
        });
    </script>
    
</body>
</html>