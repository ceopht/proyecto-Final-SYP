<?php
include_once ('../Database/VentasFinalCRUD.php');

$opcion = "fecha";
$valor = date("Y-m-d");

$seleccion = ["id","fecha","nFactura","Total"];

if(isset($_SESSION['opcion'])){
    $opcion = $_SESSION['opcion'];
    $valor = $_SESSION['valor'];
}
$datos = buscarVentaF($valor,$opcion);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Ventas consumidor final</title>
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
                session_unset(); 
                }

                ?>

            </div>
        <h3 class="m-4">Administración de ventas a consumidor final</h3>
            <div class="row">
                <form action="busqueda.php" method="post">

                <div class="btn-group" role="group" aria-label="Basic example">
                    
                        <div class="col-4 m-2">

                            <select class="form-select" aria-label="Default select example" id="tipo" name="tipo" onclick="generarCampos()">
                                <option value="fecha" selected>Selecione tipo de busqueda</option>
                                <option value="fecha">Fecha</option>
                                <option value="nFactura">Número de factura</option>
                                <option value="id">Id de venta</option>
                            </select>

                        </div>

                        <div class="col-4 m-2">

                            <input type="date" name="fecha" class="form-control" id="fecha" value="<?=$valor?>">

                            <input type="number" step="1" name="valor" id="valor" class="form-control">

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

                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Factura</th>
                            <th scope="col">Total</th>
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