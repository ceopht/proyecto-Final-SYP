<?php
session_start();

if($_POST['tipo']=="fecha"){

    $_SESSION['valor'] = $_POST['fecha'];

}else{

    $_SESSION['valor'] = $_POST['valor'];

}

$_SESSION['opcion'] = $_POST['tipo'];
header('Location: gestorContribuidor.php');

?>