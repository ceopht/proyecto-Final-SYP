
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Actualizar Clientes</title>
</head>
<body>

<?php

include_once ('../Database/clientesCRUD.php');

$datos;

if(isset($_GET['idCliente'])){
    $datos = datosEspecificosC($_GET['idCliente']);
}

 $row = mysqli_fetch_assoc($datos);

if(isset($_POST['idCliente'])){
    editarCliente($_POST['nombre'],$_POST['NRC'],$_POST['idCliente']);

    $_SESSION['message'] = 'Cliente Actualizado con éxito';
    $_SESSION['message_type'] = 'success';

    header('Location: Mostrar.php');
 }
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

<div class="d-flex justify-content-center m-4">
        <div class="col-md-4">

            <h3 class="text-center m-4">Editar Clientes</h3>

            <form action="Editar.php?idCliente=<?=$_GET['idCliente']?>" method="post">

                <div id="campos">

                    <div class="m-4 nombre">
                        <label class="form-label m-2">Nombre</label>
                        <input type="text" name="nombre" class="validar m-2 form-control" value="<?=$row['nombre']?>">
                    </div>

                    <div class="m-4 NRC">
                        <label class="form-label m-2">NRC</label>
                        <input type="number" name="NRC" class="validar m-2 form-control" value="<?=$row['NRC']?>">
                    </div>

                    <div class="m-4 idCliente">
                        <label class="form-label m-2">Id Cliente</label>
                        <input type="number" name="idCliente" class="validar m-2 form-control" value="<?=$row['idCliente']?>">
                    </div>

                    
                    <div class="text-center">
                        <input type="submit" value="Actualizar Cliente" class="btn btn-primary">
                    </div>
                </div>
            </form>

        </div>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</body>
</html>