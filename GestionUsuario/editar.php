<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Editar</title>
</head>
<body>




<?php  

include_once ('../Database/usersCRUD.php');

$datos;

if(isset($_GET['id']))
{

    $datos = datosEspecificosU($_GET['id']);
}


$row = mysqli_fetch_assoc($datos);


if(isset($_POST['id']))
{
 
editarUsuario($_POST['usuario'], $_POST['cargo'],$_POST['contrasena'] ,$_POST['id']);

  $_SESSION['message'] = 'Usuario actualizada con éxito';
  $_SESSION['message_type'] = 'success';
  
  header('Location: buscar.php');

}
?>

<?php
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


<form action="editar.php?id=<?=$_GET['id']?>" method="post" class="mt-4"  onsubmit="return validate()">
<div class="container">
<div class="mb-3">
  <label for="id" class="form-label">Id </label>
  <input type="id"  class="form-control" id="id"  name = "id" value="<?=$row['id']?>" readonly>
</div>
<div class="mb-3">
  <label for="usuario" class="form-label">Usuario </label>
  <input type="usuario" class="form-control" id="usuario"  name = "usuario" value="<?=$row['user']?>">
</div>
<div class="mb-3 row">
    <label for="inputPassword" class="col-2 col-form-label">Password</label>
    <div class="col-10">
    <input type="password" class="form-control" id="contrasena" name ="contrasena"  value="<?=$row['pass']?>">
    </div>
     </div>
    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example " name= cargo id= "cargo" >
  <option selected>Cargo</option>
  <option value="contador">Contador</option>
  <option value="vendedor">Vendedor</option>
  <option value="admin">Administrador</option>
</select>
<div class="d-grid gap-2">
<input type="submit" value="Actualizar Usuario" class="btn btn-primary actualizar">
</div>
  </div>
  
  <p class="imformacionE"></p>

  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>







    







