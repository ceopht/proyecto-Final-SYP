<?php
    include_once ("../Database/usersCRUD.php");//CONEXCION CON EL CRUD
    $user = $_POST['usuario'];      //Variable que almacena el nombre de usuario del formulario
    $pass = $_POST['contraseña'];   //Variable que almacena la contraseña del formulario

    $datos=buscarUsuario($user,"user"); //Busqueda de los datos mediante el nombre de susuario
    $comparar = mysqli_fetch_assoc($datos);//extraccion de los datos

    if(password_verify($pass,$comparar['pass'])){   //Verificacion de contraseña
        setcookie('session_id','562tfydwhsbdj2iqdwkn',time()+7200,'/'); //Creacion de la cookie
        //busqueda y seteo de los datos del usuario ya verificado
        $buscar_usu=buscarUsuario($user,"user");
        $datos_usu = mysqli_fetch_assoc($buscar_usu);

        // seteo de sus valores en la session
        $_SESSION['id'] = $datos_usu['id'];
        $_SESSION['user'] = $datos_usu['user'];
        $_SESSION['type'] = $datos_usu['type'];
    }
    else{   //Si el usuario no coincide con la contraseña o no existe
        header('Location: ../login/login.php?status=error');
    } 

?>
