<?php require "../connection.php";?>
<?php
    session_start();
    //require_once "sessiontimeout.php";
    $_SESSION['menuid'] = 3;
    $_SESSION['menupath'] = "img/menu/drinks/fruittea/";
    $_SESSION['database_name'] = "tbl_menu_fruittea";
    $_SESSION['pagelink'] = "fruittea.php";
    $_SESSION['pagename'] = "Fruit Tea";
    $_SESSION['pagemessage'] = "Fruit tea";
    

     if (!isset($_SESSION['username']) && empty($_SESSION['username'])) {
        header("location:login.php");
    }
    $sqlInjectionPrevention = false;
    function sanitizedData($data) {
        $triminput  = trim($data);
        $striplashesinput = stripslashes($triminput);
        $htmlcharscape = htmlspecialchars($striplashesinput);
        $sanitizedData = $htmlcharscape;
        return $sanitizedData;
    }

     if($_SERVER['REQUEST_METHOD'] === "POST") {

        if (isset($_POST['menuedit'])) {

            if (isset($_POST['menueditid'])) {

                if (filter_var($_POST['menueditid'], FILTER_VALIDATE_INT)){
                    $menu = sanitizedData($_POST['menueditid']);
                    $sqlInjectionPrevention = mysqli_escape_string($connection , $menu);
                    $_SESSION['idstay'] = $sqlInjectionPrevention;

                    $sql = "SELECT * FROM ".$_SESSION['database_name']. " WHERE id =". $sqlInjectionPrevention;
                    $_SESSION['menuconfirm'] = $sqlInjectionPrevention;
                    $result = mysqli_query($connection , $sql);
                     if (mysqli_num_rows($result) <= 0) {
                        
                        $_SESSION['menuuploaderror'] = "<span><strong class=\"white-text\">".$_SESSION['pagename']." id is not available!</strong></span>\n";
                        header("location:". $_SESSION['pagelink']);
                        die();
                    }
                    while($rows = mysqli_fetch_assoc($result)) {
                        $_SESSION['displaytitle'] = $rows['title'];
                        $_SESSION['displayprice'] = $rows['price'];
                        $_SESSION['displaycaption'] = $rows['caption'];
                        $_SESSION['displaypath'] = $rows['path'];
                    }
                } elseif (!filter_var($_POST['menueditid'], FILTER_VALIDATE_INT)) {
                    $_SESSION['menuuploaderror'] = "<span><strong class=\"white-text\">Enter valid ".$_SESSION['pagename']." id!</strong></span>\n";
                    header("location:". $_SESSION['pagelink']);
                    die();
                }  
            } else {
                $_SESSION['menuuploaderror'] = "<span><strong class=\"white-text\">Select an". $_SESSION['pagename'] ." id!</strong></span>\n";
                    header("location:". $_SESSION['pagelink']);
                    die();
            }
        } else {
             $_SESSION['menuuploaderror'] = "<span><strong class=\"white-text\">Select and ".$_SESSION['pagename']." id!</strong></span>\n";
             header("location:". $_SESSION['pagelink']);
                die();
        }
    } else {
        if(!isset($_SESSION['editpage'])) {
            header("location:". $_SESSION['pagelink']);
            die();
        } elseif (isset($_SESSION['editpage'])) {
            if (!isset($_SESSION['idstay'])) {
                header("location:dashboard.php");
                die();
            } elseif (isset($_SESSION['idstay'])) {
                $sql = "SELECT * FROM ".$_SESSION['database_name']. " WHERE id =". $_SESSION['idstay'];
                $result = mysqli_query($connection , $sql);
                    if (mysqli_num_rows($result) <= 0) {
                    
                    $_SESSION['menuuploaderror'] = "<span><strong class=\"white-text\">".$_SESSION['pagename']." id is not available!</strong></span>\n";
                    header("location:". $_SESSION['pagelink']);
                    die();
                }
                while($rows = mysqli_fetch_assoc($result)) {
                    $_SESSION['displaytitle'] = $rows['title'];
                    $_SESSION['displayprice'] = $rows['price'];
                    $_SESSION['displaycaption'] = $rows['caption'];
                    $_SESSION['displaypath'] = $rows['path'];
                }
            }
        }  
        
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
    <link rel="icon" href="../../img/logo/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="../../img/logo/favicon.ico" type="image/x-icon" />
    <title>Admin <?php echo $_SESSION['pagename']; ?> edit</title>
    <link rel="stylesheet" type="text/css" href="../css/normalize.css">
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
        @media only screen and (min-width:768px) and (max-width:1023px) {

            .menconfirmcolwidth:nth-child(1) {
                width:60px;
            }
            .menconfirmcolwidth:nth-child(2) {
                width:100px;
            }
            .menconfirmcolwidth:nth-child(3) {
                width:300px;
            }
            .menconfirmcolwidth:nth-child(4) {
                width:100px;
            }
        }
        @media only screen and (min-width:1024px) {
            .menconfirmcolwidth:nth-child(1) {
                width:100px;
            }
            .menconfirmcolwidth:nth-child(2) {
                width:100px;
            }
            .menconfirmcolwidth:nth-child(3) {
                width:350px;
            }
            .menconfirmcolwidth:nth-child(4) {
                width:100px;
            }
        }
        .confirmtable {
            table-layout:fixed;
        
            tbody {
                td {
                    word-wrap:break-word;
                    text-align:center;
                }
            }
        }
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
                <a href="../dashboard.php" class="center-align"><img src="../../img/logo/cofftealogo.png" width="80px" heigth="80px"></a>
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
                                    <a href="../messagebox.php" class="white-text left-align">Inbox
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
                                                        <a href="../drinks.php" class="white-text left-align indent">Drinks
                                                            <i class="tiny material-icons left white-text">local_bar</i>
                                                        </a>
                                                    </li>
                                                     <li>
                                                         <a href="../foods.php" class="white-text left-align indent">Foods
                                                            <i class="tiny material-icons left white-text">local_dining</i>
                                                        </a>
                                                    </li>
                                                     <li>
                                                         <a href="../dessert.php" class="white-text left-align indent">Dessert
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
                                                        <a href="../galleryview.php" class="white-text left-align indentgallery" style="font-size:.8em !important;">View Album
                                           
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="../addimages.php" class="white-text left-align indentgallery" style="font-size:.8em !important;">Add Images
                                                    
                                                        </a>
                                                    </li>
                                                     <li>
                                                        <a href="../galleryalbumadd.php" class="white-text left-align indentgallery" style="font-size:.8em !important;">Add Album
                                                       
                                                        </a>
                                                    </li>
                                                     <li>
                                                        <a href="../deletealbum.php" class="white-text left-align indentgallery" style="font-size:.8em !important;">Delete Album
                                                            
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>    
                                        </li>
                                    </ul>
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
                                 <li class="no-padding">
                                    <ul class="collapsible collapsible-accordion">
                                        <li>
                                            <a href="#!" class="collapsible-header left-align admincolor white-text">
                                                <span>About us</span>
                                                <i class="left tiny material-icons white-text">person_pin</i>
                                            </a>
                                            <div class="collapsible-body admincolor">
                                                <ul>
                                                    <li>
                                                        <a href="../history.php" class="white-text left-align indent" style="font-size:.8em !important;">History
                                                            <i class="tiny material-icons  white-text left">access_time</i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="../historyimages.php" class="white-text left-align indent" style="font-size:.8em !important;">images
                                                            <i class="tiny material-icons  white-text left">access_time</i>
                                                        </a>
                                                    </li>
                                                     <li>
                                                        <a href="../vision.php" class="white-text left-align indent" style="font-size:.8em !important;">Vision
                                                            <i class="tiny material-icons  white-text left">remove_red_eye</i>
                                                        </a>
                                                    </li>
                                                     <li>
                                                        <a href="../mission.php" class="white-text left-align indent" style="font-size:.8em !important;">Mission
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
                            <a href="../drinks.php" class="breadcrumb">Drinks</a>
                            <a href="fruittea.php" class="breadcrumb">Fruit tea</a>
                            <a href="#!" class="breadcrumb"><?php echo $_SESSION['displaytitle'];?></a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
       <!-- show this on mobile and remove the above form -->
        <div class="row showontabletseperator"><div class="col s12 m12 l12 xl12"></div></div>
        <div class="row showontabletseperator"><div class="col s12 m12 l12 xl12"></div></div>
        <div class="row showontabletseperator"><div class="col s12 m12 l12 xl12"></div></div>
        <div class="row showontabletseperator"><div class="col s12 m12 l12 xl12"></div></div>
       
        <div class="row">
            <div class="col s12 m12 l12 xl12">
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
        </div>
        <div class="row slidereditshowmobile">
            <div class="row">
                <div class="col s12 m12 l12 xl12">
                    <div class="row">
                        <div class="col s12 m12 l12 xl12">
                            <table class="filtertable responsive-table confirmtable">
                                <col class="menconfirmcolwidth">
                                <col class="menconfirmcolwidth">
                                <col class="menconfirmcolwidth">
                                <col class="menconfirmcolwidth">
                                <thead>
                                    <th class="center-align">Title</th>
                                    <th class="center-align">Picture</th>
                                    <th class="center-align">Caption</th>
                                    <th class="center-align">Price</th>
                    
                                </thead>
                                <tbody>
                                    <td class="center-align"><?php echo $_SESSION['displaytitle'];?></td>
                                    <td class="center-align"><?php echo "<img width=\"75px\" height=\"50px\" src=\"../../".$_SESSION['displaypath']."\">";?></td>
                                    <td class="center-align"><?php echo $_SESSION['displaycaption'];?></td>
                                    <td class="center-align"><?php echo $_SESSION['displayprice'];?></td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
               
            </div>
            <div class="container">
                <div class="row">
                    <form class="col s12 m12 l12 xl12" method="POST" action="menuuploadconfirm.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="input-field col s12 m12 l12 xl12">
                                <input data-length="50" type="text" class="center-align" autocomplete="off" id="menuconfirmtitle" name="menuconfirmtitle" maxlength="50" class="validate">
                                <label for="menuconfirmtitle">Title</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12 xl12">
                                <textarea data-length="100" autocomplete="off" id="menuconfirmcaption" maxlength="100"  name="menuconfirmcaption" class="materialize-textarea"></textarea>
                                <label for="menuconfirmcaption">Caption</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12 xl12">
                                <input type="text" class="center-align" autocomplete="off" name="menupriceconfirm" id="menupriceconfirm">   
                                <label for="menupriceconfirm">Price</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="file-field input-field col s12 m12 l12 xl12">
                                <div class="btn blue-grey darken-4">
                                    <span>Image</span>
                                    <input type="file"  name="menuconfirmimg"  value="image">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                        <div class="input-field col s12 m12 l8 xl8 offset-l5 offset-xl5">
                                <div class="row">
                                    <button type="submit" name="menusubtmiconfirm"  class="btn red darken-2 btn waves-light waves-effect col s6 m6 offset-s3 offset-m3 xl4 l4">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
         <div class="container">
            <div class="row">
                <div class="col s12 m12 l12 xl12">
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
            </div>
        </div>
       <div class="row sliderremovemobile">
           <div class="col s12 m12 l12 xl12">
               <div class="row">
                    <div class="col s12 m12 l12 xl12">
                        <div class="row">
                            <div class="col s12 m12 l12 xl12">
                                <table class="filtertable responsive-table" >
                                    <col class="menconfirmcolwidth">
                                    <col class="menconfirmcolwidth">
                                    <col class="menconfirmcolwidth">
                                    <col class="menconfirmcolwidth">
                                    <thead>
                                        <th class="center-align">Title</th>
                                        <th class="center-align">Picture</th>
                                        <th class="center-align">Caption</th>
                                        <th class="center-align">Price</th>
                        
                                    </thead>
                                    <tbody>
                                        <td class="center-align"><?php echo $_SESSION['displaytitle'];?></td>
                                        <td class="center-align"><?php echo "<img width=\"75px\" height=\"50px\" src=\"../../".$_SESSION['displaypath']."\">";?></td>
                                        <td class="center-align"><?php echo $_SESSION['displaycaption'];?></td>
                                        <td class="center-align"><?php echo $_SESSION['displayprice'];?></td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    
            <div class="container">
                <div class="row">
                    <form class="col s12 m12 l12 xl12" method="POST" action="menuuploadconfirm.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="input-field col s12 m12 l12 xl12">
                                <input type="text" class="center-align" id="title" autocomplete="off" name="menuconfirmtitle" data-length="50" maxlength= "50"  class="validate">
                                <label for="title">Title</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12 xl12">
                                <textarea maxlength="100" data-length="100" autocomplete="off" maxlength="100" id="menuconfirmcaption" name="menuconfirmcaption" class="materialize-textarea"></textarea>
                                <label for="menuconfirmcaption">Caption</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12 xl12">
                                <input type="text" class="center-align" autocomplete="off"  name="menupriceconfirm" id="menupriceconfirm">   
                                <label for="menupriceconfirm">Price</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="file-field input-field col s12 m12 l12 xl12">
                                <div class="btn blue-grey darken-4">
                                    <span>Image</span>
                                    <input type="file"  name="menuconfirmimg"  value="image">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="input-field col s12 m12 l8 xl8 offset-l5 offset-xl5">
                                <div class="row">
                                    <button type="submit" name="menusubtmiconfirm"  class="btn red darken-2 btn waves-light waves-effect col s6 m6 offset-s3 offset-m3 xl4 l4">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
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


