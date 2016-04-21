<?php

include '../Modelo/LogIn.php';
include '../DAO/logInDAO.php';

isset($_REQUEST['type']) ? $type = $_REQUEST['type'] : $type = "";
isset($_REQUEST['usuario']) ? $usuario = $_REQUEST['usuario'] : $usuario = "";
isset($_REQUEST['password']) ? $password = $_REQUEST['password'] : $password = "";

session_start();

$login = new LogIn($usuario, $password);
$dao = new LogInDAO();

$mensaje = "";

switch ($type) {
    
    case "con":
        if (!$dao->ingresar($login)) {
            $mensaje = "El usuario no existe";
        }
        break;
        
    case "desc":        
        session_destroy();
        $mensaje = "Se ha cerrado la sesion";
        break;
}

header('location:../index.php?infoLogIn=' . $mensaje);
