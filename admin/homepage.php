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
    <title>Admin Homepages</title>
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
                                <li>
                                    <a href="homepage.php" class="white-text left-align">Home
                                        <i class="tiny material-icons left white-text">home</i>
                                    </a>
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
                                <li>
                                    <a href="services.php" class="white-text left-align">Services
                                        <i class="tiny material-icons left white-text">style</i>
                                    </a>
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
            <!--  <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header left-align admincolor white-text">authetication
                            <i class="material-icons left white-text">fingerprint</i>
                        </a>
                        <div class="collapsible-body admincolor">
                            <ul>
                                <li>
                                    <a href="filter.php" class="white-text left-align">Request
                                        <i class="tiny material-icons  white-text left">blur_circular</i>
                                    </a>
                                </li>
                                <li>
                                    <a href="registrationadmin.php" class="white-text left-align">Registration
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
                            <a href="#!" class="breadcrumb">Pages</a>
                            <a href="#!" class="breadcrumb">Home</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row showontablet">
            <div class="m12"></div>
        </div>
         <div class="row showontablet">
            <div class="m12"></div>
        </div>
         <div class="row showontablet">
            <div class="m12"></div>
        </div>
        <div class="row">
            <div class="col s12 m12 l12 xl12 header">
                <h1 class="center-align fontpages">Homepage Content</h1>
            </div>
        </div>
        <div class="row">
            <div class="col s8 m8 offset-m2 offset-s2 xl4 offset-xl1 offset-l1 l4 blue-grey darken-4 z-depth-3 homepagecategory">
                <div class="header">
                    <h5 class="center-align white-text">Slider</h5>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12 xl12"></div>
                </div>
                 <div class="row removetabletandmobile">
                    <div class="col s12 m12 l12 xl12"></div>
                </div>
                 <div class="row removetabletandmobile">
                    <div class="col s12 m12 l12 xl12"></div>
                </div>
                <div class="row">
                    <a href="slideredit.php" class="btn  brown darken-2 waves-light waves-effect col s6 xl4 l5 m4 offset-s3 offset-m4 offset-l4 offset-xl4"><i class="material-icons left">edit</i>Edit</a>                    
                </div>
            </div>
            <div class="row removerowonhomepage">
                <div class="col s12 m12 l12 xl12"></div>
            </div>
            <div class="col s8 m8 offset-m2 offset-s2 offset-xl2 offset-l2 xl4 l4 blue-grey darken-4 z-depth-3 homepagecategory">
                <div class="header">
                    <h5 class="center-align white-text">BestSeller</h5>
                </div>
                 <div class="row">
                    <div class="col s12 m12 l12 xl12"></div>
                </div>
                 <div class="row removetabletandmobile">
                    <div class="col s12 m12 l12 xl12"></div>
                </div>
                 <div class="row removetabletandmobile">
                    <div class="col s12 m12 l12 xl12"></div>
                </div>
                <div class="row">
                    <a href="bestseller.php" class="btn brown darken-2 waves-light waves-effect col s6 xl4 l5 m4 offset-s3  offset-m4 offset-l4 offset-xl4"><i class="material-icons left">edit</i>Edit</a>                    
                </div>
            </div>
        </div>
         <div class="row">
            <div class="col s8 m8 offset-m2 offset-s2 xl4 offset-xl1 offset-l1 l4 blue-grey darken-4 z-depth-3 homepagecategory">
                <div class="header">
                    <h5 class="center-align white-text">New Product</h5>
                </div>
                 <div class="row">
                    <div class="col s12 m12 l12 xl12"></div>
                </div>
                 <div class="row removetabletandmobile">
                    <div class="col s12 m12 l12 xl12"></div>
                </div>
                 <div class="row removetabletandmobile">
                    <div class="col s12 m12 l12 xl12"></div>
                </div>
                <div class="row">
                    <a href="newproduct.php" class="btn brown darken-2 waves-light waves-effect col s6 xl4 l5 m4 offset-s3 offset-m4 offset-l4 offset-xl4"><i class="material-icons left">edit</i>Edit</a>                    
                </div>
            </div>
             <div class="row removerowonhomepage">
                <div class="col s12 m12 l12 xl12"></div>
            </div>
            <div class="col s8 m8 offset-m2 offset-s2 offset-xl2 xl4 offset-l2 l4 blue-grey darken-4 z-depth-3 homepagecategory">
                <div class="header">
                    <h5 class="center-align white-text">Promos</h5>
                </div>
                 <div class="row">
                    <div class="col s12 m12 l12 xl12"></div>
                </div>
                 <div class="row">
                    <div class="col s12 m12 l12 xl12"></div>
                </div>
                 <div class="row removetabletandmobile">
                    <div class="col s12 m12 l12 xl12"></div>
                </div>
                <div class="row">
                    <a href="promos.php" class="btn brown darken-2 waves-light waves-effect col s6 xl4 l5 m4 offset-s3 offset-m4 offset-l4 offset-xl4"><i class="material-icons left">edit</i>Edit</a>                    
                </div>
            </div>
        </div>
   </main>
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

</body>
<?php $_SESSION['registrationsuccess'] = null;?>
</html>