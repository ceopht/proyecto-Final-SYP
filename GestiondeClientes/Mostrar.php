<?php
include_once ('../Database/clientesCRUD.php');
?>

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
        
         <div class="row justify-content-center mt-4"  >
         <div class="col-md-6">
         <table  id ="clientes"class="table table-hover">
        <thead>
            <th> id</th>
            <th> Nombre</th>
            <th>  NRC</th>
            <th>   Acciones</th>
     
        </thead>
        <tbody>
        </div>


        <?php  

      $datos =  mostrarDatosC();
      
        while($row = mysqli_fetch_assoc($datos))

        { ?>

        <tr>
        <td><?php echo $row['idCliente'] ?></td>
        <td><?php echo $row['nombre'] ?></td>
         <td><?php echo $row['NRC'] ?></td>
         <td>
         <a href="EliminarF.php?idCliente=<?php echo $row['idCliente']?>" class="btn btn-danger">Eliminar</a> 
         <a href="Editar.php?idCliente=<?php echo $row['idCliente']?>" class="btn btn-primary">Editar</a>
        </td>     
        </tr>


       <?php }  

     
       ?>
             
      </tbody>
   </div>


<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script>
$(document).ready( function () {
    $('#clientes').DataTable();
} );
</script>

<!--<script src="Funciones.js"></script>-->
</body>
</html>