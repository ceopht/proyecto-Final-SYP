<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

   <title>agregar</title>
   

   <td> 
    
     </head>
     <br>
     <br>
     
     <div class="col-md-8">
      <table  id="users"class="table table table-success table-striped p-5">
        <thead>
          <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>cargo</th>
            <th>acciones</th>
            
          </tr>
        </thead>
        <tbody>


   
        <?php  
        
        include_once ('../Database/usersCRUD.php');

       $datos =  mostrarDatosU();

        while($row = mysqli_fetch_assoc($datos))
        { ?>

        <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['user'] ?></td>
        <td><?php echo $row['type'] ?></td>
       

       <td> <a href="editar.php?id=<?php echo $row['id']?> "class="btn btn-primary" >
       <i class="fas fa-marker"></i>
       </a>
      
          <a href="eliminar.php?id=<?php echo $row['id']?> "    class="btn btn-danger">
         <i class="far fa-trash-alt"></i></a>
        </td>
        </tr>
     

       <?php } ?>

      
        
        
       
</tbody>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script>
  $(document).ready( function () 
  {
      $('#users').DataTable({
        
    "responsive": true,
    "paging": true,
    "language":{
    "lengthMenu": "mostrar _MENU_ registros por pagina ",
    "zeroRecords":"no se encontro ningun registro que coincida",
    "info": "Mostrando _TOTAL_ DE _MAX_  registros",
    "search":"Buscar Usuario",
    "paginate":{
      "previous": "Anterior",
      "next":"sigiente"

    }
    


    }
      });
  
  } );
</script>
</body>
</html>