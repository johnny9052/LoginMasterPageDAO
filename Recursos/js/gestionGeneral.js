

function listarMunicipio(form) {

    var idDepto = document.getElementById("selDepartamento").value;

    if (idDepto !== -1) {
        document.getElementById("txtIdSelect").value = idDepto;
        document.getElementById("txtType").value = "municipio";
        form.submit();
    }

}