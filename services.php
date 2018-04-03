<?php require "admin/connection.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--[if lt IE 9]>
        <script type="text/javascript" src="js/html5shiv.min.js"></script>
    <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="img/logo/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="img/logo/favicon.ico" type="image/x-icon"/>
    <title>Services | Coffteazone</title>
    <meta property="og:url" content="http://coffteazone.com">
    <meta property="og:type" content="website">
    <meta property="og:title" content="coffteazone Cavite City">
    <meta property="og:site_name" content="Coffteazone">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" media="screen , projection"> -->
    <link rel="stylesheet" href="css/materialize.min.css" media="screen, projection">
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
        .modal {
            width:500px !important;
            height:900px !important;

        }
        .materialboxed initialised {
            width:100%;
        }
       ul.liststyle {
           list-style: circle !important;
           list-style-type:circle !important;
       }
       ul.liststyle li::before {
          content:" *";
          margin-left:1rem;
          margin-right:1rem;
          font-weight:900;
    
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
    <div class="row" id="mainoeverlaycontainer">
        <div class="col s12 m12 l12 xl12">
            <!-- ktroomscontainer -->
             <div id="closebtn">
                <img id="btn" src="img/buttons/ex.png" width="100%" height="100%" alt="">
            </div>
            <section id="ktvroomscontainer" class="overlay">
               
                <div id="room1" class="roomsoverlay row">
                    <div class="col s12 m12 l12 xl12">
                        <div class="row showonmobileservices">
                            <div class="col s12 m12 l12 x12">
                                <div class="slider slideroverlay">
                                    <ul class="slides">
                                        <li><img src="img/services/overlayimages/ktv1/20180117_112828.jpg"></li>
                                        <li><img src="img/services/overlayimages/ktv1/ktv1.jpg"></li>
                                        <li><img src="img/services/overlayimages/ktv1/ktv1.1.jpg"></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col s12 m12 l12 xl12">
                                <div class="roomcontent">
                                     <h6 class="center-align" style="font-size:1.3em"><b>Terms and Condition</b></h6>
                                     <ul class="liststyle">
                                        <li class="left-align">Minimum of 5 persons.</li>
                                        <li class="left-align">Maximum of 20 persons.</li>
                                        <li class="left-align">&#8369;150 per head (For the first hour).</li>
                                        <li class="left-align">&#8369;100 per head (For the next and succeding hour)</li>
                                        <li class="left-align">Consumable of food and drinks.</li>
                                    </ul>
                                    <h6 class="center-align" style="font-size:1.3em"><b>Reservation</b></h6>
                                    <ul class="liststyle">
                                        <li class="left-align">No down payment</li>
                                        <li class="left-align">When the customer don't come within 30 minutes of the scheduled time of resrvation, the slot will be given to the other customer.</li>
                                    </ul>
                                </div> 
                            </div>
                        </div> <!--End Of mobile version -->

                        <div class="row showondesktopservices">
                            <div class="col s12 m12 l5 xl5 offset-l1 offset-xl1">
                                <div class="slider slideroverlay">
                                    <ul class="slides">
                                        <li><img src="img/services/overlayimages/ktv1/20180117_112828.jpg"></li>
                                        <li><img src="img/services/overlayimages/ktv1/ktv1.jpg"></li>
                                        <li><img src="img/services/overlayimages/ktv1/ktv1.1.jpg"></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col s12 m12 l5 xl5">
                                <div class="roomcontent">
                                    <h6 class="center-align" style="font-size:1.3em"><b>Terms and Condition</b></h6>
                                    <ul class="liststyle">
                                        <li class="left-align">Minimum of 5 persons.</li>
                                        <li class="left-align">Maximum of 20 persons.</li>
                                        <li class="left-align">&#8369;150 per head (For the first hour).</li>
                                        <li class="left-align">&#8369;100 per head (For the next and succeding hour)</li>
                                        <li class="left-align">Consumable of food and drinks.</li>
                                    </ul>
                                    <h6 class="center-align" style="font-size:1.3em"><b>Reservation</b></h6>
                                    <ul class="liststyle">
                                        <li class="left-align">No down payment</li>
                                        <li class="left-align">When the customer don't come within 30 minutes of the scheduled time of resrvation, the slot will be given to the other customer.</li>
                                    </ul>
                                </div>
                            </div>
                        </div> <!-- end of desktop version -->
                    </div>
                </div> <!--End of Room One-->

                 <div id="room2" class="roomsoverlay row">
                    <div class="col s12 m12 l12 xl12">

                        <div class="row showonmobileservices">
                            <div class="col s12 m12 l12 xl12">
                                <div class="slider slideroverlay">
                                    <ul class="slides">
                                        <li><img src="img/services/overlayimages/ktv2/ktv2.1.jpg" alt=""></li>
                                        <li><img src="img/services/overlayimages/ktv2/ktv2.jpg" alt=""></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col s12 m12 l12 xl12">
                                <div class="roomcontent">
                                    <h6 class="center-align" style="font-size:1.3em"><b>Terms and Condition</b></h6>
                                    <ul class="liststyle">
                                        <li class="left-align">Minimum of 15 persons.</li>
                                        <li class="left-align">&#8369;150 per head (For the first hour).</li>
                                        <li class="left-align">&#8369;100 per head (For the next and succeding hour)</li>
                                        <li class="left-align">Consumable of food and drinks.</li>
                                    </ul>
                                    <h6 class="center-align" style="font-size:1.3em"><b>Reservation</b></h6>
                                    <ul class="liststyle">
                                        <li class="left-align">No down payment</li>
                                        <li class="left-align">When the customer don't come within 30 minutes of the scheduled time of resrvation, the slot will be given to the other customer.</li>
                                    </ul>
                                </div>
                            </div>
                        </div><!--end of mobile version-->

                         <div class="row showondesktopservices">
                            <div class="col s12 m12 l5 xl5 offset-l1 offset-xl1">
                                <div class="slider slideroverlay">
                                    <ul class="slides">
                                        <li><img src="img/services/overlayimages/ktv2/ktv2.1.jpg" alt=""></li>
                                        <li><img src="img/services/overlayimages/ktv2/ktv2.jpg" alt=""></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col s12 m12 l5 xl5">
                                <div class="roomcontent">
                                     <h6 class="center-align" style="font-size:1.3em"><b>Terms and Condition</b></h6>
                                    <ul class="liststyle">
                                        <li class="left-align">Minimum of 15 persons.</li>
                                        <li class="left-align">&#8369;150 per head (For the first hour).</li>
                                        <li class="left-align">&#8369;100 per head (For the next and succeding hour)</li>
                                        <li class="left-align">Consumable of food and drinks.</li>
                                    </ul>
                                        <h6 class="center-align" style="font-size:1.3em"><b>Reservation</b></h6>
                                    <ul class="liststyle">
                                        <li class="left-align">No down payment</li>
                                        <li class="left-align">When the customer don't come within 30 minutes of the scheduled time of resrvation, the slot will be given to the other customer.</li>
                                    </ul>
                                </div>
                            </div>
                        </div><!--end of desktop version -->
                    </div>   
                </div> <!-- end of room 2-->

                <div id="room3" class="roomsoverlay row">
                    <div class="col s12 m12 l12 xl12">
                        <div class="showonmobileservices row">
                            <div class="col s12 m12 l12 xl12">
                                <div class="slider slideroverlay">
                                    <ul class="slides">
                                        <li><img src="img/services/overlayimages/ktv3/ktv3.jpg" alt=""></li>
                                        <li><img src="img/services/overlayimages/ktv3/ktv3.1.jpg" alt=""></li>
                                        <li><img src="img/services/overlayimages/ktv3/ktv3.2.jpg" alt=""></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col s12 m12 l12 xl12">
                                <div class="roomcontent">
                                     <h6 class="center-align" style="font-size:1.3em"><b>Terms and Condition</b></h6>
                                    <ul class="liststyle">
                                        <li class="left-align">Minimum of 5 persons.</li>
                                        <li class="left-align">Maximum of 15 persons.</li>
                                        <li class="left-align">&#8369;150 per head (For the first hour).</li>
                                        <li class="left-align">&#8369;100 per head (For the next and succeding hour)</li>
                                        <li class="left-align">Consumable of food and drinks.</li>
                                    </ul>
                                    <h6 class="center-align" style="font-size:1.3em"><b>Reservation</b></h6>
                                    <ul class="liststyle">
                                        <li class="left-align">No down payment</li>
                                        <li class="left-align">When the customer don't come within 30 minutes of the scheduled time of resrvation, the slot will be given to the other customer.</li>
                                    </ul>
                                </div>
                            </div>
                        </div><!--end of mobile version -->

                        <div class="showondesktopservices row">
                            <div class="col s12 m12 l5 xl5 offset-l1 offset-xl1">
                                <div class="slider slideroverlay">
                                    <ul class="slides">
                                        <li><img src="img/services/overlayimages/ktv3/ktv3.jpg" alt=""></li>
                                        <li><img src="img/services/overlayimages/ktv3/ktv3.1.jpg" alt=""></li>
                                        <li><img src="img/services/overlayimages/ktv3/ktv3.2.jpg" alt=""></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col s12 m12 l5 xl5">
                                <div class="roomcontent">
                                     <h6 class="center-align" style="font-size:1.3em"><b>Terms and Condition</b></h6>
                                    <ul class="liststyle">
                                        <li class="left-align">Minimum of 5 persons.</li>
                                        <li class="left-align">Maximum of 15 persons.</li>
                                        <li class="left-align">&#8369;150 per head (For the first hour).</li>
                                        <li class="left-align">&#8369;100 per head (For the next and succeding hour)</li>
                                        <li class="left-align">Consumable of food and drinks.</li>
                                    </ul>
                                    <h6 class="center-align" style="font-size:1.3em"><b>Reservation</b></h6>
                                    <ul class="liststyle">
                                        <li class="left-align">No down payment</li>
                                        <li class="left-align">When the customer don't come within 30 minutes of the scheduled time of resrvation, the slot will be given to the other customer.</li>
                                    </ul>
                                </div>
                            </div>
                        </div> <!--end of desktop version-->
                    </div>
                </div> <!-- end of Room 3 -->
            </section>

            <section id="martinascontainer" class="overlay">
                <div id="packageone" class="roomsoverlay row">
                    <div class="col s12 m12 l12 xl12">
                        <div class="row showonmobileservices">
                            <div class="col s12 m12 l12 x12">
                                <div class="slider slideroverlay">
                                    <ul class="slides">
                                        <li><img src="img/services/overlayimages/ktv1/20180117_112828.jpg" alt=""></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col s12 m12 l12 xl12">
                                <div class="roomcontent">
                                     <h5 class="center-align" style="font-size:1.3em"><b>Terms and Condition</b></h5>
                                     <h6><b>Package 1.</b> Seven thousand (&#8369;7,000)</h6>
                                     <ul class="liststyle">
                                        <li class="left-align">Minimum capacity of 100 persons.</li>
                                        <li class="left-align">Sound system with DJ.</li>
                                        <li class="left-align">Tables and chairs</li>
                                        <li class="left-align">Personal powder room.</li>
                                        <li class="left-align">Air condition.</li>
                                        <li class="left-align">Preparation time is one hour.</li>
                                        <li class="left-align">Operating party time is 6 hours.</li>
                                        <li class="left-align">Additional five hundred (&#8369;500) for the next and succeding hours.</li>
                                    </ul>
                                    <h5 class="center-align" style="font-size:1.3em"><b>Reservation</b></h5>
                                    <ul class="liststyle">
                                        <li class="left-align">Minimum deposit at least one thousand (&#8369;1000).</li>
                                        <li class="left-align">No confirmation of arrival will cancel the reservation.</li>
                                    </ul>
                                </div> 
                            </div>
                        </div> <!--End Of mobile version -->

                        <div class="row showondesktopservices">
                            <div class="col s12 m12 l5 xl5 offset-l1 offset-xl1">
                                <div class="slider slideroverlay">
                                    <ul class="slides">
                                        <li><img src="img/services/overlayimages/ktv1/20180117_112828.jpg" alt=""></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col s12 m12 l5 xl5">
                                <div class="roomcontent martinascontent">
                                    <h5 class="center-align" style="font-size:1.3em"><b>Terms and Condition</b></h5>
                                    <h6><b>Package 1.</b> Seven thousand (&#8369;7,000)</h6>
                                    <ul class="liststyle">
                                        <li class="left-align">Minimum capacity of 100 persons.</li>
                                        <li class="left-align">Sound system with DJ.</li>
                                        <li class="left-align">Tables and chairs</li>
                                        <li class="left-align">Personal powder room.</li>
                                        <li class="left-align">Air condition.</li>
                                        <li class="left-align">Preparation time is one hour.</li>
                                        <li class="left-align">Operating party time is 6 hours.</li>
                                        <li class="left-align">Additional five hundred (&#8369;500) for the next and succeding hours.</li>
                                    </ul>
                                    <h5 class="center-align" style="font-size:1.3em"><b>Reservation</b></h5>
                                    <ul class="liststyle">
                                        <li class="left-align">Minimum deposit at least one thousand (&#8369;1000).</li>
                                        <li class="left-align">No confirmation of arrival will cancel the reservation.</li>
                                    </ul>
                                </div>
                            </div>
                        </div> <!-- end of desktop version -->
                    </div>
                </div> <!--End of Room One-->


                <div id="packagetwo" class="roomsoverlay row">
                    <div class="col s12 m12 l12 xl12">
                        <div class="row showonmobileservices">
                            <div class="col s12 m12 l12 x12">
                                <div class="slider slideroverlay">
                                    <ul class="slides">
                                        <li><img src="img/services/overlayimages/ktv1/20180117_112828.jpg" alt=""></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col s12 m12 l12 xl12">
                                <div class="roomcontent ">
                                     <h5 class="center-align" style="font-size:1.3em"><b>Terms and Condition</b></h5>
                                     <h6><b>Package 2.</b> Ten thousand (&#8369;10,000)with extension.</h6>
                                     <ul class="liststyle">
                                        <li class="left-align">Minimum capacity of 150 persons.</li>
                                        <li class="left-align">Sound system with DJ.</li>
                                        <li class="left-align">Tables and chairs</li>
                                        <li class="left-align">Personal powder room.</li>
                                        <li class="left-align">Air condition.</li>
                                        <li class="left-align">Available room.</li>
                                        <li class="left-align">Projector.</li>
                                        <li class="left-align">Preparation time is one hour.</li>
                                        <li class="left-align">Operating party time is 6 hours.</li>
                                        <li class="left-align">Additional five hundred (&#8369;500) for the next and succeding hours.</li>
                                    </ul>
                                    <h5 class="center-align" style="font-size:1.3em"><b>Reservation</b></h5>
                                    <ul class="liststyle">
                                        <li class="left-align">Minimum deposit at least one thousand (&#8369;1000).</li>
                                        <li class="left-align">No confirmation of arrival will cancel the reservation.</li>
                                    </ul>
                                </div> 
                            </div>
                        </div> <!--End Of mobile version -->

                        <div class="row showondesktopservices">
                            <div class="col s12 m12 l5 xl5 offset-l1 offset-xl1">
                                <div class="slider slideroverlay">
                                    <ul class="slides">
                                        <li><img src="img/services/overlayimages/ktv1/20180117_112828.jpg" alt=""></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col s12 m12 l5 xl5">
                                <div class="roomcontent martinascontent">
                                    <h5 class="center-align" style="font-size:1.3em"><b>Terms and Condition</b></h5>
                                    <h6><b>Package 2.</b> Ten thousand (&#8369;10,000)with extension.</h6>
                                    <ul class="liststyle">
                                        <li class="left-align">Minimum capacity of 150 persons.</li>
                                        <li class="left-align">Sound system with DJ.</li>
                                        <li class="left-align">Tables and chairs</li>
                                        <li class="left-align">Personal powder room.</li>
                                        <li class="left-align">Air condition.</li>
                                        <li class="left-align">Available room.</li>
                                        <li class="left-align">Projector.</li>
                                        <li class="left-align">Preparation time is one hour.</li>
                                        <li class="left-align">Operating party time is 6 hours.</li>
                                        <li class="left-align">Additional five hundred (&#8369;500) for the next and succeding hours.</li>
                                    </ul>
                                    <h5 class="center-align" style="font-size:1.3em"><b>Reservation</b></h5>
                                    <ul class="liststyle">
                                        <li class="left-align">Minimum deposit at least one thousand (&#8369;1000).</li>
                                        <li class="left-align">No confirmation of arrival will cancel the reservation.</li>
                                    </ul>
                                </div>
                            </div>
                        </div> <!-- end of desktop version -->
                    </div>
                </div> <!--End of Room Two-->
                
            </section>
        </div>
    </div>
    <header>
        <nav class="brown darken-4 ">
            <div class="nav-wrapper">
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
                                        <li><a href="menu/muffins">Muffins</a></li>
                                        <li><a href="menu/cakes.php">Cakes</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </li>
                    <li class="white-text"><a href="services.php" style="color:brown;">SERVICES</a></li>
                    <li class="white-text"><a href="gallery.php">GALLERY</a></li>
                    <li class="white-text"><a href="aboutus.php">ABOUT US</a></li>
                    <li class="white-text"><a href="faq.php">FAQ'S</a></li>
                    <li class="white-text"><a href="contactus.php">CONTACT US</a></li>
                </ul>
                <ul class="side-nav brown darken-3" id="mobile-demo">
                    <li><a class="white-text" href="index.php">HOME</a></li>
                    <li><a class="white-text" href="menu.php" >OUR MENU</a></li>
                    <li><a href="services.php" style="color:brown;">SERVICES</a></li>
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
            <div class="col s12 m12 l12 xl12"></div>
        </div>
        <div class="row">
            <div class="col s12 m12 l12 xl12"></div>
        </div>
        <div class="row">
            <div class="col s12 m12 l12 xl12"></div>
        </div>
        <div class="row boxservices">
            <div class="col s12 m12 l12 xl12">
                <div class="row">
                    <h4 class="center-align servicestitle">KTV</h4>
                    <div class="container">
                        <p class="center-align description">A must try family KARAOKE television in town.</p>
                        <p class="center-align description" style="font-size:1.3em;">KTV, Brings you the reason to  celebrate and gather!</p>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l12 xl12">
                <div class="row">
                    <div class="col s12 m12 l4 xl4 modal-trigger" data-target="modal1">
                        <div class="row">
                            <div class="col s12 m12 l12 xl12 rooms showmoreoverlay">
                                <div class="overlaycontent">
                                    <h5>Room one</h5>
                                    <h6>Show More</h6>
                                </div>
                                <figure id="ktv1"></figure>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m12 l4 xl4 modal-trigger" data-target="modal2">
                        <div class="row">
                            <div class="col s12 m12 l12 xl12 rooms showmoreoverlay">
                                <div class="overlaycontent">
                                    <h5>Room two</h5>
                                    <h6>Show More</h6>
                                </div>
                                <figure id="ktv2"></figure>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m12 l4 xl4 modal-trigger" data-target="modal3">
                        <div class="row">
                            <div class="col s12 m12 l12 xl12 rooms showmoreoverlay">
                                 <div class="overlaycontent">
                                    <h5>Room three</h5>
                                    <h6>Show More</h6>
                                </div>
                                <figure id="ktv3"></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row boxservices">
            <div class="col s12 m12 l12 xl12">
                <div class="row">
                    <h4 class="center-align servicestitle">Martinas</h4>
                      <div class="container">
                        <p class="center-align description">We cater, Wedding, Baptismal, Christmas Party, Birthday , Reunion.</p>
                        <p class="center-align description" style="font-size:1.3em; ">Celebrate with fun and excitement!</p>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l12 xl12">
                <div class="row">
                    <div class="col s12 m12 l6 xl6">
                        <div class="row">
                            <div class="col s12 m12 l12 xl12 martinas showmoreoverlay">
                                <div class="overlaycontent">
                                    <h5>Package one</h5>
                                    <h6>Show More</h6>
                                </div>
                                <figure id="martinasone"></figure>
                            </div>
                        </div>
                        <!-- <img class="materialboxed" width="100%" src="img/services/martinas/martinas1.JPG"> -->
                    </div>
                    <div class="col s12 m12 l6 xl6">
                        <div class="row">
                            <div class="col s12 m12 l12 xl12 martinas showmoreoverlay">
                                 <div class="overlaycontent">
                                    <h5>Package two</h5>
                                    <h6>Show More</h6>
                                </div>
                                <figure id="martinastwo"></figure>
                            </div>
                        </div>
                        <!-- <img class="materialboxed" width="100%" src="img/services/martinas/martinas2.JPG"> -->
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
    <!-- <script src="js/main.js" type="text/javascript"></script> -->
    <script>
        $(document).ready(function(){
            $(".button-collapse").sideNav({
                edge: 'left',
            });
   
            $('.materialboxed').materialbox();
            $(".slider").slider({
                duration: 400,
            });
         });
    </script>
    <!-- overlay function -->
    <script type="text/javascript" src="js/overlay.js"></script>
</body>
</html>