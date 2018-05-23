<?php require "connection.php";?>
<?php
    session_start();
    //require_once "sessiontimeout.php";

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
        
        if (isset($_POST['editbestseller'])) {

            if (isset($_POST['bestsellerid'])) {

                if (is_numeric($_POST['bestsellerid'])){
                    $bestseller = sanitizedData($_POST['bestsellerid']);
                    $sqlInjectionPrevention = mysqli_real_escape_string($connection , $bestseller);
                 
                    $_SESSION['bestsellerstay'] = $sqlInjectionPrevention;
                    $sql = "SELECT * FROM tbl_bestseller WHERE id =". $sqlInjectionPrevention;
                    $_SESSION['bestsellerconfirm'] = $sqlInjectionPrevention;
                    $result = mysqli_query($connection , $sql);
                     if (mysqli_num_rows($result) <= 0) {
                        
                        $_SESSION['bestselleruploaderror'] = "<span><strong class=\"white-text\">bestseller id is not available!</strong></span>\n";
                        header("location:bestseller.php");
                        die();
                    }
                    while($row = mysqli_fetch_assoc($result)) {
                        $displaytitle = $row['title'];
                        $displaycaption = $row['caption'];
                        $displayprice = $row['price'];
                        $displaypath = $row['path'];
                        
                    }
                } else if (!is_numeric($_POST['bestsellerid'])) {
                    $_SESSION['bestselleruploaderror'] = "<span><strong class=\"white-text\">Enter valid bestseller id!</strong></span>\n";
                    header("location:bestseller.php");
                    die();
                }  
            } else {
                $_SESSION['bestselleruploaderror'] = "<span><strong class=\"white-text\">Select Bestseller id!</strong></span>\n";
                    header("location:bestseller.php");
                    die();
            }
        } else {
             $_SESSION['bestselleruploaderror'] = "<span><strong class=\"white-text\">Select Bestseller id!</strong></span>\n";
             header("location:bestseller.php");
                die();
        }
    } else if ($_SERVER['REQUEST_METHOD'] !== "POST") {
        if (isset($_SESSION['bestsellerstay'])) {
            $sql = "SELECT * FROM tbl_bestseller WHERE id = ". $_SESSION['bestsellerstay'];
            $result = myqli_query($connection , $sql);
             while($row = mysqli_fetch_assoc($result)) {
                $displaytitle = $row['title'];
                $displaycaption = $row['caption'];
                $displayprice = $row['price'];
                $displaypath = $row['path'];
            }
        } elseif (!isset($_SESSION['bestsellerstay'])) {
            mysqli_close($connection , $sql);
            header("location:bestseller.php");
            die();
        }
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../img/logo/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="../img/logo/favicon.ico" type="image/x-icon" />
    <title>Admin | BestSeller edit</title>
    <link rel="stylesheet" type="text/css" href="../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" media="screen, projection">
    <!-- <link rel="stylesheet" type="text/css" href="../css/materialize.min.css" media="screen, projection"> -->
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
    <noscript class="no-js">
       <div class="row">
           <div class="col s12 m12 l12 xl12">
               <h1 class="center-align">Please enable javascript on your web browser!</h1>
                <p class="center-align">Our website will not function correctly if javascript is disabled.</p>
           </div>
       </div>
    </noscript>
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
                                            <a href="#!" class="collapsible-header white-text left-align">Services
                                                <i class="tiny material-icons left white-text">motorcycle</i>
                                            </a>
                                            <div class="collapsible-body admincolor">
                                                <ul>
                                                     <li>
                                                         <a href="ktvservices.php" class="white-text left-align" style="font-size:.8em !important;">KTV
                                                            <i class="tiny material-icons left white-text">mic</i>
                                                        </a>
                                                    </li>
                                                     <li>
                                                         <a href="martinasservices.php" class="white-text left-align" style="font-size:.8em !important;">Martinas
                                                            <i class="tiny material-icons left white-text">cake</i>
                                                        </a>
                                                    </li>
                                                     <li>
                                                         <a href="termsandcondition.php" class="white-text center-align" style="font-size:.7em !important;">Terms &amp; Conditions
                                                
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
                                            <a href="#!" class="collapsible-header white-text left-align">FAQ
                                                <i class="tiny material-icons left white-text">question_answer</i>
                                            </a>
                                            <div class="collapsible-body admincolor">
                                                <ul>
                                                     <li>
                                                         <a href="ktvfaq.php" class="white-text left-align" style="font-size:.8em !important;">KTV
                                                            <i class="tiny material-icons left white-text">mic</i>
                                                        </a>
                                                    </li>
                                                     <li>
                                                         <a href="martinasfaq.php" class="white-text left-align" style="font-size:.8em !important;">Martinas
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
                                    <a href="editaccount.php" class="white-text left-align" style="font-size:.8em !important;">Change Pass.
                                        <i class="tiny material-icons white-text left">fingerprint</i>
                                    </a>
                                </li>
                                <li>
                                    <a href="logout.php" class="white-text left-align" style="font-size:.8em !important;">Logout
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
       <!-- show this on mobile and remove the above form -->
        <div class="row showontabletseperator"><div class="col s12 m12 l12 xl12"></div></div>
        <div class="row showontabletseperator"><div class="col s12 m12 l12 xl12"></div></div>
        <div class="row showontabletseperator"><div class="col s12 m12 l12 xl12"></div></div>
        <div class="row showontabletseperator"><div class="col s12 m12 l12 xl12"></div></div>
       
        <div class="container slidereditshowmobile">
            <div class="row">
                <div class="col s12 m12 l12 xl12">
                    <div class="container">
                        <div class="row">
                            <div class="col s12 m12 l12 xl12">
                                <table class="bordered responsive-table">
                                    <thead>
                                        <th>title</th>
                                        <th>picture</th>
                                        <th>caption</th>
                                        <th>price</th>
                                    </thead>
                                    <tbody>
                                        <td><?php echo $displaytitle;?></td>
                                        <td><?php echo "<img width=\"75px\" height=\"50px\" src=\"../".$displaypath."\">";?></td>
                                        <td><?php echo $displaycaption;?></td>
                                        <td><?php echo $displayprice;?></td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m12 l12 xl12">
                    <?php
                         if(isset($_SESSION['betselleruploaderror'])) {
                            echo "<div class=\"col s12 m12 xl12 m12\">\n";
                            echo "<p class=\"center-align red darken-3\">".$_SESSION['betselleruploaderror']."</p>\n";
                            echo "</div>\n";
                            $_SESSION['betselleruploaderror'] = null;
                        }
                        if (isset($_SESSION['bestselleruploadsuccess'])) {
                            echo "<div class=\"col s12 m12 xl12 m12\">\n";
                            echo "<p class=\"center-align green darken-3\">".$_SESSION['bestselleruploadsuccess']."</p>\n";
                            echo "</div>\n";
                            $_SESSION['bestselleruploadsuccess'] =null;
                        }

                        if (isset($_SESSION['betselleruploaderror'])) {
                            echo "<div class=\"col s12 m12 xl12 m12\">\n";
                            echo "<p class=\"center-align red darken-3\">".$_SESSION['betselleruploaderror']."</p>\n";
                            echo "</div>\n";
                            $_SESSION['betselleruploaderror'] = null;
                        }
                        if (isset($_SESSION['betselleruploaderror'])) {
                            echo "<div class=\"col s12 m12 xl12 m12\">\n";
                            echo "<p class=\"center-align green darken-3\">".$_SESSION['betselleruploaderror']."</p>\n";
                            echo "</div>\n";
                            $_SESSION['betselleruploaderror'] = null;
                        }
                    ?>
                </div>
            </div>
          
            <div class="row">
                <form class="col s12 m12 l12 xl12" method="POST" action="bestselleruploadconfirm.php" enctype="multipart/form-data">
                     <div class="row">
                            <div class="input-field col s12 m12 l12 xl12">
                                <input type="text" class="center-align" id="title" name="bestsellertitleconfirm" maxlength="20" class="validate">
                                <label for="title">Title</label>
                            </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l12 xl12">
                            <textarea data-length="50" id="bestsellerdescriptionconfirm" name="bestsellerdecriptionconfirm" class="materialize-textarea"></textarea>
                            <label for="bestsellerdescriptionconfirm">caption</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l12 xl12">
                            <input type="text" class="center-align"  name="bestsellerpriceconfirm" id="bestsellerpriceconfirm">   
                            <label for="bestsellerpriceconfirm">Price</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="file-field input-field col s12 m12 l12 xl12">
                            <div class="btn">
                                <span>upload image</span>
                                <input type="file" name="bestsellerimgconfirm">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">
                            <div class="input-field col s12 m12 l12 xl12">
                                <div class="row">
                                    <button type="submit" name="bestsellersubmituploadconfirm"  class="btn waves-light waves-effect brown darken-3 col s12 l5 m5 offset-m3 xl5 offset-xl3">Change</button>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
      
       <div class="container sliderremovemobile">

            <div class="container">
                 <div class="row">
                    <div class="col s12 m12 l12 xl12">
                        <div class="container">
                            <div class="row">
                                <div class="col s12 m12 l12 xl12">
                                    <table class="bordered responsive-table">
                                        <thead>
                                            <th>title</th>
                                            <th>picture</th>
                                            <th>caption</th>
                                            <th>price</th>
                                        </thead>
                                        <tbody>
                                            <td><?php echo $displaytitle;?></td>
                                            <td><?php echo "<img width=\"75px\" height=\"50px\" src=\"../".$displaypath."\">";?></td>
                                            <td><?php echo $displaycaption;?></td>
                                            <td><?php echo $displayprice;?></td>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m12 l12 xl12">
                        <?php
                           
                            if(isset($_SESSION['betselleruploaderror'])) { 
                                echo "<div class=\"col s12 m12 xl12 m12\">\n";
                                echo "<p class=\"center-align red darken-3\">".$_SESSION['betselleruploaderror']."</p>\n";
                                echo "</div>\n";
                                $_SESSION['betselleruploaderror'] = null;
                            }
                            if (isset($_SESSION['bestselleruploadsuccess'])) {
                                echo "<div class=\"col s12 m12 xl12 m12\">\n";
                                echo "<p class=\"center-align green darken-3\">".$_SESSION['bestselleruploadsuccess']."</p>\n";
                                echo "</div>\n";
                                $_SESSION['bestselleruploadsuccess'] =null;
                            }

                            if (isset($_SESSION['betselleruploaderror'])) {
                                echo "<div class=\"col s12 m12 xl12 m12\">\n";
                                echo "<p class=\"center-align red darken-3\">".$_SESSION['betselleruploaderror']."</p>\n";
                                echo "</div>\n";
                                $_SESSION['betselleruploaderror'] = null;
                            }
                            if (isset($_SESSION['betselleruploaderror'])) {
                                echo "<div class=\"col s12 m12 xl12 m12\">\n";
                                echo "<p class=\"center-align green darken-3\">".$_SESSION['betselleruploaderror']."</p>\n";
                                echo "</div>\n";
                                $_SESSION['betselleruploaderror'] = null;
                            }
                 
                        ?>
                    </div>
                </div>
                <div class="row">
                    <form class="col s12 m12 l12 xl12" method="POST" action="bestselleruploadconfirm.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="input-field col s12 m12 l12 xl12">
                                <input type="text" class="center-align" id="title" name="bestsellertitleconfirm" maxlength="20" class="validate">
                                <label for="title">Title</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12 xl12">
                                <textarea data-length="50" id="bestsellerdescriptionconfirm" name="bestsellerdecriptionconfirm" class="materialize-textarea"></textarea>
                                <label for="bestsellerdescriptionconfirm">Caption</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12 xl12">
                                <input type="text" class="center-align"  name="bestsellerpriceconfirm" id="bestsellerpriceconfirm">   
                                <label for="bestsellerpriceconfirm">Price</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="file-field input-field col s12 m12 l12 xl12">
                                <div class="btn">
                                    <span>upload image</span>
                                    <input type="file" name="bestsellerimgconfirm">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="input-field col s12 m12 l12 xl12">
                                <div class="row">
                                    <button type="submit" name="bestsellersubmituploadconfirm"  class="btn waves-light waves-effect brown darken-3 col s12 l5 offset-m3 xl5 offset-xl3">Change</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
       </div>
       
   </main>
  
    <!-- for development javascript file -->
    <!-- <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script> -->

    <!-- for production ready javascript file -->
    <!-- uncomment all the script for production used -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js" type="text/javascript"></script>
    
    <script src="../js/main.js" type="text/javascript"></script>

</body>

</html>


