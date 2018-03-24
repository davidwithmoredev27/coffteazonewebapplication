<?php require "admin/connection.php" ?>

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
    <link rel="icon" href="img/logo/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="img/logo/favicon.ico" type="image/x-icon"/>
    <title>FAQ'S | Coffteazone</title>
    <meta property="og:url" content="http://coffteazone.com">
    <meta property="og:type" content="website">
    <meta property="og:title" content="coffteazone Cavite City">
    <meta property="og:site_name" content="Coffteazone">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" media="screen , projection">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/paddingfixed.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/paddingfixed.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style type="text/css">
        .indicator-item:active {
            background-color:red;
        }
        .menutitle {
            padding-left:30px;
        }
        .border {
            border:1px solid white;
            color:white;
            
        }
        ul li {
            font-size:1.2em;
        }
        .border {
            -webkit-box-shadow:0px 0px 100px white inset;
            -khtml-box-shadow:0px 0px 100px white inset;
            -moz-box-shadow:0px 0px 100px white inset;
            -o-box-shadow:0px 0px 100px white inset;
            -ms-box-shadow:0px 0px 100px white inset;
            box-shadow:0px 0px 100px white inset;
        }
    </style>
</head>
<body>
    <header>
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
                                        <li><a href="menu/muffins">Muffins</a></li>
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

    </header>

    <main>
        <div class="row">
            <div class="col s12 m12 l12 xl12">
                <div class="container">
                    <h2 class="center-align faqtitle"><b>Frequently Ask Question</b></h2>
                </div>

            </div>
            <div class="row">
                <div class="col s12 m12 l12 xl12"></div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12 xl12"></div>
            </div>
            <div class="col s12 m12 l4 xl4 offset-l1 offset-xl1 faqcontent">
               <div class="row">
                   <div class="col s12 m12 l12 xl12">
                        <h3 style="font-size:1.6em !important; text-decoration:underline;" class="center-align"><b>Cofftea</b></h3>
                        <ul>
                            <li><b>Question 1.</b>  What coffee you use?</li>
                            <li><b>Answer:</b> Italian coffee bean for espresso, Philippine sagada Arabica for brewed, South East Asia for special blends.</li>
                            <li><p></p></li>
                            <li><b>Question 2.</b>  Do you have available decaffeinated coffee?</li>
                            <li><b>Answer:</b> Yes.</li>
                            <li><p></p></li>
                            <li><b>Question 3.</b>  What is the price range of Cofftea Zone?</li>
                            <li><b>Answer:</b>  The cheapest is 50 pesos, 300 is the most expensive product price.</li>
                            <li><p></p></li>
                            <li><b>Question 4.</b>  Can I take orders in advance for pick up?</li>
                            <li><b>Answer:</b> Yes.<li>
                            <li><p></p></li>
                            <li><b>Question 5.</b>  Do you accept any cards?</li>
                            <li><b>Answer:</b> No, Cash only.<li>
                            <li><p></p></li>
                            <li><b>Question 6.</b>  Do you accept dollars?</li>
                            <li><b>Answer:</b> No, we only accept peso currency.</li>
                            <li><p></p></li>
                            <li><b>Question 7.</b>  Do you have free delivery?</li>
                            <li><b>Answer:</b> Yes, we have free delivery for Dalahican range.</li>
                            <li><p></p></li>
                            <li><b>Question 8.</b>  Can we drink alcohol inside?</li>
                            <li><b>Answer:</b> We only serve alcohol beverage if there are no minors inside the café.</li>
                            <li><p></p></li>
                            <li><b>Question 9.</b>  Can we request customized drinks that is not in menu?</li>
                            <li><b>Answer:</b> We customized our drinks depending on the availability of ingredients.</li>
                            <li><p></p></li>
                            <li><b>Question 10.</b> Can I change the rice to other side dish?</li>
                            <li><b>Answer:</b> Yes, potato fries or sautéed vegetable.</li>
                        </ul>
                   </div>
               </div>
            </div>
            <div class="col s12 m12 l5 xl5 offset-xl1 offset-l1 faqcontent">
                <div class="row">
                    
                    <div class="col s12 m12 l12 xl12">
                        <h3 style="font-size:1.6em !important; text-decoration:underline;" class="center-align"><b>KTV</b></h3>
                        <ul>
                            <li><b>Question 1.</b> What if the order is excess from the required amount, do we need  to pay for it?</li>
                            <li><b>Answer:</b> Yes, it will be paid. </li>
                            <li><p></p></li>
                            <li><b>Question 2.</b> What if the orders did not consume the required amount do we need to pay the exact payment for the total amount per head?</li>
                            <li><b>Answer:</b> Yes, customer are required to pay the exact amount per head.</li>
                            <li><p></p></li>
                            <li><b>Question 3.</b> In 150 per head, children’s below 5 years old are included?</li>
                            Answer: No, children’s 5 years old below are free?
                        </ul>

                    </div>
                    <div class="col s12 m12 l12 xl12">
                        <h3 style="font-size:1.6em !important; text-decoration:underline;" class="center-align"><b>Martinas</b></h3>
                        <ul>
                            <li><b>Question 1.</b>  Do you have catering?</li>
                            <li><b>Answer:</b> No.</li>
                            <li><p></p></li>
                            <li><b>Question  2.</b> Is the DJ has already song provided?</li>
                            <li><b>Answer:</b> Yes, you can check the available songs, DJ is accessible everyday at 4pm. For consultation. </li>
                            <li><p></p></li>
                            <li><b>Question  3.</b> Can we prepare the place 1 day advance?</li>
                            <li><b>Answer:</b> Depending on the availability of the day, but we allow 4-6 hours for preparation time on the day scheduled. </li>
                            <li><p></p></li>
                            <li><b>Question  4.</b> If reservation is being cancelled do you offer a full refund?</li>
                            <li><b>Answer:</b> No.</li>
                            <li><p></p></li>
                           
                        </ul>
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