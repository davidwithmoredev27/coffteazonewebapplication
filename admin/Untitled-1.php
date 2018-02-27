<?php
    $salt = '$2a$07$usesomassodosrkeoaol1e35958kdafir1rsalt$';
    $password = crypt("coffteazone" , $salt);
    echo $password;
?>