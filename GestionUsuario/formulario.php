<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <title>Usuarios</title>
</head>
<body>
<?php
  session_start();
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
?>
<div class="container-fluid text-center">
<h2 class="nombre"> Gestion De Usuarios</h2>
</div>

<div class="card insertar" style="width: 18rem;">
<h5 class="card-title text-center agg border border-primary ">AGREGAR USUARIOS</h5>
  <img src="agregar.png" class="card-img-top" alt="...">
  <div class="card-body">
  <a href="agregar.php" class="btn btn-primary">AGREGAR</a>
  </div>
</div>




<div class="card buscar" style="width: 18rem;">
<h5 class="card-title text-center mostrar border border-primary"> MOSTRAR USUARIOS </h5>
  <img src="buscar.png" class="card-img-top" alt="...">
  <div class="card-body">
   <a href="buscar.php" class="btn btn-primary"> MOSTRAR</a>
  </div>
</div>







 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>