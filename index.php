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
        <script type="text/javascript" src="Recursos/js/gestionLogin.js"></script>
        <link href="Recursos/css/estilos.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

        <?php
        session_start();


        if (isset($_REQUEST['infoLogIn'])) {
            echo $_REQUEST['infoLogIn'];
        }

        if (isset($_SESSION['nameUser'])) {
            echo 'Bienvenido ' . $_SESSION['nameUser'];
        }

        if (isset($_SESSION['nameUser'])) {
            include 'Vista/masterPage.php';
        } else {
            include 'Vista/logIn.php';
        }

        //echo md5("123");
        ?>
    </body>
</html>
