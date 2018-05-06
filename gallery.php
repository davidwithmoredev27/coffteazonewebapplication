<?php require "admin/connection.php" ?>

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
    <title>Gallery | Coffteazone</title>
    <meta property="og:url" content="http://coffteazone.com">
    <meta property="og:type" content="website">
    <meta property="og:title" content="coffteazone Cavite City">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/materialize.min.css" media="projection, screen"> -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" media="screen , projection">
    <link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
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
        .box {
            height:145px;
            padding:0 !important;
        }
        
        
        @media only screen and (min-width:1024px) {
            .imagelist {
                display:block;
                overflow:hidden !important;
                
                -webkit-transition:all .2s ease-in-out;
                -moz-transition:all .2s ease-in-out;
                -khtml-transition:all .2s ease-in-out;
                -o-transition:all .2s ease-in-out;
                -ms-transition:all .2s ease-in-out;
                transition:all .2s ease-in-out;
            }
              .imagelist:hover {
                -webkit-transform:scale(1.15); /* Safari and Chrome */
                -moz-transform:scale(1.15); /* Firefox */
                -ms-transform:scale(1.15); /* IE 9 */
                -o-transform:scale(1.15); /* Opera */
                transform:scale(1.15);
                position:relative;
                box-shadow:0px 0px 10px #000;
                margin:0 auto;
                z-index:3;
                height:250px !important;
                width:250px !important;
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
                    <li class="white-text"><a style="color:brown;" href="gallery.php">GALLERY</a></li>
                    <li class="white-text"><a href="aboutus.php">ABOUT US</a></li>
                    <li class="white-text"><a href="faq.php">FAQ'S</a></li>
                    <li class="white-text"><a href="contactus.php">CONTACT US</a></li>
                </ul>
                 <ul class="side-nav brown darken-3" id="mobile-demo">
                    <li><a class="white-text" href="index.php">HOME</a></li>
                    <li><a class="white-text" href="menu.php">OUR MENU</a></li>
                    <li><a class="white-text" href="services.php">SERVICES</a></li>
                    <li><a style="color:brown;" href="gallery.php">GALLERY</a></li>
                    <li><a class="white-text" href="aboutus.php">ABOUT US</a></li>
                    <li><a class="white-text" href="faq.php">FAQ'S</a></li>
                    <li><a class="white-text" href="contactus.php">CONTACT US</a></li>
                </ul>
            </div> 
        </nav>

    </header>
    <main>
        <div class="row">
            <div class="col s12 m12 l12 xl12"></div>
        </div>
        <div class="row">
            <div class="col s12 m12 l12 xl12"></div>
        </div>
        <div class="row">
            <div class="col s12 m12 l12 xl12"></div>
        </div>
        <div class="row">
            <?php
                
                $sql = "SELECT * FROM tbl_gallery_album_title";
                $result = mysqli_query($connection , $sql);
                $galleryTitles = array();
                $GaleryTitleResult = null;
                $counter = 0;
                if (mysqli_num_rows($result) > 0):
                    while($rows = mysqli_fetch_assoc($result)) {
                        // put all the neccessary title in the tables where titles put on
                        $galleryTitles[$counter] = strtolower($rows['title']);
                    
                        $counter++;
                    }
                endif;
                for($indexs = 0 ; $indexs < count($galleryTitles) ; $indexs++) {
            
                    echo "<div class=\"col s12 m12 l12 xl12 containerpadding\">\n";
                    
                    $sqlpath = "SELECT path FROM tbl_gallery_album_".$galleryTitles[$indexs];
                    $sqlfirstPath = "SELECT path FROM tbl_gallery_album_".$galleryTitles[$indexs]. " LIMIT 1";
                    $galleryTitle = "SELECT title FROM tbl_gallery_album_title WHERE title = '".$galleryTitles[$indexs]."'";
                    
                    $pathResult = mysqli_query($connection , $sqlpath);
                    $sqlfirstPathResult = mysqli_query($connection , $sqlfirstPath);
                    $GaleryTitleResult = mysqli_query($connection , $galleryTitle);
                    
    
                    

                    if (mysqli_num_rows($GaleryTitleResult) > 0) {
                        while ($rows = mysqli_fetch_assoc($GaleryTitleResult)) {
                            $title = $rows['title'];
                        
                        }
                        echo "<div class=\"row \">\n";
                            echo "<div class=\"col s12 m12 l12 xl12 gallery\">\n";
                                echo "<div class=\"row\">\n";
                                    echo "<div class=\"col s12 m12 l12 xl12\">\n";
                                        echo "<h5 class=\"center-align titleAlbum\" style=\"text-transform:capitalize\">".$title."</h5>\n";
                                    echo "</div>\n";
                                echo "</div>\n";
                                echo "<div class=\"row\">\n";
                                    echo "<div class=\"col s12 m12 l12 xl12 gallerycontainer\">\n";
                                        if(mysqli_num_rows($pathResult) > 0) {
                                            while ($rows = mysqli_fetch_assoc($pathResult)) {
                                                echo "<div class=\"col s6 m6 l2 xl2 box\" style=\"border:1px solid black\">\n";
                                                echo     "<img class=\"imagelist\" src=\"".$rows['path']."\" width=\"100%\" height=\"100%\" alt=\"\">\n";
                                                echo "</div>\n";
                                            }
                                        }    
                                    echo "</div>\n";

                                    // echo "<div class=\"col s12 m12 l4 xl4\">\n";
                                    //     echo "<div class=\"row\">\n";
                                    //         if (mysqli_num_rows($sqlfirstPathResult) > 0) {
                                    //             while ($rows = mysqli_fetch_assoc($sqlfirstPathResult)) {
                                    //                 echo "<div class=\"col s12 m12 l12 xl12\" style=\"padding:0px;border:1px solid black ;height:350px;\">\n";
                                    //                 echo     "<img class=\"currentimg\" src=\"\" width=\"100%\" height=\"100%\" alt=\"\">\n";
                                    //                 echo "</div>";
                                    //                 echo  "<div class=\"col s12 m12 l12 xl12\" style=\"height:auto;\">\n";
                                    //                 echo  "</div>\n";
                                    //             }
                                    //         }
                                    //     echo "</div>\n";
                                    // echo "</div>\n";
                                echo "</div>\n";
                            echo "</div>\n";
                        echo "</div>\n";
                    }
                    echo "</div>\n";
                }

            ?>

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
    <!-- for development javascript file -->
    <!-- <script  type="text/javascript" src="js/jquery.min.js"></script>
    <script  type="text/javascript" src="js/materialize.min.js"></script> -->
    <!-- for production ready javascript file -->
    <!-- uncomment all the script for production used -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js" type="text/javascript"></script>
    <script src="js/lightbox.min.js" type="text/javascript"></script>
    <script src="js/main.js" type="text/javascript"></script>
    <script type="text/javascript">
         var titleAlbum = document.getElementsByClassName("titleAlbum");         
         for (var i = 0 ;i < titleAlbum.length ; i++) {
                var title = titleAlbum[i].textContent; 
            if(title.search("_")) {
                    var text = titleAlbum[i].textContent;
                titleAlbum[i].textContent = text.replace("_" , " ");
            }
        }
    </script>
</body>
</html>