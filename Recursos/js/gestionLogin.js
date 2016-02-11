
function validarLogin(formulario, tipo) {
    document.getElementById("txtTypeLog").value = tipo;

    if (tipo === "con") {
        if (document.getElementById("txtUsuario").value !== "" &&
                document.getElementById("txtPassword").value !== "") {
            formulario.submit();
        } else {
            alert("Ingrese datos");
        }
    }

    if (tipo === "desc") {
        formulario.submit();
    }
}