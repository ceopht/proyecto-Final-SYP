<?php
session_start();
$_SESSION['fInicial'] = $_POST['fInicial'];
$_SESSION['fFinal'] = $_POST['fFinal'];
header('Location: balance.php');

?>