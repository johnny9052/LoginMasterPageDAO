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
        <form name="formularioLogin" id="formLogIn" method="post" 
              action="Controlador/gestionLogin.php" 
              onsubmit="return logIn('con');">
            <table>
                <tr>
                    <td>
                        Usuario
                    </td>
                    <td>
                        <input type="text" id="txtUsuario" value="admin" 
                               name="nickname" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        Password
                    </td>
                    <td>
                        <input type="password" id="txtPassword" value="123" 
                               name="password" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        <button type="submit" id="btnLogin">LogIn</button>
                    </td>                    
                </tr>

                <tr>
                    <td>
                        <input type="text" id="txtTypeLog" name="type" class="oculto">
                    </td>
                </tr>
            </table>
        </form>

    </body>
</html>
