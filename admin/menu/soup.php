<?php require "../connection.php"; ?>
<?php 
    session_start();
    // check if there already login admin
    //require "sessiontimeout.php";

    $_SESSION['accountnew'] = false;

    if (!isset($_SESSION['username']) && empty($_SESSION['username'])) {
        header("location:login.php");
    }
    $_SESSION['menuid'] = 14;
    $_SESSION['menupath'] = "img/menu/foods/soup/";
    $_SESSION['database_name'] = "tbl_menu_soup";
    $_SESSION['pagelink'] = "soup.php";
    $_SESSION['pagename'] = "Soup";
    $_SESSION['editpage'] = "soupedit.php";

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
    <link rel="icon" href="../../img/logo/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="../../img/logo/favicon.ico" type="image/x-icon" />
    <title><?php echo $_SESSION['pagename']; ?> Settings</title>
    <link rel="stylesheet" type="text/css" href="../../css/normalize.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" media="screen, projection"> -->
    <link rel="stylesheet" type="text/css" href="../../css/materialize.min.css" media="screen, projection">
    <link rel="stylesheet" type="text/css" href="../../css/main.css">
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
            <li><a href="../profile.php">Profile</a></li>
            <li><a href="../logout.php">Log Out</a></li>
        </ul>
        <nav>
            <div class="nav-wrapper adminnavbar admincolor">
                <a href="#" class="brand-logo center-align brand-logomobile"><img class="logo-brand" src="../../img/logo/cofftealogo.png" width="100px" heigth="100px"></a>
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
                <h1 class="center-align white-text usernametextadmin">Admin <?php echo $_SESSION['username'];?></h1>
            </li>
            <li class="logostyle">
                <a href="../dashboard.php" class="center-align"><img src="../../img/logo/cofftealogo.png" width="80px" height="80px" srcset=""></a>
            </li>
            <li>
                <a href="../dashboard.php" class="left-align white-text sidenavmainlinks">
                    <span>Dashboard</span><i class="left material-icons white-text">dashboard</i>
                </a>
            </li>
            <li>
                <a href="../users.php" class="left-align white-text sidenavmainlinks">
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
                                    <a href="../homepage.php" class="white-text left-align">Home
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
                                                        <a href="../drinks.php" class="white-text left-align">Drinks
                                                            <i class="tiny material-icons left white-text">local_bar</i>
                                                        </a>
                                                    </li>
                                                     <li>
                                                         <a href="../foods.php" class="white-text left-align">Foods
                                                            <i class="tiny material-icons left white-text">local_dining</i>
                                                        </a>
                                                    </li>
                                                     <li>
                                                         <a href="../dessert.php" class="white-text left-align">Dessert
                                                            <i class="tiny material-icons left white-text">cake</i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="../services.php" class="white-text left-align">Services
                                        <i class="tiny material-icons left white-text">style</i>
                                    </a>
                                </li>
                                <li>
                                    <a href="../gallery.php" class="white-text left-align">Gallery
                                        <i class="tiny material-icons left white-text">photo_library</i>
                                    </a>
                                </li>
                                <li>
                                    <a href="../contactus.php" class="white-text left-align">Contact Us
                                        <i class="tiny material-icons left white-text">local_phone</i>
                                    </a>
                                </li>
                                <li>
                                    <a href="../faq.php" class="white-text left-align">FAQ
                                        <i class="tiny material-icons left white-text">help</i>
                                    </a>
                                </li>
                                <li>
                                    <a href="../aboutus.php" class="white-text left-align">About Us
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
                                    <a href="../inbox.php" class="white-text left-align">Inbox
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
                                    <a href="../filter.php" class="white-text left-align">Filter
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
                                    <a href="../profile.php" class="white-text left-align">Profile
                                        <i class="tiny material-icons  white-text left">face</i>
                                    </a>
                                </li>
                                <li>
                                    <a href="../logout.php" class="white-text left-align">Logout
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
                            <a href="#!" class="breadcrumb">Our Menu</a>
                            <a href="../foods.php" class="breadcrumb">Foods</a>
                            <a href="#!" class="breadcrumb">Soup</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- show on mobile -->
            
        <div class="container">
            <!--remove on mobile and tablet -->
            <div class="row rowtitleseperator">
                <div class="col s12 m12 l12 xl12"></div>
            </div>
            <div class="row rowtitleseperator">
                <div class="col s12 m12 l12 xl12"></div>
            </div>
            <div class="rowtitleseperator">
                <div class="col s12 m12 l12 xl12"></div>
            </div>
            <div class="row titleseperator">
                <div class="col s12 m12 l12 xl12"></div>
            </div>
            <div class="row">
                <div class="col s12 m12 xl12 m12">
                    <h4 class="center-align"><?php echo $_SESSION['pagename']?> Settings</h4>
                </div>
                <?php 
                    if(isset($_SESSION['menuuploaderror'])) {
                        echo "<div class=\"col s12 m12 xl12 m12\">\n";
                        echo "<p class=\"center-align red darken-3\">".$_SESSION['menuuploaderror']."</p>\n";
                        echo "</div>\n";
                        $_SESSION['menuuploaderror'] = null;
                    }
                    if (isset($_SESSION['menuuploadsuccess'])) {
                        echo "<div class=\"col s12 m12 xl12 m12\">\n";
                        echo "<p class=\"center-align green darken-3\">".$_SESSION['menuuploadsuccess']."</p>\n";
                        echo "</div>\n";
                        $_SESSION['menuuploadsuccess'] =null;
                    }

                ?>
            </div>
            <div class="row">
                <div class="col s12 m12 l12 x12 ">
                    <div class="row">
                        <h5 class="col s12 m12 l12 xl12 center-align"><?php echo $_SESSION['pagename'];?> list</h5>
                        <div class="row">
                            <div class="col s12 m12 l12 xl12"></div>
                        </div>
                        <div class="col s12 m12 l12 xl12">
                            <table class="responsive-table filtertable">
                                <thead>
                                    <tr>
                                        <th class="center-align"></th>
                                        <th class="center-align">Picture</th>
                                        <th class="center-align">Name</th>
                                        <th class="center-align">Caption</th>
                                        <th class="center-align">Price</th>
                                        <th></th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT * FROM ". $_SESSION['database_name'];
                                        $result = mysqli_query($connection , $sql);
                                        $counter = 1;
                                        while($rows = mysqli_fetch_assoc($result)) {
                                            echo "<tr>\n";
                                            echo "<td class=\"center-align\">".$counter."</td>\n";
                                            echo "<td class=\"center-align\"><img height=\"35px\" width=\"50px\" src=\"../../".$rows['path']."\"></td>\n";
                                            echo "<td class=\"center-align\">".$rows['image']."</td>\n";
                                            echo "<td class=\"center-align\">".$rows['caption']."</td>\n";
                                            echo "<td class=\"center-align\">".$rows['price']."</td>\n";
                                            echo "<td class=\"center-align\">".
                                                    "<form method=\"POST\" action=\"".$_SESSION['editpage']."\">".
                                                        "<input type=\"hidden\" name=\"menueditid\" value=\"".$rows['id'] . "\">".
                                                        "<button type=\"submit\"name=\"menuedit\" class=\"btn waves-effect waves-light\">edit</button>".
                                                    "</form>".
                                                "</td>";
                                            echo "</tr>\n";
                                            $counter++;
                                        }
                                    ?>

                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12 x12">
                    <div class="row">
                        <div class="col s12 m12 l12 xl12"></div>
                    </div>
                    <div class="row">
                        <h5 class="col s12 m12 l12 xl12 center-align">Add <?php echo $_SESSION['pagename'];?></h5>
                    </div>
                    <div class="row">
                        <form class="col s12 m12 l12 xl12" method="POST" enctype="multipart/form-data" action="menuupload.php">
                            <div class="row">
                                <div class="input-field col s12 m12 l12 xl12">
                                    <input type="text" id="menutitle" class="center-align"  autocomplete="off" name="menutitle" maxlength="50" data-length="50" required class="validate">
                                    <label for="menutitle">Title</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m12 l12 xl12">
                                    <textarea id="textarea1"  maxlength="100" autocomplete="off"  data-length="100" name="menucaption" class="materialize-textarea"></textarea>
                                    <label for="textarea1">Caption</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m12 l12 xl12">
                                    <input type="text" class="center-align" autocomplete="off" name="menuprice" id="menuprice">   
                                    <label for="menuprice">Price</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="file-field input-field col s12 m12 l12 xl12">
                                    <div class="btn blue-grey darken-4">
                                        <span>Image</span>
                                        <input type="file"  name="menuimg" required value="image">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m12 l8 xl8 offset-l5 offset-xl5">
                                    <div class="row">
                                        <button type="submit" class="btn red darken-2 btn waves-light waves-effect col s6 m6 offset-s3 offset-m3 xl4 l4" name="menusubmit">Add</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
    <script type="text/javascript" src="../../js/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/materialize.min.js"></script>

    <!-- for production ready javascript file -->
    <!-- uncomment all the script for production used -->
    <!-- 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js" type="text/javascript"></script>
     -->
    <script src="../../js/main.js" type="text/javascript"></script>

</body>

</html>