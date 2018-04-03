<?php require "admin/connection.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!--[if lt IE 9]>
        <script type="text/javascript" src="js/html5shiv.min.js"></script>
    <![endif]-->
    <!-- <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="img/logo/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="img/logo/favicon.ico" type="image/x-icon"/>
    <title>Home | Coffteazone</title>
    <meta property="og:url" content="http://coffteazone.com">
    <meta property="og:type" content="website">
    <meta property="og:title" content="coffteazone Cavite City">
    <meta property="og:site_name" content="Coffteazone">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" media="screen , projection"> -->
    <link rel="stylesheet" type="text/css" href="css/materialize.min.css" media="screen , projection">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/paddingfixed.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style type="text/css">
        .indicator-item:active {
            background-color:red !important;
        }
        .menutitle {
            padding-left:30px;
        }
        .sliderimg {
            background-repeat:no-repeat !important;
            background-size:100% 100% !important;
        }
        /* .overlaycontentseller {
            visibility:hidden;
            -moz-transition:all .5s ease-in-out;
            -webkit-transition:all .5s ease-in-out;
            -khtml-transition:all .5s ease-in-out;
            -o-transition:all .5s ease-in-out;
            -ms-transition:all .5s ease-in-out;
            transition:all .5s ease-in-out;
        } */
    </style>
