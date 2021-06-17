<?php
include_once ('../Database/VentasContribuyenteCRUD.php');
include_once ('../Database/clientesCRUD.php');

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

$opcion = "fecha";
$valor = date("Y-m-d");

$seleccion = ["id","fecha","nFactura","nombre", "NRC","venta","IVA"];

if(isset($_SESSION['opcion'])){
    if($_SESSION['valor']!=""){
        $opcion = $_SESSION['opcion'];
        $valor = $_SESSION['valor'];
    }
    unset($_SESSION['opcion']);
    unset($_SESSION['valor']);
}
$datos = buscarVentaC($valor,$opcion);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Ventas contribuyente</title>
</head>
<body>

    <div class="d-flex justify-content-center m-4">
    
        <div class="d-flex flex-column">
            <div class="row">

                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-<?=$_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                        <strong><?=$_SESSION['message']?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php 
                unset($_SESSION['message']);
                unset($_SESSION['message_type']);
                }

                ?>

            </div>
        <h3 class="m-4">Administración de ventas a contribuidor</h3>
            <div class="row">
                <form action="busqueda.php" method="post">

                <div class="btn-group" role="group" aria-label="Basic example">
                    
                        <div class="col-4 m-2">

                            <select class="form-select" aria-label="Default select example" id="tipo" name="tipo" onclick="generarCampos()">
                                <option value="fecha" selected>Selecione tipo de busqueda</option>
                                <option value="fecha">Fecha</option>
                                <option value="nFactura">Número de factura</option>
                                <option value="idCliente">Cliente</option>
                                <option value="id">Id de venta</option>
                            </select>

                        </div>

                        <div class="col-4 m-2">

                            <input type="date" name="fecha" class="form-control" id="fecha" value="<?=$valor?>">

                            <input type="number" step="1" name="valor" id="valor" class="form-control">

                            <select class="form-select" aria-label="Default select example" id="cliente" name="idCliente" onselect="generarCampos()">
                                <?php 
                                    $clientes = mostrarDatosC();
                                    while($row = mysqli_fetch_assoc($clientes)) {
                                        $nombre = $row['nombre'];
                                        $idCliente = $row['idCliente'];
                                        echo "<option value='$idCliente'>$nombre</option>";
                                    }
                                ?>
                            </select>

                        </div>
                        <div class="col-4 m-2">

                            <input type="submit" class="btn btn-secondary" value="Buscar">

                        </div>

                    </div>
                </form>
            </div>

            <div class="row">
                <table class="table table table-striped">
                    <thead>

                    <!--id, fecha, nFactura, idCliente, venta, IVA, nombre, NRC-->
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Factura</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">NRC</th>
                            <th scope="col">Venta</th>
                            <th scope="col">IVA</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($datos)){
                            echo "<tr>";
                            foreach($seleccion as $valor){
                            ?>
                            <td><?= $row[$valor]; ?></td>
                        
                        <?php }?>
                            <td>
                                <a href="editC.php?id=<?= $row['id']?>" class="btn btn-primary">Editar</a>
                                <a href="deleteC.php?id=<?= $row['id']?>" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr> 
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="funcionesGC.js"></script>
</body>
</html>