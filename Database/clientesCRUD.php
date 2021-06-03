<?php 
include_once ("connection.php");



function mostrarDatosC(){
    try {
        //Conección y ejecución del query
        $sql = "SELECT * FROM clientes";
        $con=connect();
        $resultado=mysqli_query($con,$sql);
        $con=null;
        return $resultado;
    } catch (Exception $e) {
        die(e->getMessage());
    }
    
}

function insertarCliente($nombre,$NRC){
    try {
        $con=connect();
        $sql = "INSERT INTO clientes(nombre,NRC) VALUES('$nombre','$NRC')";
        $resultado=mysqli_query($con,$sql);
        $con=null;
    } catch (Exception $e) {
        die(e->getMessage());
    }
     
}

function editarCliente($nombre,$NRC,$id){
    try {
        $con=connect();
        $sql = "UPDATE clientes SET nombre='$nombre', NRC='$NRC' WHERE idCliente='$id'";
        $resultado=mysqli_query($con,$sql);
        $con=null;
    } catch (Exception $e) {
        die(e->getMessage());
    }
}

function borrarCliente($id){
    try {
        $con=connect();
        $sql = "DELETE FROM clientes WHERE idCliente='$id'";
        $resultado=mysqli_query($con,$sql);
        $con=null;
    } catch (Exception $e) {
        die(e->getMessage());
    }
}

function buscarCliente($valor,$opcion){
    /*Se podra buscar el dato deseado
    Las opciones son:
    idCliente, nombre, NRC
    */
    try {
        //Conección y ejecución del query
        $sql = "SELECT * FROM clientes WHERE $opcion='$valor'";
        $con=connect();
        $resultado=mysqli_query($con,$sql);
        $con=null;
        return $resultado;
    } catch (Exception $e) {
        die(e->getMessage());
    }
}
    
?>