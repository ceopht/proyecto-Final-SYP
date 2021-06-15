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

insertarUsuario($_POST['email'],$_POST['cargo'],password_hash($_POST['password'],PASSWORD_DEFAULT));

    $_SESSION['message'] = 'usuario registrada';
    $_SESSION['message_type'] = 'success';

    echo '<div class= "alert alert-primary" >
      agregado con exito
      </div> ';

  //header('Location: agregar.php');



  // $datos = mostrarDatosU();

//while($row = mysqli_fetch_assoc($datos))
 //{
   // echo "<pre>";
  // print_r($row);
  ///  echo "</pre>";
//}
?>
<a href="formulario.php" class="btn btn-primary">REGRESAR</a>
  
</body>
</html>



