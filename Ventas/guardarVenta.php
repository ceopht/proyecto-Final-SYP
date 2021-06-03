<?php
    include_once ('../Database/VentasFinalCRUD.php');
    include_once  ('../Database/VentasContribuyenteCRUD.php');

    if($_POST['tipo']==1){
        /*insertarVentaF($fecha,$nFactura,$Total) */
        insertarVentaF($_POST['fecha'],$_POST['factura'],$_POST['total']);
    }else if($_POST['tipo']==2){
        /*insertarVentaC($fecha,$nFactura,$idCliente,$venta,$IVA) */
        insertarVentaC($_POST['fecha'],$_POST['factura'],$_POST['idCliente'],$_POST['venta'],$_POST['IVA']);
    }

    $_SESSION['message'] = 'Venta registrada';
    $_SESSION['message_type'] = 'success';
    header('Location: ventas.php');
?>