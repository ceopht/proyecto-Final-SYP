$("input.ingresar").on("click", function validate(){

    if ($("#id").val().length < 1  ){

       
       
         $("p.imformacion").addClass("alert alert-danger")
         $("p.imformacion").html("Debe  rellenar el campo del ID")


      
         return false;

    }

    if($("#nombre").val().length <1){


        $("p.imformacion").addClass("alert alert-danger")
        $("p.imformacion").html("Debe  rellenar el campo del nombre")

        return false;
    }
    if($("#nrc").val().length <1){

        $("p.imformacion").addClass("alert alert-danger")
        $("p.imformacion").html("Debe escribir un NRC") 

        return false;
    } 
   
    
     else {

      
        return true
     }  
   
   
  
  
   



})