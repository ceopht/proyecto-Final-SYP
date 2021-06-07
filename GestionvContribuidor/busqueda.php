<?php
session_start();

if($_POST['tipo']=="fecha"){

    $_SESSION['valor'] = $_POST['fecha'];

}else if($_POST['tipo']=="idCliente"){

    $_SESSION['valor'] = $_POST['idCliente'];

}else{

    $_SESSION['valor'] = $_POST['valor'];

}

$_SESSION['opcion'] = $_POST['tipo'];
header('Location: gestorContribuidor.php');

?>