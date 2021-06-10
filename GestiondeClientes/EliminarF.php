<?php
include_once ('../Database/clientesCRUD.php');

if(isset($_GET['idCliente'])){
    borrarCliente($_GET['idCliente']);
    $_SESSION['message'] = 'Cliente eliminado con éxito';
    $_SESSION['message_type'] = '';
}
header('Location: FormularioCliente.php');
?>