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
    </head>
    <body>


        <table border="1">
            <tr>
                <td style="width: 20%">
                    <a href="index.php">Inicio</a><br>
                    <a href="index.php?page=usuarios">Usuarios</a><br>
                    <a href="index.php?page=eventos">Eventos</a><br>
                    <a href="index.php?page=estudiantes">Estudiantes</a><br>
                </td>

                <td style="width: 80%">
                    <?php
                    if (isset($_REQUEST['page'])) {
                        include $_REQUEST['page'] . ".php";
                    } else {
                        include 'inicio.php';
                    }
                    ?>
                </td>
            </tr>
        </table>

        <form name="formularioLogOut" id="formLogOut" method="post" 
              action="Controlador/gestionLogin.php" 
              onsubmit="return logIn('desc');">
            <table>
                <tr>
                    <td>
                        <input type="text" id="txtTypeLog" name="type" style="display: none">
                    </td>
                    <td>
                        <button type="submit" value="desconectar" id="btnDesconectar">Desconectar</button>
                    </td>
                </tr>
            </table>
        </form>

    </body>
</html>
