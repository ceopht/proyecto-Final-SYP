<?php 
include_once ("connection.php");



function mostrarDatosVF(){
    try {
        //Conección y ejecución del query
        $sql = "SELECT * FROM ventasfinal";
        $con=connect();
        $resultado=mysqli_query($con,$sql);
        $con=null;
        return $resultado;
    } catch (Exception $e) {
        die(e->getMessage());
    }
    
}

function datosBalanceVF($fInicial,$fFinal){
    try {
        //Conección y ejecución del query
        $sql = "SELECT Total FROM ventasfinal WHERE fecha BETWEEN '$fInicial' AND '$fFinal'";
        $con=connect();
        $resultado=mysqli_query($con,$sql);
        $con=null;
        return $resultado;
    } catch (Exception $e) {
        die(e->getMessage());
    }
}

function mostrarVentaFRF($fInicial,$fFinal){                    //Mostrar datos por rango de fechas
    try {
        //Conección y ejecución del query
        $sql = "SELECT * FROM ventasfinal WHERE fecha BETWEEN '$fInicial' AND '$fFinal'";
        $con=connect();
        $resultado=mysqli_query($con,$sql);
        $con=null;
        return $resultado;
    } catch (Exception $e) {
        die(e->getMessage());
    }

}
function insertarVentaF($fecha,$nFactura,$Total){
    //Formato de fecha AAAA-MM-DD
    try {
        $con=connect();
        $sql = "INSERT INTO ventasfinal(fecha,nFactura,Total) VALUES('$fecha','$nFactura','$Total')";
        $resultado=mysqli_query($con,$sql);
        $con=null;
    } catch (Exception $e) {
        die(e->getMessage());
    }
     
}

function editarVentaF($fecha,$nFactura,$Total,$id){
    try {
        $con=connect();
        $sql = "UPDATE ventasfinal SET fecha='$fecha', nFactura='$nFactura', Total='$Total' WHERE id='$id'";
        $resultado=mysqli_query($con,$sql);
        $con=null;
    } catch (Exception $e) {
        die(e->getMessage());
    }
}

function borrarVentaF($id){
    try {
        $con=connect();
        $sql = "DELETE FROM ventasfinal WHERE id='$id'";
        $resultado=mysqli_query($con,$sql);
        $con=null;
    } catch (Exception $e) {
        die(e->getMessage());
    }
}

function buscarVentaF($valor,$opcion){
    /*Se podra buscar el dato deseado
    Las opciones son:
    id, fecha, nFactura, Total
    */
    try {
        //Conección y ejecución del query
        $sql = "SELECT * FROM ventasfinal WHERE $opcion='$valor'";
        $con=connect();
        $resultado=mysqli_query($con,$sql);
        $con=null;
        return $resultado;
    } catch (Exception $e) {
        die(e->getMessage());
    }
}
    
?>
