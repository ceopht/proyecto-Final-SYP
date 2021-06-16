<?php 
    $fcha = date("Y-m-d");
    include_once ('../Database/clientesCRUD.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Registro de ventas</title>
</head>
<body>
    <?php
    if(!isset($_COOKIE['session_id'])){             //Si no se tiene un token de logeo
        header('Location: ../login/login.php');
    }elseif($_SESSION['type']=="vendedor"){         //Si el usuario es un vendedor
        include_once ('../navBar/NBVendedor.php');   
    }elseif($_SESSION['type']=="admin"){                //Si el usuario es un administrador
        include_once ('../navBar/NBAdmin.php');
    }elseif($_SESSION['type']=="contador"){             //si el usuario es un contador
        header('Location: ../BalanceGeneral/balance.php');
    }else{                                          //si no tiene un rol definido
        header('Location: ../login/login.php');
    }
    ?>
    <div class="d-flex justify-content-center m-4">
        <div class="col-md-4">
        
            <?php if (isset($_SESSION['message'])) { 
                if($_SESSION['message']=="Venta registrada"){
                ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Venta registrada</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            <?php 
                }
            unset($_SESSION['message']);
            }

            ?>

            <h3 class="text-center m-4">Registro de ventas</h3>

            <form action="guardarVenta.php" method="post">

                <div>
                    <select class="form-select" aria-label="Default select example" id="tipo" name="tipo" onclick="generarCampos()">
                        <option value="0" selected>Selecione tipo de venta</option>
                        <option value="1">Consumidor final</option>
                        <option value="2">Contribuyente</option>
                    </select>
                </div>

                <div id="campos" style="display:none">

                    <div class="m-4 fecha">
                        <label class="form-label m-2">Fecha</label>
                        <input type="date" name="fecha" class="validar m-2 form-control" value="<?php echo $fcha;?>">
                    </div>

                    <div class="m-4 factura">
                        <label class="form-label m-2">Número de factura</label>
                        <input type="number" name="factura" class="validar m-2 form-control">
                    </div>

                    <div class="m-4 total">
                        <label class="form-label m-2">Total</label>
                        <input type="number" name="total" step="0.01" class="validar1 m-2 form-control">
                    </div>

                    <div class="m-4 nombre">
                        <label class="form-label m-2">Nombre del cliente</label>
                        <select class="form-select" aria-label="Default select example" id="tipo" name="idCliente">
                            <?php 
                                $datos = mostrarDatosC();
                                while($row = mysqli_fetch_assoc($datos)) {
                                    $nombre = $row['nombre'];
                                    $idCliente = $row['idCliente'];
                                    echo "<option value='$idCliente'>$nombre</option>";
                                }
                            ?>
                        </select>
                        
                    </div>

                    <div class="m-4 venta">
                        <label class="form-label m-2">Venta</label>
                        <input type="number" name="venta" step="0.01" class="validar2 m-2 form-control">
                    </div>

                    <div class="m-4 IVA">
                        <label class="form-label m-2">IVA</label>
                        <input type="number" name="IVA" step="0.01" class="validar2 m-2 form-control">
                    </div>
                    
                    <div class="text-center">
                        <input type="submit" value="Registrar venta" class="btn btn-primary">
                    </div>
                </div>
            </form>

        </div>
        
    </div>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="funcionesV.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>

