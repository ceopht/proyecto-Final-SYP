<?php
include_once('datosIniciales.php');
$inicioMes;
$finMes;
$day;

if(isset($_SESSION['fInicial'])){
    $inicioMes = $_SESSION['fInicial'];
    $finMes = $_SESSION['fFinal'];
    $day = date("d-m-Y", strtotime($finMes));
    session_unset(); 
}else{
    $inicioMes = date("Y-m-01");
    $finMes = date("Y-m-t");
    $day=date("d-m-Y");
}

$datos = valores($inicioMes,$finMes);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Balance general</title>
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
        include_once ('../navBar/NBContador.php');
    }
?>
    <div class="d-flex justify-content-center mt-4 container-fluid">
    
        <div class="row d-flex justify-content-center">
            <h4 class="text-center">Balance general al <?=$day?></h4>
            <div class="col-4 m-4">
                <h4>Activo</h4>
                
                <div id="activo">
                    <?php agregarActivo($datos["efectivo"],$datos["ivaFinal"],$datos["ivaContribuidor"]) ?>
                </div>

                <div class='row mb-3'>
                    <div class="col-sm"><h5 class="form-label">Total activo: </h5></div>
                    <div class="col-sm"><h5 class="form-label tActivo"></h5></div>
                </div>

            </div>

            <div class="col-4 m-4">

                <h4>Pasivo</h4>

                <div id="pasivo">
                    <?php agregarPasivo($datos["ivaFinal"],$datos["ivaContribuidor"])?>
                </div>
                
                <div class='row mb-3'>
                    <div class="col-sm"><h5 class="form-label">Total pasivo: </h5></div>
                    <div class="col-sm"><h5 class="form-label tPasivo"></h5></div>
                </div>

                <h4>Capital</h4>

                <div id="capital">
                    <?php agregarCapital($datos["efectivo"])?>
                </div>

                <div class='row mb-3'>
                    <div class="col-sm"><h5 class="form-label">Total capital: </h5></div>
                    <div class="col-sm"><h5 class="form-label tCapital"></h5></div>
                </div>

            </div>

            <div class="row m-2 d-flex justify-content-center">

                <div class="col-4 m-2">
                    <div class="col-sm"><h5 class="form-label act"></h5></div>
                </div>

                <div class="col-4 m-2">
                    <div class="col-sm"><h5 class="form-label paca"></h5></div>
                </div>

            </div>
            <div class="d-flex justify-content-center">
                
                <div class="row m-2">
                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                        <input type="button" class="btn btn-outline-secondary m-2" value="Agregar cuenta de activo" onclick="activo()">
                        <input type="button" class="btn btn-outline-secondary m-2" value="Agregar cuenta de pasivo" onclick="pasivo()">
                        <input type="button" class="btn btn-outline-secondary m-2" value="Agregar cuenta de capital" onclick="capital()">
                    </div>    
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <div class="row m-2">
                    <form action="changeDate.php" method="post">
                        <div class="btn-group" role="group" aria-label="Basic outlined example">

                            <div class="m-1">
                                <label class="form-label m-2">Fecha inicial</label>
                                <input type="date" name="fInicial" class="form-control" value="<?=$inicioMes?>">
                            </div>
                            
                            <div class="m-1">
                                <label class="form-label m-2">Fecha final</label>
                                <input type="date" name="fFinal" class="form-control" value="<?=$finMes?>">
                            </div>
                            
                            <input type="submit" class="btn btn-secondary m-1 rounded" value="Generar por fecha">
                            
                        </div>
                    </form>
                
                </div>    

            </div>
            
        </div>
    
    
    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="funcionesB.js"></script>
    
</body>
</html>