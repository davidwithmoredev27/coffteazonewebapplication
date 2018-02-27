<?php
    $salt  = '$2a$07$usesomassodosrkeoaol1e35958kdafir1rsalt$';
    $password = "johndelgado";
    $hash = crypt($password , $salt);
    echo  $hash;
?>