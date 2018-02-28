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
    <title>Homepage Bestseller Settings</title>
    <link rel="stylesheet" type="text/css" href="../css/normalize.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" media="screen, projection"> -->
    <link rel="stylesheet" type="text/css" href="../css/materialize.min.css" media="screen, projection">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <?php 
        // if(isset($_SESSION['sessionexpnotifacation'])) {
        //     echo $_SESSION['sessionexpnotifacation'];
        //     $_SESSION['sessionexpnotifacation'] = null;
        //     header("location:login.php");
        // }       
    ?>
    <style type="text/css">
    </style>
</head>

<body>
    <header class="headerstyle">
        <ul id="dropdown1" class="dropdown-content admincolor adminlinks">
            <li><a href="profile.php">Profile</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
        <nav>
            <div class="nav-wrapper adminnavbar admincolor">
                <a href="#" class="brand-logo center-align brand-logomobile"><img class="logo-brand" src="../img/logo/cofftealogo.png" width="100px" heigth="100px"></a>class="logo-brand" src="../../img/logo/cofftealogo.png" width="100px" heigth="100px"
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
    <main>
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
                <h4 class="center-align">Bestseller Settings</h4>
            </div>
            <?php 
                if(isset($_SESSION['bestselleruploaderror'])) {
                    echo "<div class=\"col s12 m12 xl12 m12\">\n";
                    echo "<p class=\"center-align red darken-3\">".$_SESSION['bestselleruploaderror']."</p>\n";
                    echo "</div>\n";
                    $_SESSION['bestselleruploaderror'] = null;
                }
                if (isset($_SESSION['bestselleruploadsuccess'])) {
                    echo "<div class=\"col s12 m12 xl12 m12\">\n";
                    echo "<p class=\"center-align green darken-3\">".$_SESSION['bestselleruploadsuccess']."</p>\n";
                    echo "</div>\n";
                    $_SESSION['bestselleruploadsuccess'] =null;
                }

            ?>
    
            <div class="col s12 m12 l4 xl4 removeslidermobile">
                <div class="row">
                    <h5 class="col s12 m12 l12 xl12 center-align">Add Bestseller</h5>
                </div>
                <div class="row">
                    <form class="col s12 m12 l12 xl12" method="POST" enctype="multipart/form-data" action="bestsellerupload.php">
                        <div class="row">
                            <div class="input-field col s12 m12 l12 xl12">
                                <input type="text" class="center-align" id="title" name="bestsellertitle" maxlength="20" required class="validate">
                                <label for="title">Title</label>
                            </div>
                            <div class="input-field col s12 m12 l12 xl12">
                                <textarea id="textarea1" maxlength="20"   name="bestsellerdescription" class="materialize-textarea"></textarea>
                                <label for="textarea1">Caption</label>
                            </div>
                            <div class="input-field col s12 m12 l12 xl12">
                                <input type="text" class="center-align" required name="bestsellerprice" id="bestsellerprice">   
                                <label for="bestsellerprice">Price</label>
                            </div>
                            <div class="file-field input-field col s12 m12 l12 xl12">
                                <div class="btn brown darken-3">
                                    <span>image</span>
                                    <input type="file" name="bestsellerimg" required value="image">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                            <div class="input-field col s12 m12 l12 xl12">
                                <div class="row">
                                    <button type="submit" class="btn brown darken-3 btn waves-light waves-effect col s12 m12 xl3 offset-xl4 l3 offset-l4" name="submitbestseller">Add</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col s12 m12 l8 xl8 removeslidermobile">
                <div class="row">
                    <h5 class="col s12 m12 l12 xl12 center-align">Bestseller list</h5>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12 xl12">
                         <table class="responsive-table bordered">
                            <thead>
                                <tr>
                                    <th class="center-align">Picture</th>
                                    <th class="center-align">Name</th>
                                    <th class="center-align">Caption</th>
                                    <th class="center-align">Price</th>  
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                        $sql = "SELECT * FROM tbl_bestseller";
                                        $result = mysqli_query($connection , $sql);
                                        $counter = 1;
                                        while($rows = mysqli_fetch_assoc($result)) {
                                            echo "<tr>\n";
                                            echo "<td class=\"center-align\">".$counter."</td>\n";
                                            echo "<td class=\"center-align\"><img height=\"35px\" width=\"50px\" src=\"../".$rows['path']."\"></td>\n";
                                            echo "<td class=\"center-align\">".$rows['image']."</td>\n";
                                            echo "<td class=\"center-align\">".$rows['caption']."</td>\n";
                                            echo "<td class=\"center-align\">".$rows['price']."</td>\n";
                                            echo "<td class=\center-align\">".
                                                    "<form method=\"POST\" action=\"bestselleredit.php\">".
                                                        "<input type=\"hidden\" name=\"bestsellerid\" value=\"".$rows['id'] . "\">".
                                                        "<button type=\"submit\" name=\"editbestseller\" class=\"btn waves-effect waves-light\">edit</button>".
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
            <!-- show on mobile -->
            <div class="col s12 m12 l8 xl8 showslidermobile">
                <div class="row">
                    <h5 class="col s12 m12 l12 xl12 center-align">Bestseller list</h5>
                    <div class="col s12 m12 l12 xl12">
                        <table class="responsive-table bordered">
                            <thead>
                                <tr>
                                    <th class="center-align">Picture</th>
                                    <th class="center-align">Name</th>
                                    <th class="center-align">Caption</th>
                                    <th class="center-align">Price</th>  
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                        $sql = "SELECT * FROM tbl_bestseller";
                                        $result = mysqli_query($connection , $sql);
                                        $counter = 1;
                                        while($rows = mysqli_fetch_assoc($result)) {
                                            echo "<tr>\n";
                                            echo "<td class=\"center-align\">".$counter."</td>\n";
                                            echo "<td class=\"center-align\"><img height=\"35px\" width=\"50px\" src=\"../".$rows['path']."\"></td>\n";
                                            echo "<td class=\"center-align\">".$rows['image']."</td>\n";
                                            echo "<td class=\"center-align\">".$rows['caption']."</td>\n";
                                            echo "<td class=\"center-align\">".$rows['price']."</td>\n";
                                            echo "</tr>\n";
                                            $counter++;
                                        }
                                    ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                 
            </div>
            <div class="col s12 m12 l4 xl4 showslidermobile">
                <div class="row">
                    <h5 class="col s12 m12 l12 xl12 center-align">Add BestSeller</h5>
                </div>
                <div class="row">
                    <form class="col s12 m12 l12 xl12" method="POST" enctype="multipart/form-data" action="bestsellerupload.php">
                       <div class="row">
                            <div class="input-field col s12 m12 l12 xl12">
                                <input type="text" id="title" name="bestsellertitle" maxlength="20" required class="validate">
                                <label for="title">Title</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12 xl12">
                                <textarea id="textarea1" maxlength="50"   name="bestsellerdescription" class="materialize-textarea"></textarea>
                                <label for="textarea1">Caption</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12 xl12">
                                <input type="text" name="bestsellerprice" id="bestsellerprice">   
                                <label for="bestsellerprice">Price</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="file-field input-field col s12 m12 l12 xl12">
                                <div class="btn brown darken-3">
                                    <span>Image</span>
                                    <input type="file" name="bestsellerimg" required value="image">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12 xl12">
                                <div class="row">
                                    <button type="submit" class="btn brown darken-3 btn waves-light waves-effect col s12 m12 xl3 offset-xl4 l3 offset-l4" name="submitbestseller">Add</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col s12 m12 xl12 l12">
               <div class="row showslidermobile">
                   <form action="bestselleredit.php" method="POST" class="col s12 m12 l12 xl12">
                        <div class="row">
                             <div class="input-field col s12 m12 xl12 l12">
                                <div class="row">
                                    <input type="text" id="bestsellerid" name="bestsellerid" class=" col s12 m12 xl12 l12 center-align" required  placeholder="id">
                                </div>
                            </div>
                            <div class="input-field col s12 m12 l12 xl12">
                                <div class="row">
                                    <button type="submit" name="editbestseller" class="btn waves-light waves-effect col s12 m12 xl12 l12">Edit</button>
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
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>

    <!-- for production ready javascript file -->
    <!-- uncomment all the script for production used -->
    <!-- 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js" type="text/javascript"></script>
     -->
    <script src="../js/main.js" type="text/javascript"></script>
    <script src="../js/validation.js" type="text/javascript"><script>

</body>

</html>