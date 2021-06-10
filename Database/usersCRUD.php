<?php 
include_once ("connection.php");



function mostrarDatosU(){
    try {
        //Conección y ejecución del query
        $sql = "SELECT * FROM users";
        $con=connect();
        $resultado=mysqli_query($con,$sql);
        $con=null;
        return $resultado;
    } catch (Exception $e) {
        die(e->getMessage());
    }
    
}

function insertarUsuario($usuario,$tipo,$contrasena){
    try {
        $con=connect();
        $sql = "INSERT INTO users(user,type,pass) VALUES('$usuario','$tipo','$contrasena')";
        $resultado=mysqli_query($con,$sql);
        $con=null;
    } catch (Exception $e) {
        die(e->getMessage());
    }
     
}

function editarUsuario($usuario,$tipo,$contrasena,$id){
    try {
        $con=connect();
        $sql = "UPDATE users SET user='$usuario', type='$tipo', pass='$contrasena' WHERE id='$id'";
        $resultado=mysqli_query($con,$sql);
        $con=null;
    } catch (Exception $e) {
        die(e->getMessage());
    }
}

function borrarUsuario($id){
    try {
        $con=connect();
        $sql = "DELETE FROM users WHERE id='$id'";
        $resultado=mysqli_query($con,$sql);
        $con=null;
    } catch (Exception $e) {
        die(e->getMessage());
    }
}

function buscarUsuario($valor,$opcion){
    /*Se podra buscar el dato deseado
    Las opciones son:
    user, type, id, pass
    */
    try {
        //Conección y ejecución del query
        $sql = "SELECT * FROM users WHERE $opcion='$valor'";
        $con=connect();
        $resultado=mysqli_query($con,$sql);
        $con=null;
        return $resultado;
    } catch (Exception $e) {
        die(e->getMessage());
    }
}

function datosEspecificosU($id){
    try {
        //Conección y ejecución del query
        $sql = "SELECT * FROM users WHERE id ='$id'";
        $con=connect();
        $resultado=mysqli_query($con,$sql);
        $con=null;
        return $resultado;
    } catch (Exception $e) {
        die(e->getMessage());
    }

}
    
?>