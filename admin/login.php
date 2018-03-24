<?php require "connection.php"; ?>
<?php
    session_start();
    //date_default_timezone_set("Asia/Manila");
   

    if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
        mysqli_close($connection);
        header("location:dashboard.php?admin");
    }
    if (!isset($_SESSION['loginerror'])) {
        $_SESSION['loginerror'] = 0;
    }
    if ($_SESSION['loginerror'] == 2) {
        $_SESSION['usernameloginerror'] = "<span><strong class=\"white-text\">1 more password attempt and you wil be directed to forgot password form!</strong></span>\n";
    }
    if ($_SESSION['loginerror'] == 3) {
        mysqli_close($connection);
        
        header("location:forgotpassword.php");
        die();
    }
    $username = false;
    $password = false;
    $usernameErr = "";
    $passwordErr = "";
    $usernameQuery = array();
    $passwordQuery = array();
    $usernameCounter = 0;
    $passwordCounter = 0;
    
    $salt  = '$2a$07$usesomassodosrkeoaol1e35958kdafir1rsalt$';
    $userCredentials = array("username" => null , "password" => null);
    function sanitizedData($data) {
        $triminput  = trim($data);
        $striplashesinput = stripslashes($triminput);
        $htmlcharscape = htmlspecialchars($striplashesinput);
        $sanitizedData = $htmlcharscape;
        return $sanitizedData;
    }
    //session_unset();
    // //auto redirect to dashboard if you already login
    if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
        header("Location: dashboard.php");
         mysqli_close($connection);
        die();
    }
    if (isset($_POST['login'])) {
         
    

         if (isset($_POST['username']) && !empty($_POST['username'])) {
            $usernameSanitized = sanitizedData($_POST['username']);
            $username = mysqli_escape_string($connection , $usernameSanitized);
            $sql = "SELECT username FROM tbl_admin";
            $resultQuery = mysqli_query($connection , $sql);
            if (mysqli_num_rows($resultQuery) > 0) {
                while ($usernamerow = mysqli_fetch_assoc($resultQuery)){
                    array_push($usernameQuery, $usernamerow['username']);
                }
                $i = 0;
                while ($i < count($usernameQuery)) {
                    # code...
                    if ($usernameQuery[$i] == $username) {
                        $userCredentials['username'] = $usernameQuery[$i];
                        //$_SESSION['username'] = $userCredentials['username'];
                        break;
                    } 
                    $i++;
                }
                if (!isset($userCredentials['username'])) {
                    $_SESSION['usernameloginerror'] = "<span><strong class=\"white-text\">Enter a valid username!</strong></span>\n";
                    
                }
            }
        } 

        if (isset($_POST['password']) && !empty($_POST['password'])) {
            $passwordSanitized = sanitizedData($_POST['password']);
            $password = mysqli_escape_string($connection , $passwordSanitized);
            
            $encCost = array("cost" => 11);

            // encrypt password using crypt
            $hash_password = crypt($password , $salt);
            $sql = "SELECT password FROM tbl_admin";
            $resultQuery = mysqli_query($connection , $sql);
            
            if (mysqli_num_rows($resultQuery) > 0) {
                 while ($passwordrow = mysqli_fetch_assoc($resultQuery)){
                    array_push($passwordQuery, $passwordrow['password']);
                 }

                $i = 0;
                while ($i < count($passwordQuery)) {
                    if ($passwordQuery[$i] == $hash_password) {
                        $userCredentials['password'] = $passwordQuery[$i];
                        //$_SESSION['password'] = $userCredentials['password'];
                        break;
                    }
                    $i++;
                }
        
                if (!isset($userCredentials['password'])) {
                    $_SESSION['loginerror'] = $_SESSION['loginerror'] + 1;
                     if ($_SESSION['loginerror'] == 1) {
                         $_SESSION['usernameloginerror'] = "<span><strong class=\"white-text\">Looks like your Password did not match!</strong></span>\n";
                     }
                     mysqli_close($connection);
                    header("location:login.php");
                    die;                    
                }
            }
        }
        if (!isset($userCredentials['username']) && !isset($userCredentials['password'])) {
            if (!isset($userCredentials['password'])) {
                 $_SESSION['usernameloginerror'] = "<span><strong class=\"white-text\">Enter a valid account!</strong></span>\n";
            }
            mysqli_close($connection);
            header("location:login.php");
            die;
        }

       
        if (isset($userCredentials['username']) && isset($userCredentials['password']) &&
            !empty($userCredentials['username']) && !empty($userCredentials['password'])) {
        
            $_SESSION['username'] = $userCredentials['username'];
            $_SESSION['password'] = $userCredentials['password'];
            header("location:dashboard.php?admin");
        }
    }
   
    mysqli_close($connection);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--[if lt IE 9]>
        <script type="text/javascript" src="js/html5shiv.min.js"></script>
    <![endif]-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../img/logo/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="../img/logo/favicon.ico" type="image/x-icon"/>
    <title>Coffteazone Login</title>
    <link rel="stylesheet" type="text/css" href="../css/normalize.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" media="screen , projection"> -->
    <link rel="stylesheet" type="text/css" href="../css/materialize.min.css" media="screen , projection">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/logofixed.css">
