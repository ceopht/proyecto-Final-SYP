$('document').ready(function(){
    generarCampos();
})

var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
})


function generarCampos(){

    if($("#tipo").val()=="fecha"){
        $("#fecha").css("display", "block");
        $("#valor").css("display", "none");
        $("#cliente").css("display", "none");

    }else if($("#tipo").val()=="idCliente"){
        $("#fecha").css("display", "none");
        $("#valor").css("display", "none");
        $("#cliente").css("display", "block");

    }else{
        $("#fecha").css("display", "none");
        $("#valor").css("display", "block");
        $("#cliente").css("display", "none");
    }

}