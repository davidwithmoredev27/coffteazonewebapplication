<?php
    $feedbackID = $_POST["feedbackID"];//sanitized
    $name = $_POST["name"];
?>
<?php require("template/session.php"); ?>
<!DOCTYPE html>
<html>
<?php require("template/head.php"); ?>
<body>
    <noscript class="no-js">
       <div class="row">
           <div class="col s12 m12 l12 xl12">
               <h1 class="center-align">Please enable javascript on your web browser!</h1>
                <p class="center-align">Our website will not function correctly if javascript is disabled.</p>
           </div>
       </div>
    </noscript>
    <?php require("template/header.php"); ?>
    <main>
        <!-- Main -->
        <div class="row">
            <div class="col s12 l12 m12 xl12">
                <div class="row">
                    <div class="col s12 m12 l12 xl12">   
                        <nav class="removebreadcrumbsstyle">
                            <div class="nav-wrapper">
                                <div class="col s12 m12 l12 xl12">
                                    <a href="#!" class="breadcrumb">Message</a>
                                    <a href="feedback.php" class="breadcrumb">FeedBack</a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    </div class="col s12 l12 m12 xl12">
                        <?php 
                            require("template/feedbacktable.php");
                            $query = "SELECT* FROM tbl_feedback WHERE feedbackID = $feedbackID";
                            viewfeedback($feedbackID, $query); 
                        ?>
                        
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12 xl12"></div>
                    </div>
                    <a href="feedback.php" class="btn waves-light waves-effect col s12 m12 l2 xl2 offset-l5 offset-xl5">Close</a>
                </div>
            </div>
        </div>
    </main>
    <?php require("template/footer.php"); ?>
</body>
</html>