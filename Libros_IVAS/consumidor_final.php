<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libro IVA consumidor Final</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <?php

    include_once ('../Database/VentasFinalCRUD.php');

    $diaSemana = date("w");
    $tiempoDeInicioDeSemana = strtotime("-" . $diaSemana . " days");
    $fechaInicioSemana = date("Y-m-d", $tiempoDeInicioDeSemana);
    $tiempoDeFinDeSemana = strtotime("+" . $diaSemana . " days", $tiempoDeInicioDeSemana);
    $fechaFinSemana = date("Y-m-d", $tiempoDeFinDeSemana);

    $datos = mostrarVentaFRF($fechaInicioSemana,$fechaFinSemana);
    echo "
        <div class='container-fluid'>
        <table class='table table-hover text-nowrap'>
        <thead>
            <tr>
            <p class='text-center font-weight-bold fs-3'>LIBRO DE IVA CONSUMIDOR FINAL </p>
            <p class='text-center'><span class='fs-5'>Semana del  [ {$fechaInicioSemana} - {$fechaFinSemana} ]</span></p>
            </tr>
            <tr>
                <td colspan='2'><p class='text-center'><span class='fs-4'>Nombre del contribuyente: Diego Herrera</span></p></td>
                <td><p class='text-center'><span class='fs-4'>N.C.R.:1957-0</span></p></td>
                <td><p class='text-center'><span class='fs-4'>NIT:0561-017231-111-5</span></p></td>
            </tr>
            <tr>
                <th scope='col'>ID Factura</th>
                <th scope='col'>Fecha</th>
                <th scope='col'>N° Factura</th>
                <th scope='col'>Cantidad de venta</th>
            </tr>
        </thead>
        <tbody>        
    ";
    while($row = mysqli_fetch_assoc($datos)) {
        echo"
        <tr>
            <td>
                {$row["id"]}
            </td>
            <td>
                {$row["fecha"]}
            </td>
            <td>
                {$row["nFactura"]}
            </td>
            <td>
                <span class='text-success'>
                $ <span>{$row["Total"]}</span>
                </span>
            </td>
        </tr>
        ";
    }

    echo'
            </tbody>
        </table>
    </div>
    ';

    ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>