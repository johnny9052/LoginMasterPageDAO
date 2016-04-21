function validarEstudiante(tipo) {

    var formulario = document.getElementById("formEstudiante");
    document.getElementById("txtType").value = tipo;
    
    
    if (tipo === "save") {
        if (document.getElementById("txtNombre").value !== "" &&
                document.getElementById("txtApellido").value !== "" &&
                document.getElementById("txtCodigo").value !== "" &&
                document.getElementById("txtCedula").value !== "" &&
                document.getElementById("txtEdad").value !== "" &&
                document.getElementById("txtSemestre").value !== "") {
            formulario.submit();
        } else {
            alert("Ingrese todos los datos");
        }
    }

    if (tipo === "update") {
        if (document.getElementById("txtNombre").value !== "" &&
                document.getElementById("txtApellido").value !== "" &&
                document.getElementById("txtCodigo").value !== "" &&
                document.getElementById("txtCedula").value !== "" &&
                document.getElementById("txtEdad").value !== "" &&
                document.getElementById("txtSemestre").value !== "" &&
                document.getElementById("txtId").value !== "") {
            formulario.submit();
        } else {
            alert("Por favor realice una busqueda previa o ingrese todos los datos")
        }
    }

    if (tipo === "delete") {
        if (document.getElementById("txtId").value !== "") {
            formulario.submit();
        } else {
            alert("Por favor busque el registro a eliminar");
        }
    }


    if (tipo === "search") {
        if (document.getElementById("txtCodigo").value !== "") {
            formulario.submit();
        } else {
            alert("Por favor ingrese el codigo del estudiante a buscar");
        }
    }

    if (tipo === "list") {
        formulario.submit();
    }

}