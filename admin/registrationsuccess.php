<?php require "connection.php"; ?>
<?php
    session_start();
    if (isset($_SESSION['username']) && !empty($_SESSION['password'])) {
        header("location : dashboard.php");
        die();
    }
    if (!isset($_SESSION['newaccount'])) {
        header("location:login.php");
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
    session_unset();
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
                        $_SESSION['username'] = $userCredentials['username'];
                        break;
                    } 
                    $i++;
                }
                if (!isset($userCredentials['username'])) {
                    $_SESSION['usernameloginerror'] = "<span><strong class=\"white-text\">Looks like your Username did not match!</strong></span>\n";
                    header("location: login.php");
                    die();
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
                        $_SESSION['password'] = $userCredentials['password'];
                        break;
                    } 
                    $i++;
                }
                 if (!isset($userCredentials['password'])) {
                    $_SESSION['usernameloginerror'] = "<span><strong class=\"white-text\">Looks like your Password did not match!</strong></span>\n";
                    header("location: login.php");
                    die();
                }
               
            }
        }

        if (isset($userCredentials['username']) && isset($userCredentials['password']) &&
            !empty($userCredentials['username']) && !empty($userCredentials['password'])) {
            
            header("Location:dashboard.php?admin");
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
    <!-- <link rel="stylesheet" type="text/css" href="css/normalize.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" media="screen , projection">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
    <?php  ?>
    <div class="container">
        <div class="row">
            <div class="col s12 l12 m12 xl12"></div>
        </div>
        <div class="row loginimg" role="coffteazonelogo">
            <div class="col l3 offset-l5 m3 offset-m5 xl3 offset-xl5 s7 offset-s3">
                <img src="../img/logo/cofftealogo.png" width="75%" height="75%" alt="coffteazone logo">
            </div>
        </div>
        <div class="row">
            <div class="col s12 m6 offset-m3 l6 offset-l3 xl6 offset-xl3 card-panel green darken-2" role="registrationsuccessbanner">
                <p class="center-align"><strong class="white-text" >Your cannot Access the admin with this account</strong></p>
                <p class="center-align"><strong class="white-text" >this account needs a verifation from the owner!</strong></p>
            </div>
        </div>
    </div>
     <div class="row col s12 m12 l12 xl12">
        <div class="container">
            <form class="col s12 m12 l12 x12" method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>">
                <div class="input-field col s12 m12 l12 xl12">
                    <input id="username" autocomplete="off" role="username" type="text" class="brown-text text-darken-3" name="username" class="validate">
                    <label for="username" class="brown-text text-darken-3">Username</label>
                </div>
                <div class="input-field col s12 m12  l12 xl12">
                    <input id="password" role="password" type="password" class="brown-text text-darken-3" name="password" class="validate">
                    <label for="password" class="brown-text text-darken-3" >Password</label>
                </div>
                <div class="input-field col s12 m12 l12 xl12">
                    <a role="passwordrecovery" href="forgotpass.php" class="brown-text text-darken-3" id="forgotpassword" >forgot password?</a>
                    <div class="row">
                        <div class="col s12 l12 m12 xl12"></div>
                    </div>
                    <div class="row">
                        <button role="login" id="submitbutton" class="waves-effect brown darken-3 waves-light btn col s6 offset-s3 m6 offset-m3 l4 xl4 offset-xl1 offset-l1" type="submit" name="login">login</button>
                        <div  id="loginbtnseperator"class="row">
                            <div class="col s12 m12 xl12 l12"></div>
                        </div>
                        <a href="registration.php" role="regiter" class="waves-effect brown darken-3 waves-light btn col s6 offset-s3 m6 offset-m3 l4 xl4 offset-xl2 offset-l2">Sign Up</a>
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
</html>