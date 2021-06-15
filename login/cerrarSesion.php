<?php
unset($_SESSION['id']);
unset($_SESSION['user']); 
unset($_SESSION['type']);
session_destroy();
setcookie('session_id','562tfydwhsbdj2iqdwkn',time()+-1,'/');
header('Location: ../login/login.php');

