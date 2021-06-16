<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Agregar</title>
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

  <form action="registro.php" method="post"  class="mt-4" onsubmit="return validate()">

    <div class="container p-4 d-flex justify-content-center">
      <div class="d-flex flex-column">
        <div class="text-center border border-primary bg-secondary text-white">
          <h3>Ingresar Usuario</h3>
        </div>
        <div class="row">
          <div class="col">
            <label for="usuario" class="form-label">Usuario </label>
            <input type="usuario" class="form-control" id="email"  name = "email">
          </div>
        </div>

        <div class="row">
          <div class="col">
              <label for="inputPassword" class="col-2 col-form-label">Password</label>
              <div class="col">
              <input type="password" class="form-control" id="contra" name ="password">
          </div>
        </div>

        <div class="row">
          <div class="col">
            <label class="form-label my-2">Selecione el trabajo que desempeña en la empresa</label>
            <select class="form-control my-2" aria-label=".form-select-lg example " name= cargo id= "cargo" >
            <option value="vendedor" selected>Cargo</option>
            <option value="contador">Contador</option>
            <option value="vendedor">Vendedor</option>
            <option value="admin">Administrador</option>
            </select>
          </div>
        </div>
            
        <div class="d-grid gap-2">
            <input type="submit" value="Registrar Usuario" class="btn btn-primary agregar">
        </div>
      </div>
    </div>
    <br>
    <p class="imformacion"></p>

  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="validaciones.js"></script>

</body>
</html>