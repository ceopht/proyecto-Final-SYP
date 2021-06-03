function generarCampos(){

    if($("#tipo").val()==0){
        $("#campos").css("display", "none");
    }else{
        $("#campos").css("display", "block");
    }

    if($("#tipo").val()==1){
        $(".total").css("display", "block");
        $(".IVA").css("display", "none");
        $(".venta").css("display", "none");
        $(".nombre").css("display", "none");

    }else if($("#tipo").val()==2){
        $(".total").css("display", "none");
        $(".IVA").css("display", "block");
        $(".venta").css("display", "block");
        $(".nombre").css("display", "block");

    }

}

$(document).ready(function() {
    $("form").submit(function (evento) {  
        var pasar=true;
        
        $(".alert").detach();
        $('.validar').each( function (indexInArray, valueOfElement) { 
            if($(this).val() ==""){
                $( "form" ).append(`<div class="alert alert-danger m-2" role="alert">No debe dejar campos vacios</div>`);
                pasar=false;
            }
        });

        if($("#tipo").val()==1){

            $(".alert").detach();
            
            $('.validar1').each( function (indexInArray, valueOfElement) { 
                if($(this).val() ==""){
                    $(".alert").detach();
                    $( "form" ).append(`<div class="alert alert-danger m-2" role="alert">No debe dejar campos vacios</div>`);
                    pasar=false;
                }
            });

        }else if($("#tipo").val()==2){
            $(".alert").detach();

            $('.validar2').each( function (indexInArray, valueOfElement) { 
                if($(this).val() ==""){
                    $(".alert").detach();
                    $( "form" ).append(`<div class="alert alert-danger m-2" role="alert">No debe dejar campos vacios</div>`);
                    pasar=false;
                }
            });
        }

        if(!pasar){
            evento.preventDefault();
        }
    });
});