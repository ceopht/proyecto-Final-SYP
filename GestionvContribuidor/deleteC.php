<?php
include_once ('../Database/VentasContribuyenteCRUD.php');

if(isset($_GET['id'])){
    borrarVentaC($_GET['id']);
    $_SESSION['message'] = 'Venta eliminada con éxito';
    $_SESSION['message_type'] = 'danger';
}
header('Location: gestorContribuidor.php');
?>