</head>
<body id="bodyshit">
    <noscript class="no-js">
       <div class="row">
           <div class="col s12 m12 l12 xl12">
               <h1 class="center-align">Please enable javascript on your web browser!</h1>
                <p class="center-align">Our website will not function correctly if javascript is disabled.</p>
           </div>
       </div>
    </noscript>
    <div id="overlaycontainerhomepage">
        <div class="overlaybtn"><img src="img/buttons/ex.png" id="closebtn" alt=""></div>
        <div class="overlaybestseller">
            <?php
                $sql = "SELECT * FROM tbl_bestseller";
                $result = mysqli_query($connection , $sql);

                if (mysqli_num_rows($result) > 0 ) {
                    while ($rows = mysqli_fetch_assoc($result)) {
                        echo "\t\t\t<div class=\"row overlaycontentseller\">\n";
                            echo "\t\t\t\t<div class=\"col s12 m12 l12 xl12\">\n".
                                    "\t\t\t\t\t<div class=\"row\">\n".
                                        "\t\t\t\t\t\t<div class=\"col s12 m12 l12 xl12\">\n".
                                            "\t\t\t\t\t\t\t<div class=\"row\">\n".
                                                "\t\t\t\t\t\t\t\t<div class=\"col s12 m6 l6 xl6\">\n".
                                                    "\t\t\t\t\t\t\t\t\t<img src=\"".$rows['path']."\" alt=\"".$rows['title']."\" class=\"selleroverlayimage\">\n".
                                                "\t\t\t\t\t\t\t\t</div>\n".
                                                "\t\t\t\t\t\t\t\t<div class=\"col s12 m6 l6 xl6\">\n".
                                                    "\t\t\t\t\t\t\t\t\t<h5 class=\"center-align white-text\">".$rows['title']."</h5>\n".
                                                    "\t\t\t\t\t\t\t\t\t<h6 class=\"center-align white-text\">".$rows['price']."</h6>\n".
                                                    "\t\t\t\t\t\t\t\t\t<div class=\"row\">\n".
                                                        "\t\t\t\t\t\t\t\t\t\t<div class=\"col s12 m12 l12 xl12\">\n".
                                                        "\t\t\t\t\t\t\t\t\t\t\t<p class=\"center-align white-text\">".$rows['caption']."</p>\n".
                                                        "\t\t\t\t\t\t\t\t\t\t</div>\n".
                                                    "\t\t\t\t\t\t\t\t\t</div>\n".
                                                "\t\t\t\t\t\t\t\t</div>\n".
                                            "\t\t\t\t\t\t\t</div>\n".
                                        "\t\t\t\t\t\t</div>\n".
                                    "\t\t\t\t\t</div>\n".
                                "\t\t\t\t</div>\n";
                        echo "\t\t\t</div>\n";
                    }
                }
            
            ?>
        </div>
        <div class="overlay">
        
        </div>
    </div>
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
                    <li class="white-text"><a  href="aboutus.php">ABOUT US</a></li>
                    <li class="white-text"><a href="faq.php">FAQ'S</a></li>
                    <li class="white-text"><a href="contactus.php">CONTACT US</a></li>
                </ul>
                 <ul class="side-nav brown darken-3" id="mobile-demo">
                    <li><a style="color:brown;" href="index.php">HOME</a></li>
                    <li><a class="white-text" href="menu.php">OUR MENU</a></li>
                    <li><a class="white-text" href="services.php">SERVICES</a></li>
                    <li><a class="white-text" href="gallery.php">GALLERY</a></li>
                   <li><a class="white-text" href="aboutus.php">ABOUT US</a></li>
                    <li><a class="white-text" href="faq.php">FAQ'S</a></li>
                    <li><a class="white-text" href="contactus.php">CONTACT US</a></li>
                </ul>
            </div> 
        </nav>
        <div class="row">
            <div class="slider sliderstyle">
                <ul class="slides">
                    <?php
                        $sql = "SELECT * FROM tbl_slider";
                        $result = mysqli_query($connection , $sql);
                        
                        
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "\t\t\t<li>". "<img class=\"responsive-img sliderimg\" src=\"". $row['path']."\"></li>\n";
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
                        
                        <h3 class="center-align white-text titleoutline">New Products</h3>
                    </div>
                    <div class="row">
                        <?php
                            $sql = "SELECT * FROM tbl_new_product ORDER BY id DESC LIMIT 1";
                     
                            $newproductQuery = mysqli_query($connection , $sql);
                            while ($newproductrow = mysqli_fetch_assoc($newproductQuery)) {
                                echo "\t\t\t<div class=\"col s12 m12 xl12 l12\">\n";
                                echo "\t\t\t\t<a href=\"newproduct.php\">\n";
                                echo "\t\t\t\t\t<img src=\"". $newproductrow['path'] . "\" width=\"100%\" height=\"350px\">\n";
                                echo "\t\t\t\t</a>\n";
                                echo "\t\t\t\t<div class=\"white-text container producttitle\">\n";
                                //echo "\t\t\t\t\t<h4 class=\"center-align textcolor\">".$newproductrow['title'] . "</h4>\n";
                                echo "\t\t\t\t</div>\n"; 
                                echo "\t\t\t</div>\n";
                            
                            }
                                                                
                        ?>
        
                    </div>
                </div>
                <div class="promos">
                    <div class="header">
                        <h3 class="center-align white-text titleoutline">Our Promos</h3>
                    </div>
                    <div class="row">
                        <?php
                            $sql = "SELECT * FROM tbl_promos ORDER BY id DESC LIMIT 1";
                            $promoQuery = mysqli_query($connection , $sql);
                            while ($promorow = mysqli_fetch_assoc($promoQuery)) {
                                echo "\t\t\t<div class=\"col s12 m12 xl12 l12\">\n";
                                echo "\t\t\t\t<a href=\"promos.php\">\n";
                                echo "\t\t\t\t\t<img src=\"". $promorow['path'] . "\" width=\"100%\" height=\"410px\">\n";
                                echo "\t\t\t\t</a>\n";
                                echo "\t\t\t\t<div class=\"white-text container producttitle\">\n";
                                //echo "\t\t\t\t\t<h4 class=\"center-align\">". $promorow['title'] . "</h4>\n";
                                echo "\t\t\t\t</div>\n"; 
                                echo "\t\t\t</div>\n";
                            }
                        ?>

                    </div>
                </div>
            </div>
            <div class="col s12 m12 l7 xl7">
                <div class="container bestsellertitle">
                    <h2 class="center-align white-text titleoutline">Our Bestseller</h2>
                </div>
                <div class="row">
                    <?php
                        $sql = "SELECT * FROM tbl_bestseller";
                        $sellerQuery = mysqli_query($connection , $sql);
                        if (isset($sellerQuery)) {
                            if (mysqli_num_rows($sellerQuery) > 0 ) {
                                while($sellerrow = mysqli_fetch_assoc($sellerQuery)) { 
                        
                                    echo "<div class=\"col s12 m6 l6 xl6\">\n".
                                            "<div class=\"row\">\n".
                                                "<div class=\"col s12 m12 l12 xl12\">\n".
                                                    "<div class=\"sellerimg\">\n".
                                                        "<div class=\"showmoreoverlay\"><h5>Show Details</h5></div>\n".
                                                        "<img src=\"".$sellerrow['path']."\" alt=\"".$sellerrow['title']."\">\n".
                                                    "</div>\n".
                                                "</div>\n".
                                                "<div class=\"row\">\n".
                                                    "<div class=\"col s12 m12 l12 xl12\"></div>\n".
                                                "</div>\n".
                                                "<div class=\"col s12 m12 l12 xl12\">\n".
                                                    "<h5 class=\"center-align\">".$sellerrow['title']."</h5>\n".
                                                "</div>\n".
                                            "</div>\n".
                                        "</div>\n";
                                }
                            }
                        } else if (!@mysqli_query($connection , $sql)) {
                                die("theres an error".mysqli_connect_error());
                        }

                    ?>
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
            <a href="https://www.facebook.com/CoffteaZone" class="col s12 m2 l3 xl3 center-align"><img src="img/logo/FACEBOOKLOGO.png" width="30px" height="100%" alt=""></a>
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
    
    <script type="text/javascript">


        (function(){
            var sellerImage = document.getElementsByClassName("sellerimg");
            var showmoreOverlay = document.getElementsByClassName("showmoreoverlay");
            var overlayContainerHomepage = document.getElementById("overlaycontainerhomepage");
            
            var overlayBestSeller = document.getElementsByClassName("overlaybestseller");
            var overlayContentSeller = document.getElementsByClassName("overlaycontentseller");

            var showmoreOverlayLength = showmoreOverlay.length;
            var overlayContentSellerLength = overlayContentSeller.length;
            var overlayBestSellerLength = overlayBestSeller.length;
            // function setVendor(element, property, value) {
            //     element.style["webkit" + property] = value;
            //     element.style["moz" + property] = value;
            //     element.style["ms" + property] = value;
            //     element.style["o" + property] = value;
            // }

            function SelectSellerImgtoShow(val) {
                for (var ii = 0 ; ii <= val ; ii++) {
                    if (val == ii) {
                         overlayContentSeller[ii].style.display = "block";
                         break;
                    }
                }
            }
            var closeSellerimg = function () {
                this.style.display = "none";
        
            };


            for (var index = 0 ; index < showmoreOverlayLength  ; index++ ) {
                // add click event on all showmore overlay if visible
                showmoreOverlay[index].addEventListener("click" , function () {
                    overlayContainerHomepage.style.display = "block";
                    for (var ii = 0;  ii < showmoreOverlayLength ; ii++) {
                        if (this == showmoreOverlay[ii]) {
                    
                            for (var indexb = 0; indexb < overlayContentSellerLength; indexb++ ) {
                                overlayContentSeller[indexb].style.display = "none";
                            }
                            SelectSellerImgtoShow(ii);
                            break;
                        }
                    }
                
                }, false);
            }

            // close the overlay container if click
            overlayContainerHomepage.addEventListener("click" , closeSellerimg , false);
        })();
      
    
    </script>
</body>
</html>