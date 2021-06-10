<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <title>Envio a Base de Datos</title>
</head>
<body>

<?php
    include_once ('../Database/clientesCRUD.php');
    
    

    insertarCliente($_POST['nombre'],$_POST['NRC']);

    $_SESSION['message'] = 'Cliente Ingresado';
    $_SESSION['message_type'] = 'success';
    //header('Location: FormularioCliente.php');

    echo '<div class= "alert alert-info" >
    Ingresado con exito
    </div> ';
?>

<a href="FormularioCliente.php" class="btn btn-outline-warning">REGRESAR</a>  
</body>
</html>