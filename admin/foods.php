<?php require "connection.php"; ?>

<?php 
    session_start();
    // check if there already login admin
    //require "sessiontimeout.php";

    $_SESSION['accountnew'] = false;

    if (!isset($_SESSION['username']) && empty($_SESSION['username'])) {
        header("location:login.php");
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
    <title>Food Settings</title>
    <link rel="stylesheet" type="text/css" href="../css/normalize.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" media="screen, projection"> -->
    <link rel="stylesheet" type="text/css" href="../css/materialize.min.css" media="screen, projection">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <?php 
        if(isset($_SESSION['sessionexpnotifacation'])) {
            echo $_SESSION['sessionexpnotifacation'];
            $_SESSION['sessionexpnotifacation'] = null;
            header("location:login.php");
        }       
    ?>
    <style type="text/css">
    </style>
</head>

<body>
    <header class="headerstyle">
        <ul id="dropdown1" class="dropdown-content admincolor adminlinks">
            <li><a href="editaccount.php">Change Password</a></li>
            <li><a href="logout.php">Log Out</a></li> 
        </ul>
        <nav>
            <div class="nav-wrapper adminnavbar admincolor">
                <a href="#" class="brand-logo center-align brand-logomobile"><img class="logo-brand" src="../img/logo/cofftealogo.png" width="100px" heigth="100px" alt=""></a>
                <ul class="right hide-on-med-and-down">
                    <li>
                        <a class="dropdown-button" href="#!" data-activates="dropdown1">admin
                            <i class="material-icons right white-text">arrow_drop_down</i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="row">
            <div class="col s12 m12 l12 xl12"></div>
        </div>
        <ul id="slide-out" class="side-nav admincolor fixed  sidenavstyle">
            <li>
                <h1 class="center-align white-text usernametextadmin">Coffteazone Admin</h1>
            </li>
            <li class="logostyle">
                <a href="dashboard.php" class="center-align"><img src="../img/logo/cofftealogo.png" width="80px" height="80px" srcset=""></a>
            </li>
            <li>
                <a href="dashboard.php" class="left-align white-text sidenavmainlinks">
                    <span>Dashboard</span><i class="left material-icons white-text">dashboard</i>
                </a>
            </li>
            
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header left-align admincolor white-text">Pages
                            <i class="material-icons left white-text">description</i>
                        </a>
                        <div class="collapsible-body admincolor">
                            <ul>
                                <li class="no-padding">
                                    <ul class="collapsible collapsible-accordion">
                                        <li>
                                             <a href="#!" class="collapsible-header left-align admincolor white-text">Home
                                                <i class="tiny material-icons left white-text">home</i>
                                             </a>
                                            <div class="collapsible-body admincolor">
                                                <ul>
                                                    <li>
                                                        <a href="slideredit.php" class="white-text left-align indent" style="font-size:.7em !important;">Slider
                                                            <i class="tiny material-icons left white-text">slideshow</i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="bestseller.php" class="white-text left-align indent" style="font-size:.7em !important;">Bestseller
                                                            <i class="tiny material-icons left white-text">monetization_on</i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="newproduct.php" class="white-text left-align indent" style="font-size:.6em !important;">New Prod.
                                                            <i class="tiny material-icons left white-text">fiber_new</i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="promos.php" class="white-text left-align indent" style="font-size:.7em !important;">Promos
                                                            <i class="tiny material-icons left white-text">new_releases</i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="no-padding">
                                    <ul class="collapsible collapsible-accordion">
                                        <li>
                                            <a href="#!" class="collapsible-header white-text left-align">Our Menu
                                                <i class="tiny material-icons left white-text">local_cafe</i>
                                            </a>
                                            <div class="collapsible-body admincolor">
                                                <ul>
                                                    <li>
                                                        <a href="drinks.php" class="white-text left-align indent">Drinks
                                                            <i class="tiny material-icons left white-text">local_bar</i>
                                                        </a>
                                                    </li>
                                                     <li>
                                                         <a href="foods.php" class="white-text left-align indent">Foods
                                                            <i class="tiny material-icons left white-text">local_dining</i>
                                                        </a>
                                                    </li>
                                                     <li>
                                                         <a href="dessert.php" class="white-text left-align indent">Dessert
                                                            <i class="tiny material-icons left white-text">cake</i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="no-padding">
                                    <ul class="collapsible collapsible-accordion">
                                        <li>
                                            <a href="#!" class="collapsible-header left-align admincolor white-text">
                                                <span>Gallery</span>
                                                <i class="left tiny material-icons white-text">photo_library</i>
                                            </a>
                                            <div class="collapsible-body admincolor">
                                                <ul>
                                                    <li>
                                                        <a href="galleryview.php" class="white-text left-align indentgallery" style="font-size:.8em !important;">View Album
                                           
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="addimages.php" class="white-text left-align indentgallery" style="font-size:.8em !important;">Add Images
                                                    
                                                        </a>
                                                    </li>
                                                     <li>
                                                        <a href="galleryalbumadd.php" class="white-text left-align indentgallery" style="font-size:.8em !important;">Add Album
                                                       
                                                        </a>
                                                    </li>
                                                     <li>
                                                        <a href="deletealbum.php" class="white-text left-align indentgallery" style="font-size:.8em !important;">Delete Album
                                                            
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>    
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="contactus.php" class="white-text left-align">Contact Us
                                        <i class="tiny material-icons left white-text">local_phone</i>
                                    </a>
                                </li>
                            
                                <li class="no-padding">
                                    <ul class="collapsible collapsible-accordion">
                                        <li>
                                            <a href="#!" class="collapsible-header left-align admincolor white-text">
                                                <span>About us</span>
                                                <i class="left tiny material-icons white-text">photo_library</i>
                                            </a>
                                            <div class="collapsible-body admincolor">
                                                <ul>
                                                    <li>
                                                        <a href="history.php" class="white-text left-align indent" style="font-size:.8em !important;">History
                                                            <i class="tiny material-icons  white-text left">access_time</i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="historyimages.php" class="white-text left-align indent" style="font-size:.8em !important;">images
                                                            <i class="tiny material-icons  white-text left">access_time</i>
                                                        </a>
                                                    </li>
                                                     <li>
                                                        <a href="vision.php" class="white-text left-align indent" style="font-size:.8em !important;">Vision
                                                            <i class="tiny material-icons  white-text left">remove_red_eye</i>
                                                        </a>
                                                    </li>
                                                     <li>
                                                        <a href="mission.php" class="white-text left-align indent" style="font-size:.8em !important;">Mission
                                                            <i class="tiny material-icons  white-text left">flag</i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>    
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a href="#!" class="collapsible-header left-align admincolor white-text sidenavmainlinks">
                            <span>Messages</span>
                            <i class="left material-icons white-text">contact_mail</i>
                        </a>
                        <div class="collapsible-body admincolor">
                            <ul>
                                <li>
                                    <a href="feedback.php" class="white-text left-align">Feedback
                                        <i class="tiny material-icons  white-text left">inbox</i>
                                    </a>
                                </li>
                            </ul>
                        </div>       
                    </li>
                </ul>
            </li>
             <!-- <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header left-align admincolor white-text">authetication
                            <i class="material-icons left white-text">fingerprint</i>
                        </a>
                        <div class="collapsible-body admincolor">
                            <ul>
                                <li>
                                    <a href="../filter.php" class="white-text left-align">Request
                                        <i class="tiny material-icons  white-text left">blur_circular</i>
                                    </a>
                                </li>
                                <li>
                                    <a href="../registrationadmin.php" class="white-text left-align">Registration
                                        <i class="tiny material-icons white-text left">person_add</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li> -->
            <li class="no-padding admincolor adminprofilemobile">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a  class="collapsible-header left-align admincolor white-text">Admin
                            <i class="material-icons left white-text">arrow_drop_down</i>
                        </a>
                        <div class="collapsible-body admincolor">
                            <ul>
                                <li>
                                    <a href="editaccount.php" class="white-text left-align">Change Password
                                        <i class="tiny material-icons white-text left">fingerprint</i>
                                    </a>
                                </li>
                                <li>
                                    <a href="logout.php" class="white-text left-align">Logout
                                        <i class="tiny material-icons white-text left">input</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
        <a href="#" data-activates="slide-out" class="button-collapse">
            <i class="material-icons brown-text text-darken-4 adminmenu">menu</i>
        </a>
    </header>
    <main>
        <div class="row">
            <div class="col s12 m12 l12 xl12">   
                <nav class="removebreadcrumbsstyle">
                    <div class="nav-wrapper">
                        <div class="col s12 m12 l12 xl12">
                            <a href="pages.php" class="breadcrumb">Pages</a>
                            <a href="#!" class="breadcrumb">Our Menu</a>
                            <a href="foods.php" class="breadcrumb">Foods</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
         <div class="row showontabletmenu">
            <div class="col s12 m12 l12 xl12"></div>
        </div>
        <div class="row showontabletmenu">
            <div class="col s12 m12 l12 xl12"></div>
        </div>
        <div class="row showontabletmenu">
            <div class="col s12 m12 l12 xl12"></div>
        </div>
         <div class="row">
            <div class="col s12 m12 l12 xl12">
                <div class="header">
                    <h4 class="pagetitle">Foods</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12 l10 xl10">
                <div class="row">
                    <div class="col s10 m10 l2 xl2 offset-s1 offset-m1 boxcolor">
                        <div class="row">
                            <h6 class="col s12 m12 xl12 l12 white-text center-align">Starter</h6>
                        </div>
                        <div class="row">
                            <a href="../admin/menu/starter.php" class="btn waves-light waves-effect col  btncolor offset-xl3 offset-l3 offset-s3 offset-m3 s6 m6 xl6 l6 white-text center-align">Edit</a>
                        </div>
                    </div>
                    <div class="row showtabletandmobilemenu">
                        <div class="col s12 m12 "></div>
                    </div>
                    <div class="col s10 m10 l2 xl2 offset-s1 offset-m1 offset-l1 offset-xl1 boxcolor">
                        <div class="row">
                            <h6 class="col s12 m12 xl12 l12 white-text center-align">Burger &amp; Sand.</h6>
                        </div>
                        <div class="row">
                                <a href="../admin/menu/burgersandsandwiches.php" class="btn waves-light waves-effect col  btncolor offset-xl3 offset-l3 offset-s3 offset-m3 s6 m6 xl6 l6 white-text center-align">Edit</a>
                        </div>
                    </div>
                    <div class="row showtabletandmobilemenu">
                        <div class="col s12 m12 "></div>
                    </div>
                    <div class="col s10 m10 l2 xl2 offset-s1 offset-m1 offset-l1 offset-xl1 boxcolor">
                        <div class="row">
                            <h6 class="col s12 m12 xl12 l12 white-text center-align">Pizza</h6>
                        </div>
                        <div class="row">
                                <a href="../admin/menu/pizza.php" class="btn waves-light waves-effect col btncolor  offset-xl3 offset-l3 offset-s3 offset-m3 s6 m6 xl6 l6 white-text center-align">Edit</a>
                        </div> 
                    </div>
                        <div class="row showtabletandmobilemenu">
                        <div class="col s12 m12 "></div>
                    </div>
                    <div class="col s10 m10 l2 xl2 offset-s1 offset-m1 offset-l1 offset-xl1 boxcolor">
                        <div class="row">
                            <h6 class="col s12 m12 xl12 l12 white-text center-align">Soup</h6>
                        </div>
                        <div class="row">
                                <a href="../admin/menu/soup.php" class="btn waves-light waves-effect col btncolor offset-xl3 offset-l3 offset-s3 offset-m3 s6 m6 xl6 l6 white-text center-align">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l10 xl10">
                <div class="row">
                    <div class="col s10 m10 l2 xl2 offset-s1 offset-m1 boxcolor">
                        <div class="row">
                            <h6 class="col s12 m12 xl12 l12 white-text center-align">Main Course</h6>
                        </div>
                        <div class="row">
                                <a href="../admin/menu/maincourse.php" class="btn waves-light waves-effect col btncolor offset-xl3 offset-l3 offset-s3 offset-m3 s6 m6 xl6 l6 white-text center-align">Edit</a>
                        </div>
                    </div>
                    <div class="row showtabletandmobilemenu">
                        <div class="col s12 m12 "></div>
                    </div>
                    <div class="col s10 m10 l2 xl2 offset-s1 offset-m1 offset-l1 offset-xl1 boxcolor">
                        <div class="row">
                            <h6 class="col s12 m12 xl12 l12 white-text center-align">Group Meals</h6>
                        </div>
                        <div class="row">
                                <a href="../admin/menu/groupmeals.php" class="btn waves-light waves-effect col btncolor offset-xl3 offset-l3 offset-s3 offset-m3 s6 m6 xl6 l6 white-text center-align">Edit</a>
                        </div>
                    </div>
                        <div class="row showtabletandmobilemenu">
                        <div class="col s12 m12 "></div>
                    </div>
                    <div class="col s10 m10 l2 xl2 offset-s1 offset-m1 offset-l1 offset-xl1 boxcolor">
                        <div class="row">
                            <h6 class="col s12 m12 xl12 l12 white-text center-align">Platter</h6>
                        </div>
                        <div class="row">
                                <a href="../admin/menu/platter.php" class="btn waves-light waves-effect col btncolor offset-xl3 offset-l3 offset-s3 offset-m3 s6 m6 xl6 l6 white-text center-align">Edit</a>
                        </div>
                    </div>
                        <div class="row showtabletandmobilemenu">
                        <div class="col s12 m12 "></div>
                    </div>
                    <div class="col s10 m10 l2 xl2 offset-s1 offset-m1 offset-l1 offset-xl1 boxcolor">
                        <div class="row">
                            <h6 class="col s12 m12 xl12 l12 white-text center-align">Pasta</h6>
                        </div>
                        <div class="row">
                                <a href="../admin/menu/pasta.php" class="btn waves-light waves-effect col btncolor offset-xl3 offset-l3 offset-s3 offset-m3 s6 m6 xl6 l6 white-text center-align">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l10 xl10">
                <div class="row">
                    <div class="col s10 m10 l2 xl2 offset-s1 offset-m1 boxcolor">
                        <div class="row">
                            <h6 class="col s12 m12 xl12 l12 white-text center-align">Promos</h6>
                        </div>
                        <div class="row">
                                <a href="promos.php" class="btn waves-light waves-effect col btncolor offset-xl3 offset-l3 offset-s3 offset-m3 s6 m6 xl6 l6 white-text center-align">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
            <div class="col s12 m12 l12 xl12"></div>
        </div>
        <div class="row">
            <div class="col s12 m12 l12 xl12"></div>
        </div>
        <div class="row">
            <div class="col s12 m12 l12 xl12"></div>
        </div>
    </main>
   
    <!-- for development javascript file -->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>

    <!-- for production ready javascript file -->
    <!-- uncomment all the script for production used -->
    
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js" type="text/javascript"></script>
     -->
    <script src="../js/main.js" type="text/javascript"></script>

</body>

</html>