
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
   <link rel="stylesheet" href="style.css">
    <title>Ingresar Clientes</title>
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

<form action="IngresarCliente.php" method="post" onsubmit="return validate()">

<div class="container-light"> 
<div class="row  mt-5 justify-content-center">
<div class="col-lg-6 col-md-6 col-sm-6">
<div class="card shadow">
<div class="card-title text-center border-bottom">
<h2 class="p-3 p-3 mb-2 bg-info text-white">Ingresar Cliente</h2>
<div class="card-body">

   <!--<form action="IngresarCliente.php" method="post" onsubmit="return validate()">-->
        <div class="  mb-4">
   

    
        <div class="mb-3">
        <label class="form-label"  for="nombreCliente">Nombre</label>
        <input type="text" name="nombre"class="form-control" id="nombreC" class="validar1 m-2 form-control" >

        

        <label class="form-label" for="nrc">NRC</label>
        <input type="number" name="NRC" class="form-control" id="nrc" class="validar2 m-2 form-control">
        <br>
        <input type="submit" value="Ingresar Cliente" class="btn btn-info ingresar" >    
        <a href="Mostrar.php" class="btn btn-info">MostrarClientes</a>   

    
            </form>
            </div>
            </div>
            </div>
            </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>