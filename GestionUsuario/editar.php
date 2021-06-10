<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>editar</title>
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

  $_SESSION['message'] = 'usuario actualizada con éxito';
  $_SESSION['message_type'] = 'success';
  
  header('Location: buscar.php');

}


?>


<form action="editar.php?id=<?=$_GET['id']?>" method="post"  onsubmit="return validate()">
<div class="container">
<div class="mb-3">
  <label for="id" class="form-label">id </label>
  <input type="id"  class="form-control" id="id"  name = "id" value="<?=$row['id']?>" >
</div>
<div class="mb-3">
  <label for="usuario" class="form-label">usuario </label>
  <input type="usuario" class="form-control" id="usuario"  name = "usuario" value="<?=$row['user']?>">
</div>
<div class="mb-3 row">
    <label for="inputPassword" class="col-2 col-form-label">Password</label>
    <div class="col-10">
    <input type="password" class="form-control" id="contrasena" name ="contrasena"  value="<?=$row['pass']?>">
    </div>
     </div>
    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example " name= cargo id= "cargo" >
  <option selected>cargo</option>
  <option value="contador">contador</option>
  <option value="vendedor">vendedor</option>
  <option value="administrador">administrador</option>
</select>
<div class="d-grid gap-2">
<input type="submit" value="Actualizar Usuario" class="btn btn-primary actualizar">
</div>
  </div>
  
  <p class="imformacionE"></p>

  </form>
 
</body>
</html>







    







