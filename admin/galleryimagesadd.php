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
    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../img/logo/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="../img/logo/favicon.ico" type="image/x-icon" />
    <title>Add Images in to Gallery</title>
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
    <header class="headerstyle red darken-4">
        <ul id="dropdown1" class="dropdown-content admincolor adminlinks">
            <li><a href="profile.php">Profile</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
        <nav>
            <div class="nav-wrapper adminnavbar admincolor">
                <a href="#" class="brand-logo center-align brand-logomobile"><img src="../img/logo/cofftealogo.png" width="50%" heigth="50%" alt=""></a>
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
            <li class="logostyle">
                <a href="dashboard.php" class="center-align"><img src="../img/logo/cofftealogo.png" width="70%" height="100%" srcset=""></a>
            </li>
            <li>
                <a href="dashboard.php" class="left-align white-text sidenavmainlinks">
                    <span>Dashboard</span><i class="left material-icons white-text">dashboard</i>
                </a>
            </li>
            <li>
                <a href="users.php" class="left-align white-text sidenavmainlinks">
                    <span>Users</span>
                    <i class="left material-icons white-text">person</i>
                </a>
            </li>
            <li class="no-padding">
                <ul class="collasible collapsible-accordion">
                    <li>
                         <a href="#!" class="left-align white-text sidenavmainlinks">
                            <span>Maintenance</span>
                            <i class="left material-icons white-text">build</i>
                        </a>
                        <div class="collapsible-body admincolor">
                            <ul>
                                <li>
                                    <a href="securityquestion.php" class="white-text left-align">Inbox
                                        <i class="tiny material-icons  white-text left">inbox</i>
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
                                                        <a href="drinks.php" class="white-text left-align">Drinks
                                                            <i class="tiny material-icons left white-text">local_bar</i>
                                                        </a>
                                                    </li>
                                                     <li>
                                                         <a href="foods.php" class="white-text left-align">Foods
                                                            <i class="tiny material-icons left white-text">local_dining</i>
                                                        </a>
                                                    </li>
                                                     <li>
                                                         <a href="dessert.php" class="white-text left-align">Dessert
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
                                <li>
                                    <a href="gallery.php" class="white-text left-align">Gallery
                                        <i class="tiny material-icons left white-text">photo_library</i>
                                    </a>
                                </li>
                                <li>
                                    <a href="contactus.php" class="white-text left-align">Contact Us
                                        <i class="tiny material-icons left white-text">local_phone</i>
                                    </a>
                                </li>
                                <li>
                                    <a href="faq.php" class="white-text left-align">FAQ
                                        <i class="tiny material-icons left white-text">help</i>
                                    </a>
                                </li>
                                <li>
                                    <a href="aboutus.php" class="white-text left-align">About Us
                                        <i class="tiny material-icons left white-text">person_pin</i>
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
                        <a href="#!" class="collapsible-header left-align admincolor white-text sidenavmainlinks">
                            <span>Messages</span>
                            <i class="left material-icons white-text">contact_mail</i>
                        </a>
                        <div class="collapsible-body admincolor">
                            <ul>
                                <li>
                                    <a href="inbox.php" class="white-text left-align">Inbox
                                        <i class="tiny material-icons  white-text left">inbox</i>
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
                        <a class="collapsible-header left-align admincolor white-text">authetication
                            <i class="material-icons left white-text">fingerprint</i>
                        </a>
                        <div class="collapsible-body admincolor">
                            <ul>
                                <li>
                                    <a href="filter.php" class="white-text left-align">Filter
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
            </li>
            <li class="no-padding admincolor adminprofilemobile">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a  class="collapsible-header left-align admincolor white-text">Admin
                            <i class="material-icons left white-text">arrow_drop_down</i>
                        </a>
                        <div class="collapsible-body admincolor">
                            <ul>
                                <li>
                                    <a href="profile.php" class="white-text left-align">Profile
                                        <i class="tiny material-icons  white-text left">face</i>
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
    <main class="red darken-4">
        <div class="row dashboarddevicefixed">
            <div class="col s12 m12 l12 xl12"></div>
        </div>
        <div class="row dashboarddevicefixed">
            <div class="col s12 m12 xl12 l12"></div>
        </div>
        <div class="row dashboarddevicefixed">
            <div class="col s12 m12 xl12 l12"></div>
        </div>
         <div class="row ">
            <div class="col s12 m12 xl12 l12"></div>
        </div>
        
       
        <div class="row">
            <div class="row ">
                <div class="col s12 m12 xl12 l12">
                    <h4 class="center-align white-text">Dashboard</h4>
                </div>
            </div>
            <?php
                if(isset($_SESSION['registrationsuccess'])) {
                    echo "<div class=\"row\">\n";
                    echo "<div class=\"col s12 m12 l6 xl6 green darken-3\">\n";
                    echo "". $_SESSION['registrationsuccess']."";
                    echo "</div>\n";
                    echo "</div>\n";
                }
            ?>
            <a href="users.php">
                <div class="col s8 m8 offset-m2 offset-s2 xl4 offset-xl1 offset-l1 l4 blue-grey darken-4 z-depth-3">
                    <div class="header">
                        <h3 class="white-text center-align">Users</h3>
    
                    </div>
                    <div class="row">
                        <div class="col s12 m12 xl12 l12 white">
                            <i class="large  dashboardicons material-icons">account_circle</i>
                            <span class="badge brown darken-4 white-text">
                                <?php
                                    $admiuserenable = "SELECT * FROM tbl_admin";
                                    $adminuserdisable = "SELECT * FROM tbl_admin_disable";
                                    $filterDataEnable = mysqli_query($connection , $admiuserenable);
                                    $filterDataDisable = mysqli_query($connection, $adminuserdisable);
                                    echo mysqli_num_rows($filterDataEnable) + mysqli_num_rows($filterDataDisable);
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
            </a>
             <div class="row showmobile">
                <div class="col s12 m12 l12 xl12"></div>
            </div>
            <div class="row showmobile">
                <div class="col s12 m12 l12 xl12"></div>
            </div>
             <!-- <div class="row showmobile">
                <div class="col s12 m12 l12 xl12"></div>
            </div>
            <div class="row showmobile">
                <div class="col s12 m12 l12 xl12"></div>
            </div>
            <div class="row showmobile">
                <div class="col s12 m12 l12 xl12"></div>
            </div> -->
            <a href="pages.php">
                <div class="col s8 m8 offset-m2 offset-s2 offset-xl2 xl4 offset-l2 l4 blue-grey darken-4 z-depth-3">
                    <div class="header">
                        <h3 class="white-text center-align">Pages</h3>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 xl12 l12 white">
                            <i class="large material-icons dashboardicons md-light">description</i>
                            <span class="badge brown darken-4 white-text">
                                <?php
                                    $listFile = exec("ls -l menu/ | grep ^- | wc -l");
                                    echo $listFile;
                                ?>
                            </span>
                        </div>
                    </div>     
                </div>
            </a>
        </div>
        <div class="row">
            <div class="col s12 m12 xl12 l12"></div>
        </div>
        <!-- <div class="row">
            <div class="col s12 m12 xl12 l12"></div>
        </div> -->
         <!-- <div class="row">
            <div class="col s12 m12 xl12 l12"></div>
        </div>
        <div class="row">
            <div class="col s12 m12 xl12 l12"></div>
        </div> -->
        <div class="row">
             <a href="messages.php">
                <div class="col s8 m8 offset-m2 offset-s2 xl4 offset-xl1 offset-l1 l4 blue-grey darken-4 z-depth-3">
                    <div class="header">
                        <h3 class="white-text center-align">Messages</h3>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 xl12 l12 white">
                            <i class="large dashboardicons material-icons">email</i>
                            <span class="badge darken-4 white-text">
                                <?php
                                    $sql = "SELECT * FROM tbl_message";
                                    $filterData = mysqli_query($connection , $sql);
                                    echo mysqli_num_rows($filterData);
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
            </a>
            <div class="row showmobile">
                <div class="col s12 m12 l12 xl12"></div>
            </div>
            <div class="row showmobile">
                <div class="col s12 m12 l12 xl12"></div>
            </div>
             <!-- <div class="row showmobile">
                <div class="col s12 m12 l12 xl12"></div>
            </div>
            <div class="row showmobile">
                <div class="col s12 m12 l12 xl12"></div>
            </div>
            <div class="row showmobile">
                <div class="col s12 m12 l12 xl12"></div>
            </div> -->
            <a href="filter.php">
                <div class="col s8 m8 offset-m2 offset-s2 offset-xl2 xl4 offset-l2 l4 blue-grey darken-4 z-depth-3">
                    <div class="header">
                        <h3 class="white-text center-align">Request</h3>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 xl12 l12 white">
                            <i class="large dashboardicons material-icons">vpn_key</i>
                            <span class="badge brown darken-4 white-text">
                                <?php 
                                    $sql = "SELECT * FROM tbl_filter";
                                    $filterData = mysqli_query($connection , $sql);
                                    echo mysqli_num_rows($filterData);
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </main>
    <!-- <footer class="page-footer brown darken-4">
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <span class="col s12 m12 l6 xl6 center-align white-text">&copy;
                        <?php// echo htmlspecialchars(date("Y")) . " "."Coffteazone";?>
                    </span>
                    <a class="white-text col s12 m12 l6 xl6 center-align" href="#!">http://www.coffteazone.com</a>
                </div>
            </div>
        </div>
    </footer> -->
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