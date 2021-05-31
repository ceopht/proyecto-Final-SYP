<?php

function connect(){

    $conn = mysqli_connect(
        'localhost',
        'root',
        '',
        'records'
      ) or die(mysqli_erro($mysqli));
    return $conn;
}

?>