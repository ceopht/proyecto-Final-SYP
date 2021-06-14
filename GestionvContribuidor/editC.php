<?php
include_once ('../Database/VentasContribuyenteCRUD.php');
include_once ('../Database/clientesCRUD.php');

$datos;

if(isset($_GET['id'])){
    $datos = datosEspecificosCo($_GET['id']);
}
$row = mysqli_fetch_assoc($datos);

if(isset($_POST['venta'])){
    editarVentaC($_POST['fecha'],$_POST['factura'],$_POST['idCliente'],$_POST['venta'],$_POST['IVA'],$_GET['id']);
    $_SESSION['message'] = 'Venta actualizada con éxito';
    $_SESSION['message_type'] = 'success';
    header('Location: gestorContribuidor.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Actualizar venta</title>
</head>
<body>
<div class="d-flex justify-content-center m-4">
        <div class="col-md-4">

            <h3 class="text-center m-4">Actualizar venta a contribuyente</h3>

            <form action="editC.php?id=<?=$_GET['id']?>" method="post">

                <div id="campos">

                    <div class="m-4 fecha">
                        <label class="form-label m-2">Fecha</label>
                        <input type="date" name="fecha" class="validar m-2 form-control" value="<?=$row['fecha']?>">
                    </div>

                    <div class="m-4 factura">
                        <label class="form-label m-2">Número de factura</label>
                        <input type="number" name="factura" class="validar m-2 form-control" value="<?=$row['nFactura']?>">
                    </div>

                    <div class="m-4 nombre">
                        <label class="form-label m-2">Nombre del cliente</label>
                        <select class="form-select" aria-label="Default select example" id="tipo" name="idCliente">
                            <?php 
                                $d = mostrarDatosC();
                                while($r = mysqli_fetch_assoc($d)) {
                                    $nombre = $r['nombre'];
                                    $idCliente = $r['idCliente'];
                                    if($r['nombre']==$row['nombre']){
                                        echo "<option value='$idCliente' selected>$nombre</option>";
                                    }else{
                                        echo "<option value='$idCliente'>$nombre</option>";
                                    }
                                }
                            ?>
                        </select>
                        
                    </div>

                    <div class="m-4 venta">
                        <label class="form-label m-2">Venta</label>
                        <input type="number" name="venta" step="0.01" value="<?=$row['venta']?>" class="validar2 m-2 form-control">
                    </div>

                    <div class="m-4 IVA">
                        <label class="form-label m-2">IVA</label>
                        <input type="number" name="IVA" step="0.01" value="<?=$row['IVA']?>" class="validar2 m-2 form-control">
                    </div>
                    
                    <div class="text-center">
                        <input type="submit" value="Actualizar venta" class="btn btn-primary">
                    </div>
                </div>
            </form>

        </div>
        
    </div>
</body>
</html>