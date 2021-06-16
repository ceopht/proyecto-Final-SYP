<?php
include_once ('../Database/VentasFinalCRUD.php');

$datos;

if(isset($_GET['id'])){
    $datos = buscarVentaF($_GET['id'],"id");
}
$row = mysqli_fetch_assoc($datos);

if(isset($_POST['total'])){
    editarVentaF($_POST['fecha'],$_POST['factura'],$_POST['total'],$_GET['id']);
    $_SESSION['message'] = 'Venta actualizada con éxito';
    $_SESSION['message_type'] = 'success';
    header('Location: gestorCFinal.php');
}

if(!isset($_COOKIE['session_id'])){             //Si no se tiene un token de logeo
    header('Location: ../login/login.php');
  }
  if($_SESSION['type']=="vendedor"){         //Si el usuario es un vendedor
    header('Location: ../Ventas/ventas.php');  
  }if($_SESSION['type']=="admin"){                //Si el usuario es un administrador
    include_once ('../navBar/NBAdmin.php');
  }if($_SESSION['type']=="contador"){             //si el usuario es un contador
    header('Location: ../BalanceGeneral/balance.php');
  }
?>

<!DOCTYPE html>
<html lang="es">
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

            <h3 class="text-center m-4">Actualizar venta a consumidor final</h3>

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

                    <div class="m-4 venta">
                        <label class="form-label m-2">Venta</label>
                        <input type="number" name="total" step="0.01" value="<?=$row['Total']?>" class="validar m-2 form-control">
                    </div>
                    
                    <div class="text-center">
                        <input type="submit" value="Actualizar venta" class="btn btn-primary">
                    </div>
                </div>
            </form>

        </div>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>