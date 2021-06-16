<?php
include_once ('../Database/VentasFinalCRUD.php');
$datos = datosMes();
$registro= "Mensual";
if(!empty($_GET)&& $_GET['status']=="diario"){
    $datos = datosDiarios();
    $registro= "Diario";
}if(!empty($_GET)&& $_GET['status']=="mensual"){
    $datos = datosMes();
    $registro= "Mensual";
}
if(!empty($_GET)&& $_GET['status']=="semanal"){
    $datos = datosSemana();
    $registro= "Semanal";
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libro IVA consumidor Final</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>

    <?php
    
    if(!isset($_COOKIE['session_id'])){             //Si no se tiene un token de logeo
        header('Location: ../login/login.php');
    }
    if($_SESSION['type']=="vendedor"){         //Si el usuario es un vendedor
        header('Location: ../Ventas/ventas.php');  
    }if($_SESSION['type']=="admin"){                //Si el usuario es un administrador
        include_once ('../navBar/NBAdmin.php');
    }if($_SESSION['type']=="contador"){             //si el usuario es un contador
        include_once ('../navBar/NBContador.php');
    }

    $total=0;
    
    ?>
    <div class='card'>
        <div class='card-header'>
            <div>
                <p class='text-center font-weight-bold fs-3'>LIBRO DE IVA CONSUMIDOR FINAL</p>
                <p class='text-center font-weight-bold fs-5'> Registro <span><?=$registro?></span></p>
            </div>
            <div>
                <p class='text-center'><span class='fs-4'>Nombre del contribuyente: Diego Herrera</span></p>
                <div class='d-flex justify-content-evenly'>
                    <span class='fs-4'>N.C.R.:1957-0</span>
                    <span class='fs-4'>NIT:0561-017231-111-5</span>
                </div>
            </div>
        </div>
        <div class='card-body'>
            <div class="mb-2">Tiempo de registro:</div>
            <div class="btn-group me-2" role="group">
                <a href="../Libros_IVAS/consumidor_final.php?status=diario">
                    <button type="button" class="btn btn-outline-dark mx-1">Diario</button>
                </a>
                <a href="../Libros_IVAS/consumidor_final.php?status=semanal">
                    <button type="button" class="btn btn-outline-dark mx-1">Semanal</button>
                </a>
                <a href="../Libros_IVAS/consumidor_final.php?status=mensual">
                    <button type="button" class="btn btn-outline-dark mx-1">Mensual</button>
                </a>
            </div>
            <table class='table table-hover table-striped'>
                <thead>
                    <tr>
                        <th scope='col'>ID Factura</th>
                        <th scope='col'>Fecha</th>
                        <th scope='col'>N° Factura</th>
                        <th scope='col'>Cantidad de venta</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
    while($row = mysqli_fetch_assoc($datos)) {
    ?>
                    <tr>
                        <td>
                            <?=$row["id"]?>
                        </td>
                        <td>
                            <?=$row["fecha"]?>
                        </td>
                        <td>
                            <?=$row["nFactura"]?>
                        </td>
                        <td>
                            <span class='text-success'>
                                $ <span><?=$row["Total"]?></span>
                            </span>
                        </td>
                    </tr>

                    <?php
        $total+=$row["Total"];
    }
    ?>

                </tbody>
            </table>
        </div>
        <div class='card-footer'>
            <div>Total: <span class='text-success  ml-3'>$ <?=$total?></span></div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
        </script>
    </div>
</body>

</html>

<?php
 function datosMes(){
    $inicio = date("Y-m-01");
    $fin = date("Y-m-t");
    return mostrarVentaFRF($inicio,$fin);
 }

 function datosSemana(){
    $diaSemana = date("w");
    $tiempoDeInicioDeSemana = strtotime("-" . $diaSemana . " days");
    $fechaInicioSemana = date("Y-m-d", $tiempoDeInicioDeSemana);
    $tiempoDeFinDeSemana = strtotime("+" . $diaSemana . " days", $tiempoDeInicioDeSemana);
    $fechaFinSemana = date("Y-m-d", $tiempoDeFinDeSemana);
    return mostrarVentaFRF($fechaInicioSemana,$fechaFinSemana);
 }

 function datosDiarios(){
    $hoy = date('Y-m-d');
    return mostrarVentaFRF($hoy,$hoy);
 }

?>