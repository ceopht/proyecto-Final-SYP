<?php
session_start();
date_default_timezone_set('America/El_Salvador');
function connect(){    
    $conn = mysqli_connect(
        'bobe4yqqdi5erwefqczh-mysql.services.clever-cloud.com',
        'udmu6yjnoih4eqeh',
        'dxYM9CnWef6c2rAbIswX',
        'bobe4yqqdi5erwefqczh'
      ) or die(mysqli_erro($mysqli));
    return $conn;
}

?>