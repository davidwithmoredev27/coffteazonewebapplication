<?php
    $userAgent = $_SERVER['HTTP_USER_AGENT'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php echo "<p>" . $userAgent."</p>";?>
    <!-- <?php echo "<pre>"; ?>    
    <?php var_dump($_SERVER); ?>
    <?php echo "</pre>"; ?> -->
</body>
</html>