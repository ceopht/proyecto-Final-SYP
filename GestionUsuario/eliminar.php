<?php 

include_once ('../Database/usersCRUD.php');

if (isset($_GET['id'])) {
    
    $id = $_GET['id'];


    borrarUsuario($id);
    $_SESSION['message'] = 'USUARIO ELIMINADO';
    $_SESSION['message_type'] = 'danger';
header("location: buscar.php");
}


?>