<?php

include '../Modelo/LogIn.php';
include '../DAO/logInDAO.php';

isset($_REQUEST['type']) ? $type = $_REQUEST['type'] : $type = "";
isset($_REQUEST['nickname']) ? $nickname = $_REQUEST['nickname'] : $nickname = "";
isset($_REQUEST['password']) ? $password = $_REQUEST['password'] : $password = "";

session_start();

$login = new LogIn($nickname, $password);
$dao = new LogInDAO();

$mensaje = "";

switch ($type) {
    
    case "con":
        if (!$dao->ingresar($login)) {
            $mensaje = "El usuario no existe";
            header('location:../index.php?infoLogIn=' . $mensaje);
        }else{
            header('location:../index.php');
        }
        break;
        
    case "desc":        
        session_destroy();
        $mensaje = "Se ha cerrado la sesion";
        header('location:../index.php?infoLogIn=' . $mensaje);
        break;
}