</head>
<body id="loginbackground">
    <div class="container">
        <div class="row">
            <div class="col s12 l12 m12 xl12"></div>
        </div>
        <div class="row">
            <div class="col s12 l12 m12 xl12"></div>
        </div>
        <div class="row">
            <div class="col s12 l12 m12 xl12"></div>
        </div>
        <div class="row removeonmedium">
            <div class="col s12 l12 m12 xl12"></div>
        </div>
        <div class="row loginimg" role="coffteazonelogo">
            <div class="col l3 offset-l4 m3 offset-m4 xl3 offset-xl4 s5 offset-s3 loginlogo">
                <img src="../img/logo/cofftealogo.png"  alt="coffteazone logo"  id="logoimage">
            </div>
        </div>
        <?php
            if (isset($_SESSION['usernameloginerror'])) {
                echo "<div class=\"container\">\n";
                    echo "<div class=\"row\">\n";
                        echo "<div class=\"col s12 m6 offset-m3 l6 offset-l3 xl6 offset-xl3 card-panel red darken-3\">\n";
                            echo "<p class=\"center-align\"><strong class=\"white-text\" >". $_SESSION['usernameloginerror']."</strong></p>\n";
                            echo "<p class=\"center-align\"><strong class=\"white-text\" >Please try again.</strong></p>\n";
                        echo "</div>\n";
                    echo "</div>\n";
                echo "</div>\n";
            }
        ?>
    </div>
    <div class="row col s12 m12 l12 xl12">
        <div class="container">
            <form class="col s12 m12 l12 x12" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                <div class="container">
                    <div class="container">
                         <div class="input-field col s12 m12 l12 xl12">
                            <input id="username"  autocomplete="off" onfocus="this.value =''" role="username" type="text" class="brown-text text-darken-3" name="username" class="validate">
                            <label for="username" class="brown-text text-lighten-4">Username</label>
                        </div>
                        <div class="input-field col s12 m12  l12 xl12">
                            <input id="password" role="password" type="password" class="brown-text text-darken-3" name="password" class="validate">
                    
                            <label for="password" class="brown-text text-lighten-3" >Password</label>
                        </div>
                        <div class="input-field col s12 m12 l12 xl12">
                            <a role="passwordrecovery" href="forgotpassword.php" class="brown-text text-lighten-4" id="forgotpassword" >forgot password?</a>
                            <div class="row">
                                <div class="col s12 l12 m12 xl12"></div>
                            </div> 
                            <div class="row">
                                <button role="login" id="submitbutton" class="waves-effect brown darken-3 waves-light btn col s12 m12 l12  xl12" type="submit" name="login">login</button>
                            </div> 
                        </div>  
                    </div>
                      
                </div>
                 
            </form>
        </div>
    </div>
    
    <!-- for development javascript file -->
    <script  type="text/javascript" src="../js/jquery.min.js"></script>
    <script  type="text/javascript" src="../js/materialize.min.js"></script>

    <!-- for production ready javascript file -->
    <!-- uncomment all the script for production used -->
    
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js" type="text/javascript"></script> -->
    <script src="../js/main.js" type="text/javascript"></script>
    <script src="../js/validation.js" type="text/javascript"></script>
</body>
<?php $_SESSION['usernameloginerror'] = null;?>
</html>