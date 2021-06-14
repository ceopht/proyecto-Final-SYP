
<?php
// MENSAJE DE ALERTA DE ERROR DE DATOS ERRORNEOS AL BUSCAR USUARIO
if(!empty($_GET)&& isset($_GET['status'])){
    $loginErr = '<br><br><div class="alert alert-danger">Usuario o contraseña incorrecto</div>';
}else{
    $loginErr=null;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- plantilla de login -->
    <div class="container mt-5">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card p-5 text-white" id="continerLogin">
                <h5 class="card-title text-center">Login</h5>
                <form id="formulario" action="../login/logear.php" method="post">
                    <div class="form-label-group">
                        <label>Nombre de usuario</label>
                        <input type="text" name="usuario" id="usuario" class="form-control entrada"
                            placeholder="Usuario">
                    </div>
                    <br>
                    <div class="form-label-group">
                        <label for="inputPassword">Contraseña</label>
                        <input type="password" name="contraseña" id="contraseña" class="form-control entrada"
                            placeholder="*********">
                    </div>
                    <br>
                    <button class="btn btn-outline-light" type="submit">Ingresar</button>
                    <?=$loginErr;?>
                </form>
            </div>
        </div>
    </div>
    <!-- MENSAJE MODAL DE DATOS VACION -->
    <div class="modal" tabindex="-1" role="dialog" id="modalAlerta">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Alerta!</h4>
                </div>
                <div class="modal-body" id="alerta">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="ocultarModal">Cerrar</button>
                </div>
            </div>
        </div>
    <!-- SCRIPTS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="validar_espacios.js"></script>
</body>

</html>