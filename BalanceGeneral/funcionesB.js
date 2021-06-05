let activos=0;
let pasivos=0;
let capitales=0;

let ctv=0;
let psv=0;
let cptl=0;

const activo = () => {
    let html = "<div class='row mb-3'>";
    html += '<div class="col-sm"><input type="text" class="form-control '+activos+' active" placeholder="Cuenta"></div>'
    html += '<div class="col-sm"><input type="text" class="form-control '+activos+' activeForm" placeholder="Valor" onkeyup="totalActivo()"></div></div>';
    $('#activo').append(html);
    activos++;
}

const pasivo = () => {
    let html = "<div class='row mb-3'>";
    html += '<div class="col-sm"><input type="text" class="form-control '+pasivos+' passive" placeholder="Cuenta"></div>'
    html += '<div class="col-sm"><input type="text" class="form-control '+pasivos+' passiveForm" placeholder="Valor" onkeyup="totalPasivo()"></div></div>';
    $('#pasivo').append(html);
    pasivos++;
}

const capital= () => {
    let html = "<div class='row mb-3'>";
    html += '<div class="col-sm"><input type="text" class="form-control '+capitales+' capi" placeholder="Cuenta"></div>'
    html += '<div class="col-sm"><input type="text" class="form-control '+capitales+' capiForm" onkeyup="totalCapital()" placeholder="Valor"></div></div>';
    $('#capital').append(html);
    capitales++;
}

function valores(element){
    let inputs = document.querySelectorAll(element);
    let val = [];
    inputs.forEach(element => {
        console.log(element);
    });
    for (let i = 0; i < inputs.length; i++) {
        val.push(Number(inputs[i].value));
        console.log(val[i]);   
    }
    return val;
}

const totalActivo = () => {
    let val = valores(".activeForm");
    let resultado=0;
    console.log(val);
    for (let i = 0; i < val.length; i++) {
        resultado += val[i];
        console.log(val[i]);
    }
    ctv = resultado;
    document.querySelector(".tActivo").innerHTML = resultado;
    document.querySelector(".act").innerHTML = "Total activo: "+resultado;
    asignarColores();
}

const totalPasivo = () => {
    let val = valores(".passiveForm");
    let resultado=0;
    console.log(val);
    for (let i = 0; i < val.length; i++) {
        resultado += val[i];
        console.log(val[i]);
    }
    psv=resultado;
    document.querySelector(".tPasivo").innerHTML =  resultado;
    document.querySelector(".paca").innerHTML ="Total pasivo más capital: "+ pasivoCapi();
    asignarColores();
}

const totalCapital = () => {
    let val = valores(".capiForm");
    let resultado=0;
    console.log(val);
    for (let i = 0; i < val.length; i++) {
        resultado += val[i];
        console.log(val[i]);
    }
    cptl= resultado;
    document.querySelector(".tCapital").innerHTML = resultado;
    document.querySelector(".paca").innerHTML ="Total pasivo más capital: "+ pasivoCapi();
    asignarColores();
}

const pasivoCapi = () => psv+cptl;

const asignarColores = () => {
    if(ctv==psv+cptl) {
        $('.paca').css("color","green");
        $('.act').css("color","green");
    }else{
        $('.paca').css("color","red");
        $('.act').css("color","red");
    }
}