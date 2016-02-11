<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="Recursos/js/gestionGeneral.js"></script>
    </head>
    <body>

        <form name="formularioSelect" method="post" action="Controlador/gestionGeneral.php">
            <input type="hidden" id="txtIdSelect" name="id">
            <input type="hidden" name="page" value="eventos">
            <input type="hidden" name="type" id="txtType">
        </form>


        <table>
            <tr>
                <td>
                    Departamento
                </td>
                <td>
                    <select id="selDepartamento" onchange="listarMunicipio(formularioSelect);">
                        <option id="-1">Seleccione opcion</option>
                        <?php
                        require 'Modelo/clsGeneral.php';
                        require 'DAO/generalDAO.php';
                        $depto = new clsGeneral("","");
                        $dao = new generalDAO(1);
                        $dao->listarDepartamento($depto);
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    Municipio
                </td>
                <td>
                    <select id="selMunicipio">
                        <option id="-1">Seleccione opcion</option>

                        <?php
                        if (isset($_GET['contenidoSel'])) {
                            echo $_GET['contenidoSel'];
                        }
                        ?>
                    </select>
                </td>
            </tr>      
        </table>
    </body>
</html>
