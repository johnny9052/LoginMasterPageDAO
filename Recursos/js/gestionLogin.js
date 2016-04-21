

function logIn(tipo) {

    var formulario = document.getElementById("formLogIn");
    document.getElementById("txtTypeLog").value = tipo;

    if (formulario.checkValidity()) {        
        return true;
    } else {
        return false;
    }
}