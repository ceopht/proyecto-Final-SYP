<?php
    include_once ("../Database/usersCRUD.php");
    $user = $_POST['usuario'];
    $pass = $_POST['contraseña'];

    $datos=buscarUsuario($user,"user");
    $comparar = mysqli_fetch_assoc($datos);

    if(password_verify($pass,$comparar['pass'])){
        setcookie('session_id','562tfydwhsbdj2iqdwkn',time()+3600,'/');
        $buscar_usu=buscarUsuario($user,"user");
        $datos_usu = mysqli_fetch_assoc($buscar_usu);
        $_SESSION['id'] = $datos_usu['id'];
        $_SESSION['user'] = $datos_usu['user'];
        $_SESSION['type'] = $datos_usu['type'];
    }
    else{
        header('Location: ../login/login.php?status=error');
    } 

?>