<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@200&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2? family = Stint + Ultra + Condensed & display = swap"
    rel="hoja de estilo">
  <link rel="stylesheet" href="style.css">
  <title>Gestion de Clientes</title>
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


  <div class="card-title text-center border-bottom"
    style="display: inline-block; margin-left: 5px ; margin-top:100px; margin-left:350px ">
    <h2 class="texto">GESTION DE CLIENTES</h2>
  </div>



  <div class="container-fluid" style=" width: 500px;  height: 500px; position: absolute;  right: 200px; top: 150px; ">
    <a href="FormularioCliente.php" class="btn btn-outline-warning">ADMINISTRAR CLIENTES</a>
    <img src="img2.png" alt="" sizes="" srcset=""
      style="width: 300px;  height: 300px; position: absolute;  top: 60px; right: 50%; ">
  </div>




  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
    integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
  </script>
  <script type="text/javascript" src="jquery.min.js"></script>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
  integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
  integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<script type="text/javascript" src="jquery.min.js"></script>

</html>