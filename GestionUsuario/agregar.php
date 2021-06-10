<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>agregar</title>
</head>
<body>
<?php
if (isset($_GET))
{
  if(isset($_GET["status"]) && $_GET["status"] == "ok")
  {
      echo'<div class= "alert alert-primary" >
       agregado con exito
       </div> ';
   }
}
?>

<form action="registro.php" method="post"  onsubmit="return validate()">

<div class="container border border-5">
<div class="text-center border border-primary bg-secondary text-white">
  <h1>ingresar Usuario</h1>
</div>
<div class="row">
   <div class="col-sm-9">
   <label for="usuario" class="form-label">usuario </label>
   <input type="usuario" class="form-control" id="email"  name = "email">
</div>
</div>

<div class="row">
<div class="col-sm-9">
    <label for="inputPassword" class="col-2 col-form-label">Password</label>
    <div class="col-10">
    <input type="password" class="form-control" id="contra" name ="password">
</div>
</div>

<div class="row">
<div class="col-sm-9">
  <label>selecione el trabajo que desempeña en la empresa</label>
  <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example " name= cargo id= "cargo" >
  <option selected>cargo</option>
  <option value="contador">contador</option>
  <option value="vendedor">vendedor</option>
  <option value="administrador">administrador</option>
  </select>
</div>
</div>
    
<div class="d-grid gap-2">
    <input type="submit" value="Registrar Usuario" class="btn btn-primary agregar">
    </div>
    </div>
    <br>
<p class="imformacion"></p>

  </form>


<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="validaciones.js"></script>

</body>
</html>