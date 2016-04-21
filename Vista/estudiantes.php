<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="Recursos/js/gestionEstudiante.js"></script>        
        <title></title>
    </head>
    <body>

        <form name="formularioEstudiante" method="post" id="formEstudiante"
              action="Controlador/gestionEstudiante.php">
            <table>
                <tr>
                    <td>
                        <input type="text" id="txtId" name="id" class="oculto" 
                               value="<?php
                               isset($_REQUEST['id']) ?
                                               print $_REQUEST['id'] : print "";
                               ?>">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Codigo</label>
                    </td>
                    <td>
                        <input type="text" id="txtCodigo" name="codigo" 
                               value="<?php
                               isset($_REQUEST['codigo']) ?
                                               print $_REQUEST['codigo'] : print "";
                               ?>">
                    </td>
                </tr>


                <tr>
                    <td>
                        <label>Nombre</label>
                    </td>
                    <td>
                        <input type="text" id="txtNombre" name="nombre" 
                               value="<?php
                               isset($_REQUEST['nombre']) ?
                                               print $_REQUEST['nombre'] : print "";
                               ?>">
                    </td>

                    <td rowspan="10" class="listado">
                        <?php
                        if (isset($_REQUEST['info_list'])) {
                            echo $_REQUEST['info_list'];
                        }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Apellido</label>
                    </td>
                    <td>
                        <input type="text" id="txtApellido" name="apellido" 
                               value="<?php
                               isset($_REQUEST['apellido']) ?
                                               print $_REQUEST['apellido'] : print "";
                               ?>">
                    </td>
                </tr>


                <tr>
                    <td>
                        <label>Cedula</label>
                    </td>
                    <td>
                        <input type="text" id="txtCedula" name="cedula" 
                               value="<?php
                               isset($_REQUEST['cedula']) ?
                                               print $_REQUEST['cedula'] : print "";
                               ?>">
                    </td>
                </tr>



                <tr>
                    <td>
                        <label>Edad</label>
                    </td>
                    <td>
                        <input type="text" id="txtEdad" name="edad" 
                               value="<?php
                               isset($_REQUEST['edad']) ?
                                               print $_REQUEST['edad'] : print "";
                               ?>">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Semestre</label>
                    </td>
                    <td>
                        <input type="text" id="txtSemestre" name="semestre" 
                               value="<?php
                               isset($_REQUEST['semestre']) ?
                                               print $_REQUEST['semestre'] : print "";
                               ?>">
                    </td>
                </tr>


                <tr>
                    <td>
                        <input type="text" id="txtType" name="type" class="oculto">
                    </td>
                    <td>
                        <input type="button" value="Guardar" id="btnGuardar" 
                               onclick="validarEstudiante('save');">
                        <input type="button" value="Buscar" id="btnBuscar" 
                               onclick="validarEstudiante('search');">
                    </td>
                </tr>


                <tr>
                    <td>

                    </td>
                    <td>
                        <input type="button" value="Editar" id="btnEditar" 
                               onclick="validarEstudiante('update');">
                        <input type="button" value="Eliminar" id="btnEliminar" 
                               onclick="validarEstudiante('delete');">
                    </td>
                </tr>


                <tr>
                    <td>

                    </td>
                    <td>                     
                        <input type="button" value="Listar" id="btnListar" 
                               onclick="validarEstudiante('list');">
                    </td>
                </tr>

            </table>
        </form>

        <?php
        if (isset($_REQUEST['message'])) {
            echo $_REQUEST['message'];
        }



//        if (isset($_REQUEST['message_search'])) {
//            echo "<script type'text/javascript'>" . $_REQUEST['message_search'] . "</script>";
//        }
        ?>

    </body>
</html>
