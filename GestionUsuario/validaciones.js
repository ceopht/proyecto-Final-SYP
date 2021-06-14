$("input.agregar").on("click", function validate(){

    if ($("#email").val().length < 1  ){

       
       
         $("p.imformacion").addClass("alert alert-danger")
         $("p.imformacion").html("debe de rellenar el campo del correo")


      
         return false;

    }

    if($("#contra").val().length <1){


        $("p.imformacion").addClass("alert alert-danger")
        $("p.imformacion").html("debe de rellenar el campo de la contrasena")

        return false;
    }
    if($("#cargo").val() === 'cargo'){

        $("p.imformacion").addClass("alert alert-danger")
        $("p.imformacion").html("selecione una opcion valida") 

        return false;
    } 
    if($("#buscar").val().length < 1){

        $("p.imformacion").addClass("alert alert-danger")
        $("p.imformacion").html("selecione una opcion valida") 

        return false;
    }
    
     else {

      
        return true
     }  
   
   
  
  
   



})

