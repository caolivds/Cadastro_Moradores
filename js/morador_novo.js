var campoPlaca = document.getElementById("placa");
var checkSemVeiculo = document.getElementById("semVeiculo");
var campoTelefone = document.getElementById("telefone");




checkSemVeiculo.addEventListener("change", function () {

   
    if (checkSemVeiculo.checked) {
        campoPlaca.value = "";         
        campoPlaca.disabled = true;     
        campoPlaca.placeholder = "Morador não possui veículo";
    } else {
        campoPlaca.disabled = false;    
        campoPlaca.placeholder = "Ex: ABC1D23";
    }
});



campoPlaca.addEventListener("input", function () {

    
    campoPlaca.value = campoPlaca.value
        .toUpperCase()
        .replace(/[^A-Z0-9]/g, "");
});



campoTelefone.addEventListener("input", function () {

    
    var numeros = campoTelefone.value.replace(/\D/g, "").substring(0, 11);

   
    if (numeros.length > 6) {
        // (11) 99999-9999
        numeros = "(" + numeros.substring(0, 2) + ") " +
                  numeros.substring(2, 7) + "-" +
                  numeros.substring(7);
    } 
    
    campoTelefone.value = numeros;
});
