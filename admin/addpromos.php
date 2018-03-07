<?php require "connection.php"; ?>
<?php 
    session_start();

    $_SESSION['promosurlSuccess'] = null;
    $_SESSION['promosdescriptionSuccess'] = null;
    $_SESSION['promostitleSuccess'] = null;
    $_SESSION['uploadstatus'] = null;

    if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
        mysqli_close($connection);
        header("location:login.php");
    }
    $_SESION['uploadstatus'] = null;
    function sanitizedData($data) {
        $triminput  = trim($data);
        $striplashesinput = stripslashes($triminput);
        $htmlcharscape = htmlspecialchars($striplashesinput);
        $sanitizedData = $htmlcharscape;
        return $sanitizedData;
    }
     function UploadFile($img) {
         $allowed = array('jpg' => 'image/jpeg' ,  'jpeg' => 'image/jpeg' , 'JPG' => 'image/jpg');
        //print_r($img);
        if(isset($img)) {

            $filename = $img['name'];
            $filetype = $img['type'];

            $size = $img['size'];
            $filetmpname = $img["tmp_name"];
            $ext = pathinfo($filename , PATHINFO_EXTENSION);
            $maxSize = 1024 * 1024;
            if (!array_key_exists($ext , $allowed)) {
                mysqli_close($connection);
                 $_SESSION['promoserror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Use a jpeg image format!</strong>\n".
                                            "</strong>\n";
                header("location:promos.php");
                die();
            }
            if ($size > $maxSize) {
                mysqli_close($connection);
                $_SESSION['promoserror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Use a mininum of 1MB of JPG image!</strong>\n".
                                            "</strong>\n";
                header("location:promos.php");
                die();
            }
            if (in_array($filetype , $allowed)) {
                
                if (file_exists("../img/home/promos" .$filename )) {
                    unlink("../img/home/promos/" .$filename);
                    move_uploaded_file($filetmpname, "../img/home/promos/" .$filename);
                    $_SESSION['dirpath'] = "img/home/promos/" .$filename;
                    $_SESSION['uploadstatus'] = true;
                    return $filename;
                } else {
                    move_uploaded_file($filetmpname, "../img/home/promos/" .$filename);
                    $_SESSION['dirpath'] ="img/home/promos/" .$filename;
                    $imgPath = $filename;
                    $_SESSION['uploadstatus'] = true;
                    return $filename;
                }
            } else {
                mysqli_close($connection);
                $_SESSION['promoserror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Invalid File Type!</strong>\n".
                                            "</strong>\n";
                    header("location:promos.php");
                die();
            }
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['promosaddsubmit'])) {

            #promos title validation and sanitation
            if (isset($_POST['promostitle'])) {
                
                 if (is_numeric($_POST['promostitle'])) {
                    
                    $_SESSION['promoserror'] = "<span class=\"center-align\"><strong class=\"white-text\">Title is invalid!</strong></span>\n";
                 } elseif (!is_numeric($_POST['promostitle'])) {
                      
                     #check for first number
                    if(strlen($_POST['promostitle']) > 0 && is_numeric($_POST['promostitle'][0])) {
                        
                        mysqli_close($connection);
                        $_SESSION['promoserror']= "<span class=\"center-align\"><strong class=\"white-text\">First character is a number!</strong></span>\n";
                        header("location:promos.php");
                        die;
                    } elseif (strlen($_POST['promostitle']) > 0 && !is_numeric($_POST['promostitle'][0])) {
                        $title = sanitizedData($_POST['promostitle']);
                        $sqlPreventInjection = mysqli_escape_string($connection , $title);
                        
                        if (strlen($sqlPreventInjection) <= 50 &&  strlen($sqlPreventInjection) !== 0) {
                            $_SESSION['promostitleSuccess'] = $sqlPreventInjection; 
                            
                        } elseif (strlen($sqlPreventInjection) > 50 ) {
                            mysqli_close($connection);
                            $_SESSION['promoserror']= "<span class=\"center-align\"><strong class=\"white-text\">Characters is greater than 50!</strong></span>\n";
                            header("location:promos.php");
                            die;
                        }
                    }
                 }
            } else {
                mysqli_close($connection);
                $_SESSION['promoserror']= "<span>".
                                    "<strong class=\"center-align white-text\">"."Fill out pagename!"."</strong></span>\n";
                header("location:promos.php");
                die();
            }

          
            if (isset($_POST['promosdescription'])) {
                 if (is_numeric($_POST['promosdescription'])) {
                    $_SESSION['promoserror'] = "<span class=\"center-align\"><strong class=\"white-text\">Description is invalid!</strong></span>\n";
                 } elseif (!is_numeric($_POST['promosdescription'])) {
                     #check for first number
                    if(strlen($_POST['promosdescription']) > 0 && is_numeric($_POST['promosdescription'][0])) {
                        mysqli_close($connection);
                        $_SESSION['promoserror']= "<span class=\"center-align\"><strong class=\"white-text\">First character is a number!</strong></span>\n";
                        header("location:promos.php");
                        die;
                    } elseif (strlen($_POST['promosdescription']) > 0 && !is_numeric($_POST['promosdescription'][0])) {
                        $description = sanitizedData($_POST['promosdescription']);
                        $sqlPreventInjection = mysqli_escape_string($connection , $description);
                        
                        if (strlen($sqlPreventInjection) <= 100 &&  strlen($sqlPreventInjection) !== 0) {
                            $_SESSION['promosdescriptionSuccess'] = $sqlPreventInjection;
                                 
                        } elseif (strlen($sqlPreventInjection) > 100 || strlen($sqlPreventInjection) == 0 ) {
                            mysqli_close($connection);
                            $_SESSION['promoserror']= "<span class=\"center-align\"><strong class=\"white-text\">Characters is greater than 100!</strong></span>\n";
                            header("location:promos.php");
                            die;
                        }
                    }
                 }
            } else {
                mysqli_close($connection);
                $_SESSION['promoserror']= "<span>".
                                    "<strong class=\"center-align white-text\">"."Fill out description!"."</strong></span>\n";
                header("location:promos.php");
                die();
            }
            if (isset($_POST['promosurl'])) {
                 if (is_numeric($_POST['promosurl'])) {
                    $_SESSION['promoserror'] = "<span class=\"center-align\"><strong class=\"white-text\">Pagename is invalid!</strong></span>\n";
                 } elseif (!is_numeric($_POST['promosurl'])) {
                     #check for first number
                    if(strlen($_POST['promosurl']) > 0 && is_numeric($_POST['promosurl'][0])) {
                        mysqli_close($connection);
                        $_SESSION['promoserror']= "<span class=\"center-align\"><strong class=\"white-text\">First character is a number!</strong></span>\n";
                        header("location:promos.php");
                        die;
                    } elseif (strlen($_POST['promosurl']) > 0 && !is_numeric($_POST['promosurl'][0])) {
                        $description = sanitizedData($_POST['promosurl']);
                        $sqlPreventInjection = mysqli_escape_string($connection , $description);
                        
                        if (strlen($sqlPreventInjection) <= 20 &&  strlen($sqlPreventInjection) !== 0) {
                            $_SESSION['promosurlSuccess'] = $sqlPreventInjection;
                                  
                        } elseif (strlen($sqlPreventInjection) > 20 || strlen($sqlPreventInjection) == 0) {
                            mysqli_close($connection);
                            $_SESSION['promoserror']= "<span class=\"center-align\"><strong class=\"white-text\">Characters is greater than 100!</strong></span>\n";
                            header("location:promos.php");
                            die;
                        }
                    }
                 }
            } else {
                mysqli_close($connection);
                $_SESSION['promoserror']= "<span>".
                                    "<strong class=\"center-align white-text\">"."Fill out pagename!"."</strong></span>\n";
                header("location:promos.php");
                die();
            }
            

            if (isset($_FILES['promosimg'])) {
                
                $filePath = UploadFile($_FILES['promosimg']);
                
            } else if (!isset($_FILES['promosimg'])) {
               
                mysqli_close($connection);
                $_SESSION['promoserror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Upload Image!</strong>\n".
                                            "</strong>\n";
                header("location:promos.php");die();
            }
           if (isset($_SESSION['promosurlSuccess']) && isset($_SESSION['promosdescriptionSuccess'])&& 
                isset($_SESSION['promostitleSuccess']) && isset($_SESSION['uploadstatus'])) {
                    $titlepass = $_SESSION['promostitleSuccess'];
                    $descriptionPass = $_SESSION['promosdescriptionSuccess'];
                    $pagenamePass = $_SESSION['promosurlSuccess'];
                    $pathPass  = $_SESSION['dirpath'];
                    $sql = "CREATE TABLE IF NOT EXISTS tbl_promos (".
                        "id INT NOT NULL AUTO_INCREMENT,".
                        "title VARCHAR(50) NOT NULL,".
                        "description VARCHAR(100) NOT NULL,".
                        "pagename VARCHAR(30) NOT NULL,".
                        "path VARCHAR(1000) NOT NULL,".
                        "PRIMARY KEY(id)".
                    ")";
                    mysqli_query($connection , $sql);
                    $sql = "INSERT INTO tbl_promos(title , description, pagename , path)".
                            "VALUES('$titlepass' , '$descriptionPass' , '$pagenamePass' , '$pathPass')";
                    mysqli_query($connection , $sql);

                    // Write to a file 
                    $phpfile = $pagenamePass.".php";
                    $phppage = fopen( $phpfile, "w");
                    $data = "<?php require \"connection.php\"; ?>\n

                    <?php
                        session_start();\n
                        // check if there already login admin
                        //require \"sessiontimeout.php;\"

                        \$_SESSION['accountnew'] = false;

                        if (!isset(\$_SESSION['username']) && empty(\$_SESSION['username'])) {
                            header(\"location:login.php\");
                        }
                    ?>
                    <!DOCTYPE html>
                    <html lang=\"en\">
                    <head>
                        <meta charset=\"UTF-8\">
                        <!--[if lt IE 9]>
                            <script type=\"text/javascript\" src=\"../js/html5shiv.min.js\"></script>
                        <![endif]-->
                        <!-- <link href=\"https://fonts.googleapis.com/icon?family=Material+Icons\" rel=\"stylesheet\"> -->
                        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
                        <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
                        <link rel=\"icon\" href=\"../img/logo/favicon.ico\" type=\"image/x-icon\" />
                        <link rel=\"shortcut icon\" href=\"../img/logo/favicon.ico\" type=\"image/x-icon\" />
                        <title>".$titlepass."</title>
                        <link rel=\"stylesheet\" type=\"text/css\" href=\"../css/normalize.css\">
                        <!-- <link rel=\"stylesheet\" type=\"text/css\" href=\"https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css\" media=\"screen, projection\"> -->
                        <link rel=\"stylesheet\" type=\"text/css\" href=\"../css/materialize.min.css\" media=\"screen, projection\">
                        <link rel=\"stylesheet\" type=\"text/css\" href=\"../css/main.css\">
                        <?php 
                            if(isset(\$_SESSION['sessionexpnotifacation'])) {
                                echo \$_SESSION['sessionexpnotifacation'];
                                \$_SESSION['sessionexpnotifacation'] = null;
                                header(\"location:login.php\");
                            }       
                        ?>
                        <style type=\"text/css\">
                        </style>
                    </head>

                    <body>
                        <header class=\"headerstyle\">
                            <ul id=\"dropdown1\" class=\"dropdown-content admincolor adminlinks\">
                                <li><a href=\"profile.php\">Profile</a></li>
                                <li><a href=\"logout.php\">Log Out</a></li>
                            </ul>
                            <nav>
                                <div class=\"nav-wrapper adminnavbar admincolor\">
                                    <a href=\"#\" class=\"brand-logo center-align brand-logomobile\"><img class=\"logo-brand\" src=\"../img/logo/cofftealogo.png\" width=\"100px\" heigth=\"100px\"></a>
                                    <ul class=\"right hide-on-med-and-down\">
                                        <li>
                                            <a class=\"dropdown-button\" href=\"#!\" data-activates=\"dropdown1\">admin
                                                <i class=\"material-icons right white-text\">arrow_drop_down</i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                            <div class=\"row\">
                                <div class=\"col s12 m12 l12 xl12\"></div>
                            </div>
                            <ul id=\"slide-out\" class=\"side-nav admincolor fixed  sidenavstyle\">
                                <li>
                                    <h1 class=\"center-align white-text usernametextadmin\">Admin <?php echo \$_SESSION['username'];?></h1>
                                </li>
                                <li class=\"logostyle\">
                                    <a href=\"dashboard.php\" class=\"center-align\"><img src=\"../img/logo/cofftealogo.png\" width=\"70%\" height=\"100%\" srcset=\"\"></a>
                                </li>
                                <li>
                                    <a href=\"dashboard.php\" class=\"left-align white-text sidenavmainlinks\">
                                        <span>Dashboard</span><i class=\"left material-icons white-text\">dashboard</i>
                                    </a>
                                </li>
                                <li>
                                    <a href=\"users.php\" class=\"left-align white-text sidenavmainlinks\">
                                        <span>Users</span>
                                        <i class=\"left material-icons white-text\">person</i>
                                    </a>
                                </li>
                                <li class=\"no-padding\">
                                    <ul class=\"collasible collapsible-accordion\">
                                        <li>
                                            <a href=\"#!\" class=\"left-align white-text sidenavmainlinks\">
                                                <span>Maintenance</span>
                                                <i class=\"left material-icons white-text\">build</i>
                                            </a>
                                            <div class=\"collapsible-body admincolor\">
                                                <ul>
                                                    <li>
                                                        <a href=\"securityquestion.php\" class=\"white-text left-align\">Inbox
                                                            <i class=\"tiny material-icons  white-text left\">inbox</i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                
                                </li>
                                <li class=\"no-padding\">
                                    <ul class=\"collapsible collapsible-accordion\">
                                        <li>
                                            <a class=\"collapsible-header left-align admincolor white-text\">Pages
                                                <i class=\"material-icons left white-text\">description</i>
                                            </a>
                                            <div class=\"collapsible-body admincolor\">
                                                <ul>
                                                    <li>
                                                        <a href=\"homepage.php\" class=\"white-text left-align\">Home
                                                            <i class=\"tiny material-icons left white-text\">home</i>
                                                        </a>
                                                    </li>
                                                    <li class=\"no-padding\">
                                                        <ul class=\"collapsible collapsible-accordion\">
                                                            <li>
                                                                <a href=\"#!\" class=\"collapsible-header white-text left-align\">Our Menu
                                                                    <i class=\"tiny material-icons left white-text\">arrow_drop_down</i>
                                                                </a>
                                                                <div class=\"collapsible-body admincolor\">
                                                                    <ul>
                                                                        <li>
                                                                            <a href=\"drinks.php\" class=\"white-text left-align indent\">Drinks
                                                                                <i class=\"tiny material-icons left white-text\">local_bar</i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href=\"foods.php\" class=\"white-text left-align indent\">Foods
                                                                                <i class=\"tiny material-icons left white-text\">local_dining</i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href=\"dessert.php\" class=\"white-text left-align indent\">Dessert
                                                                                <i class=\"tiny material-icons left white-text\">cake</i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href=\"services.php\" class=\"white-text left-align\">Services
                                                            <i class=\"tiny material-icons left white-text\">style</i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href=\"gallery.php\" class=\"white-text left-align\">Gallery
                                                            <i class=\"tiny material-icons left white-text\">photo_library</i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href=\"contactus.php\" class=\"white-text left-align\">Contact Us
                                                            <i class=\"tiny material-icons left white-text\">local_phone</i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href=\"faq.php\" class=\"white-text left-align\">FAQ
                                                            <i class=\"tiny material-icons left white-text\">help</i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href=\"aboutus.php\" class=\"white-text left-align\">About Us
                                                            <i class=\"tiny material-icons left white-text\">person_pin</i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class=\"no-padding\">
                                    <ul class=\"collapsible collapsible-accordion\">
                                        <li>
                                            <a href=\"#!\" class=\"collapsible-header left-align admincolor white-text sidenavmainlinks\">
                                                <span>Messages</span>
                                                <i class=\"left material-icons white-text\">contact_mail</i>
                                            </a>
                                            <div class=\"collapsible-body admincolor\">
                                                <ul>
                                                    <li>
                                                        <a href=\"inbox.php\" class=\"white-text left-align\">Inbox
                                                            <i class=\"tiny material-icons  white-text left\">inbox</i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>    
                                        </li>
                                    </ul>
                                </li>
                                <li class=\"no-padding\">
                                    <ul class=\"collapsible collapsible-accordion\">
                                        <li>
                                            <a class=\"collapsible-header left-align admincolor white-text\">authetication
                                                <i class=\"material-icons left white-text\">fingerprint</i>
                                            </a>
                                            <div class=\"collapsible-body admincolor\">
                                                <ul>
                                                    <li>
                                                        <a href=\"filter.php\" class=\"white-text left-align\">Request
                                                            <i class=\"tiny material-icons  white-text left\">blur_circular</i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href=\"registrationadmin.php\" class=\"white-text left-align\">Registration
                                                            <i class=\"tiny material-icons white-text left\">person_add</i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class=\"no-padding admincolor adminprofilemobile\">
                                    <ul class=\"collapsible collapsible-accordion\">
                                        <li>
                                            <a  class=\"collapsible-header left-align admincolor white-text\">Admin
                                                <i class=\"material-icons left white-text\">arrow_drop_down</i>
                                            </a>
                                            <div class=\"collapsible-body admincolor\">
                                                <ul>
                                                    <li>
                                                        <a href=\"profile.php\" class=\"white-text left-align\">Profile
                                                            <i class=\"tiny material-icons  white-text left\">face</i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href=\"logout.php\" class=\"white-text left-align\">Logout
                                                            <i class=\"tiny material-icons white-text left\">input</i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <a href=\"#\" data-activates=\"slide-out\" class=\"button-collapse\">
                                <i class=\"material-icons brown-text text-darken-4 adminmenu\">menu</i>
                            </a>
                        </header>
                        <main>
                            <div class=\"row\">
                                <div class=\"col s12 m12 l12 xl12\">
                                    <div class=\"row\">
                                        <div class=\"col s12 m12 l12 xl12\">
                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </main>
                        <!-- for development javascript file -->
                        <script type=\"text/javascript\" src=\"../js/jquery.min.js\"></script>
                        <script type=\"text/javascript\" src=\"../js/materialize.min.js\"></script>

                        <!-- for production ready javascript file -->
                        <!-- uncomment all the script for production used -->
                        <!-- 
                            <script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js\" type=\"text/javascript\"></script>
                            <script src=\"https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js\" type=\"text/javascript\"></script>
                        -->
                        <script src=\"../js/main.js\" type=\"text/javascript\"></script>
                    </body>
                    </html>";
                    fwrite($phppage ,$data);
                    fclose($phppage);
                    mysqli_close($connection);
                    $_SESSION['promossuccess'] = "<span class=\"center-align\"><strong class=\"white-text\">".$pagename." successfully Added</strong></span>\n";
                    header("location:promos.php");die;
                }
        }
    } else {
        header("location:promos.php");
        die();
    } 

?>