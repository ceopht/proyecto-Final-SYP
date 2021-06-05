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

    <div class="d-flex justify-content-center mt-4 container-fluid">
    
        <div class="row d-flex justify-content-center">
                <h4 class="text-center">Balance general</h4>
            <div class="col-4 m-4">
                <h4>Activo</h4>
                
                <div id="activo">
                
                </div>

                <div class='row mb-3'>
                    <div class="col-sm"><h5 class="form-label">Total activo: </h5></div>
                    <div class="col-sm"><h5 class="form-label tActivo"></h5></div>
                </div>

            </div>

            <div class="col-4 m-4">

                <h4>Pasivo</43>

                <div id="pasivo">
                
                </div>
                
                <div class='row mb-3'>
                    <div class="col-sm"><h5 class="form-label">Total pasivo: </h5></div>
                    <div class="col-sm"><h5 class="form-label tPasivo"></h5></div>
                </div>

                <h4>Capital</h4>

                <div id="capital">
                
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
            
        </div>
    
    
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="funcionesB.js"></script>
    
</body>
</html>