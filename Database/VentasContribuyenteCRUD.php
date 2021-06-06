<?php 
include_once ("connection.php");



function mostrarDatosVC(){
    try {
        //Conección y ejecución del query
        $sql = "SELECT * FROM ventascontribuyente INNER JOIN clientes ON ventascontribuyente.idCliente=clientes.idCliente";
        $con=connect();
        $resultado=mysqli_query($con,$sql);
        $con=null;
        return $resultado;
    } catch (Exception $e) {
        die(e->getMessage());
    }
    
}

function datosBalanceVC($fInicial,$fFinal){
    try {
        //Conección y ejecución del query
        $sql = "SELECT venta,IVA FROM ventascontribuyente WHERE fecha BETWEEN '$fInicial' AND '$fFinal'";
        $con=connect();
        $resultado=mysqli_query($con,$sql);
        $con=null;
        return $resultado;
    } catch (Exception $e) {
        die(e->getMessage());
    }
}

function mostrarVentaCRF($fInicial,$fFinal){                    //Mostrar datos por rango de fechas
    try {
        //Conección y ejecución del query
        $sql = "SELECT * FROM ventascontribuyente INNER JOIN clientes ON ventascontribuyente.idCliente=clientes.idCliente WHERE ventascontribuyente.fecha BETWEEN '$fInicial' AND '$fFinal'";
        $con=connect();
        $resultado=mysqli_query($con,$sql);
        $con=null;
        return $resultado;
    } catch (Exception $e) {
        die(e->getMessage());
    }

}
function insertarVentaC($fecha,$nFactura,$idCliente,$venta,$IVA){
    //Formato de fecha AAAA-MM-DD
    try {
        $con=connect();
        $sql = "INSERT INTO ventascontribuyente(fecha,nFactura,idCliente,venta,IVA) VALUES('$fecha','$nFactura','$idCliente','$venta','$IVA')";
        $resultado=mysqli_query($con,$sql);
        $con=null;
    } catch (Exception $e) {
        die(e->getMessage());
    }
     
}

function editarVentaC($fecha,$nFactura,$idCliente,$venta,$IVA,$id){
    try {
        $con=connect();
        $sql = "UPDATE ventascontribuyente SET fecha='$fecha', nFactura='$nFactura',idCliente='$idCliente', venta='$venta', IVA='$IVA' WHERE id='$id'";
        $resultado=mysqli_query($con,$sql);
        $con=null;
    } catch (Exception $e) {
        die(e->getMessage());
    }
}

function borrarVentaC($id){
    try {
        $con=connect();
        $sql = "DELETE FROM ventascontribuyente WHERE id='$id'";
        $resultado=mysqli_query($con,$sql);
        $con=null;
    } catch (Exception $e) {
        die(e->getMessage());
    }
}

function buscarVentaC($valor,$opcion){
    /*Se podra buscar el dato deseado
    Las opciones son:
    id, fecha, nFactura, Total
    */
    try {
        //Conección y ejecución del query
        $sql = "SELECT * FROM ventascontribuyente INNER JOIN clientes ON ventascontribuyente.idCliente=clientes.idCliente WHERE ventascontribuyente.$opcion='$valor'";
        $con=connect();
        $resultado=mysqli_query($con,$sql);
        $con=null;
        return $resultado;
    } catch (Exception $e) {
        die(e->getMessage());
    }
}
    
?>