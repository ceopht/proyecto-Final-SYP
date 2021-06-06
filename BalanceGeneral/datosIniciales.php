<?php
include_once ('../Database/VentasFinalCRUD.php');
include_once ('../Database/VentasContribuyenteCRUD.php');

function valores($inicioMes,$finMes){

    $final = datosBalanceVF($inicioMes,$finMes);
    $contribuidor = datosBalanceVC($inicioMes,$finMes);

    $datos = [
    "ventasFinal" => 0,
    "ventasContribuyente" => 0,
    "ivaFinal" => 0,
    "ivaContribuidor" => 0,
    "efectivo" => 0
    ];

    while($row = mysqli_fetch_assoc($final)) {
        $datos["ventasFinal"]+=$row['Total'];
    }

    while($row = mysqli_fetch_assoc($contribuidor)) {
        $datos["ventasContribuyente"] += $row['venta'];
        $datos["ivaContribuidor"] += $row['IVA'];
    }

    $datos["ivaFinal"] = $datos["ventasFinal"]*0.13;
    $datos["efectivo"] = $datos["ventasFinal"] + $datos["ventasContribuyente"] - $datos["ivaFinal"];

    return $datos;
}

function agregarActivo($efectivo,$ivaF,$ivaC){
    echo '<div class="row mb-3">
    <div class="col-sm"><label class="form-label active">Efectivo y equivalentes</label></div>
    <div class="col-sm"><input type="text" class="form-control activeForm" value="'.$efectivo.'" readonly></div></div>';
    echo '<div class="row mb-3">
    <div class="col-sm"><label class="form-label active">IVA crédito fiscal</label></div>
    <div class="col-sm"><input type="text" class="form-control activeForm" value="'.$ivaF+$ivaC.'" readonly></div></div>';
}

function agregarPasivo($ivaF,$ivaC){
    echo '<div class="row mb-3">
    <div class="col-sm"><label class="form-label passive">IVA débito fiscal</label></div>
    <div class="col-sm"><input type="text" class="form-control passiveForm" value="'.$ivaF+$ivaC.'" readonly></div></div>';   
}

function agregarCapital($efectivo){
    echo '<div class="row mb-3">
    <div class="col-sm"><label class="form-label capi">Capital</label></div>
    <div class="col-sm"><input type="text" class="form-control capiForm" value="'.$efectivo.'" readonly></div></div>';
}

?>