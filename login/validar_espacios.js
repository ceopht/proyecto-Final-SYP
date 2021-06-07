$("#formulario").submit(function (evento) {  
    var pasar=true;
    $(".alert").detach();
    $('.entrada').each( function (indexInArray, valueOfElement) { 
        if($(this).val() ==""){
            $("#alerta").append(`<div class="alert alert-danger" role="alert">${$(this).attr('id')} se encuentra vacio</div>`);
            pasar=false;
        }
    });
    if(!pasar){
        $("#modalAlerta").modal("show");
        evento.preventDefault();
    }
});

$("#ocultarModal").click(function () { 
    $("#modalAlerta").modal("hide");
    
});

    