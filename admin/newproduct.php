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
    <title>Admin New product</title>
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
                            <a href="homepage.php" class="breadcrumb">Home</a>
        
                            <a href="#!" class="breadcrumb">New Product</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row">
            <h4 class="col s12 12 xl12 m12 center-align">New Product</h4>
            <?php
                if (isset($_SESSION['promossuccess'])) {
                    echo "<div class=\" green darken-3 col s12 m12 l12 xl12 center-align\">\n".
                        $_SESSION['promossuccess'] . "\n".
                        "</div>\n";
                    $_SESSION['promossuccess'] = null;
                }
            ?>
        </div>
        <div class="row">
               
            <div class="col s12 m12 xl12 l12">
                <div class="row">
                    <h5 class="col s12 m12 l12 xl12 center-align center-align">New Product list</h5>  
                </div>
                <div class="row">
                    <div class="col s12 l12 xl12 m12">
                        <table class="responsive-table" style="table-layout:fixed" >
                            <col class="promoswidth">
                            <col class="promoswidth">
                            <col class="promoswidth">
                            <thead>
                                <tr>
                                    <th class="center-align">Title</th>
                                    <th class="center-align">Image</th>
                                    <th class="center-align">Description</th>
                                   <th class="center-align"></th>
                                </tr>
                            </thead>
                            <tbody>
                
                                    <?php
                                        $sql = "SELECT * FROM tbl_new_product";
                                        $result = mysqli_query($connection, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            while ($rows = mysqli_fetch_assoc($result)) {
                                                $title = $rows['title'];
                                                $description = $rows['description'];
                                                $path = $rows['path'];
                                                $id = $rows['id'];
                                                echo "<tr>\n";
                                                echo "<td class=\"center-align\">". $title ."</td>\n";
                                                echo "<td class='center-align'>". "<img src='../$path' width='50px' height='75px'/></td>\n";
                                                echo "<td class='center-align'>$description</td>\n";
                                                echo "<td class='center-align'>\n".
                                                        "<form method=\"post\" action='editnewproduct.php' enctype='multipart/form-data'>".
                                                            "<input type='hidden' value='$id' name='editpromosid'>\n".
                                                            "<button type='submit' name='promoseditsubmit' class='btn waves-light waves-effect'>Edit</button>\n".
                                                        "</form>\n";
                                                echo "</td>";
                                            }
                                        }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l12 xl12">
                <div class="container">
                    <div class="row">
                        <div class="col s12 m12 12 xl12">
                            <h5 class="center-align">Add new product</h5>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                            if(isset($_SESSION['promoserror'])) {
                                echo "<div class=\"col s12 m12 l12 xl12 center-align red darken-3\">\n".
                                    $_SESSION['promoserror']. "\n".
                                    "</div>\n";
                                $_SESSION['promoserror'] = null;
                            }
                        ?>
                         <?php
                            if(isset($_SESSION['promossuccess'])) {
                                echo "<div class=\"col s12 m12 l12 xl12 center-align green darken-3\">\n".
                                    $_SESSION['promossuccess']. "\n".
                                    "</div>\n";
                                $_SESSION['promosuccess'] = null;
                            }
                        ?>
                    </div>
                    <div class="row">
                        <form action="addnewproduct.php" method="post" class="col s12 m12 xl12 l12" enctype="multipart/form-data">
                            <div class="row">
                                <div class="input-field col s12 m12 l12 xl12 ">
                                    <input type="text"  autocomplete="off" required name="promostitle" maxlength="50" class="center-align tooltipped" data-delay="50" data-position="top" data-tooltip="<strong class='tooltippedstyle'>Add title!</strong>" data-length="50" id="promostitle">
                                    <label for="promostitle">Title</label>
                                </div>
                                <div class="input-field col s12 m12 l12 xl12">
                                    <textarea name="promosdescription" autocomplete="off" required id="promosdescription" class="tooltipped materialize-textarea" data-delay="50" data-position="top" data-tooltip="<strong class='tooltippedstyle'>Add description!</strong>" maxlength="500" data-length="500"></textarea>
                                    <label for="promosdescription">Description</label>
                                </div>
                                <div class="file-field input-field col s12 m12 l12 xl12">
                                    <div class="btn blue-grey darken-4">
                                        <span>Image</span>
                                        <input type="file" autocomplete="off" required name="promosimg">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="Upload image">
                                    </div>
                                </div>
                                <div class="input-field col offset-l5 offset-xl5 m12 l2 xl2 s12">
                                    <div class="row">
                                        <button type="submit" name="promosaddsubmit" class="col xl12 l12 m12 s12 btn waves-light waves-effect">Add</button>
                                    </div>
                                </div>
                            </div>   
                        </form>
                    </div>
                </div>
            </div>
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