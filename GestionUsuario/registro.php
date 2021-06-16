<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <title>Document</title>
</head>
<body>
<?php

include_once ('../Database/usersCRUD.php');

    if(!isset($_COOKIE['session_id'])){             //Si no se tiene un token de logeo
      header('Location: ../login/login.php');
    }
    if($_SESSION['type']=="vendedor"){         //Si el usuario es un vendedor
      header('Location: ../Ventas/ventas.php');  
    }if($_SESSION['type']=="admin"){                //Si el usuario es un administrador
      include_once ('../navBar/NBAdmin.php');
    }if($_SESSION['type']=="contador"){             //si el usuario es un contador
      header('Location: ../BalanceGeneral/balance.php');
    }

insertarUsuario($_POST['email'],$_POST['cargo'],password_hash($_POST['password'],PASSWORD_DEFAULT));

    $_SESSION['message'] = 'Usuario registrado';
    $_SESSION['message_type'] = 'success';

    echo '<div class= "alert alert-primary" >
      agregado con exito
      </div> ';
?>
<a href="formulario.php" class="btn btn-primary">REGRESAR</a>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>



