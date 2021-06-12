<?php
include_once ('../Database/VentasFinalCRUD.php');

if(isset($_GET['id'])){
    borrarVentaF($_GET['id']);
    $_SESSION['message'] = 'Venta eliminada con éxito';
    $_SESSION['message_type'] = 'danger';
}
header('Location: gestorContribuidor.php');
?>


