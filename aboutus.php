<?php require "admin/connection.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--[if lt IE 9]>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="img/logo/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="img/logo/favicon.ico" type="image/x-icon"/>
    <title>About Us | Coffteazone</title>
    <meta property="og:url" content="http://coffteazone.com">
    <meta property="og:type" content="website">
    <meta property="og:title" content="coffteazone Cavite City">
    <meta property="og:site_name" content="Coffteazone">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" media="screen , projection">
    <!-- <link rel="stylesheet" type="text/css" href="css/materialize.min.css"> -->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/paddingfixed.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style type="text/css">
        .indicator-item:active {
            background-color:red;
        }
        .menutitle {
            padding-left:30px;
        } 
        p{ 
            color:white;
        }
        .border {
            color:white;
            border:1px solid white;
            -webkit-box-shadow:0px 0px 110px  white inset;
            -ms-box-shadow:0px 0px 110px  white inset; 
            -moz-box-shadow:0px 0px 110px  white inset; 
            -khtml-box-shadow:0px 0px 110px  white inset;
            -khtml-box-shadow:0px 0px 110px  white inset;  
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
                    <li id="showdropdown"><a href="menu.php">OUR MENU</a>
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
                    <li><a style="color:brown;" href="aboutus.php">ABOUT US</a></li>
                    <li class="white-text"><a href="faq.php">FAQ'S</a></li>
                    <li class="white-text"><a href="contactus.php">CONTACT US</a></li>
                </ul>
                 <ul class="side-nav brown darken-3" id="mobile-demo">
                    <li><a class="white-text" href="index.php">HOME</a></li>
                    <li><a class="white-text" href="menu.php">OUR MENU</a></li>
                    <li><a href="services.php">SERVICES</a></li>
                    <li><a class="white-text" href="gallery.php">GALLERY</a></li>
                   <li><a style="color:brown" href="aboutus.php">ABOUT US</a></li>
                    <li><a class="white-text" href="faq.php">FAQ'S</a></li>
                    <li><a class="white-text" href="contactus.php">CONTACT US</a></li>
                </ul>
            </div> 
        </nav>

    </header>
    <!-- for development javascript file -->
    <?php 

        $sql  = "SELECT description FROM tbl_about_history";
        $result = mysqli_query($connection , $sql);
        $count = 0;
        if (mysqli_num_rows($result) > 0) {
            while ($rows = mysqli_fetch_assoc($result)) {
                $historyps[$count] = $rows['description'];
                $count++;
            }
        }
        $sql = "SELECT path FROM tbl_about_image";
        $result = mysqli_query($connection , $sql);
        $count = 0;
        if (mysqli_num_rows($result) > 0) {
            while ($rows = mysqli_fetch_assoc($result)) {
                $historimage[$count] = $rows['path'];
                $count++;
            }
        }
    
    ?>
    <main>
        <div class="row">
            <div class="col s12 m12 l12 xl12">
                <div class="row">
                    <div class="col s12 m12 l12 xl12">
                        <div class="row">
                            <div class="col s12 m6 l6 xl6">
                                <div class="row">
                                    <div class="col s12 m12 l12 xl12"></div>
                                </div>
                                 <div class="row">
                                    <div class="col s12 m12 l12 xl12"></div>
                                </div>
                                <?php
                                    echo "<img src=\"".$historimage[0]."\" width=\"100%\" class=\"imageheight\">\n";
                                
                                ?>
                            </div>
                    
                            
                            <div class="col s12 m6 l6 xl6">
                                <div class="row">
                                    <div class="col s12 m12 l12 xl12"></div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m12 l12 xl12"></div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m12 l12 xl12 aboutuscontent">
                                         <h3 class="center-align">History</h3>
                                        <?php 

                                            for($index = 0 ; $index < count($historyps) ; $index++) {
                                                echo "<p style=\"text-indent:40px;\">".$historyps[$index]."</p>\n";
                                                echo "<p></p>\n";
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12 xl12">
                        <div class="row">
                            <div class="col s12 m6 l6 xl6 showmobileimg">
                                 <?php         
                                    echo "<img src=\"".$historimage[1]."\" width=\"100%\" class=\"imageheight\">\n";
                                ?>
                            </div>
                            <div class="col s12 m6 l6 xl6 aboutuscontent">
                                <h3 class="center-align">Our Mission</h3>
                                <?php
                                    $sql = "SELECT * FROM tbl_about_mission";
                                    $result = mysqli_query($connection , $sql);

                                    if (mysqli_num_rows($result)) {
                                        while ($rows = mysqli_fetch_assoc($result)) {
                                            echo "<p style=\"text-indent:52px\" class='center-align'>". $rows['description'] . "</p>\n";
                                            echo "<p></p>\n";
                                        }
                                    }
                                ?>
                                <h3 class="center-align">Our Vision</h3>
                                <?php
                                    $sql = "SELECT * FROM tbl_about_vision";
                                    $result = mysqli_query($connection , $sql);

                                    if (mysqli_num_rows($result)) {
                                        while ($rows = mysqli_fetch_assoc($result)) {
                                            echo "<p style=\"text-indent:52px\" class='center-align'>". $rows['description'] . "</p>\n";
                                            echo "<p></p>\n";
                                        }
                                    }
                                ?>
                            </div>
                            <div class="col s12 m6 l6 xl6 showdesktopimg">
                                 <?php         
                                    echo "<img src=\"".$historimage[1]."\" width=\"100%\" class=\"imageheight\">\n";
                            
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
            <a href="https://www.facebook.com/CoffteaZone" class="col s12 m2 l3 xl3 center-align"><img src="img/logo/FACEBOOKLOGO.png" width="30px" height="100%" alt=""></a>
        </div>
    </footer>
    <!-- <script  type="text/javascript" src="js/jquery.min.js"></script>
    <script  type="text/javascript" src="js/materialize.min.js"></script> -->

    <!-- for production ready javascript file -->
    <!-- uncomment all the script for production used -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js" type="text/javascript"></script>
    
    <script src="js/main.js" type="text/javascript"></script>

</body>
</html>