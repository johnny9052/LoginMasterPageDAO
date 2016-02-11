<?php

include '../Modelo/clsLogin.php';
include '../DAO/loginDAO.php';

isset($_POST['type']) ? $accion = $_POST['type'] : $accion = "";
isset($_POST['usuario']) ? $usuario = $_POST['usuario'] : $usuario = "";
isset($_POST['password']) ? $password = $_POST['password'] : $password = "";

session_start();

$login = new clsLogin($usuario, $password);
$dao = new LoginDAO();

$mensaje = "";
echo $accion.'sada';
switch ($accion) {
    case "con":
        if ($dao->ingresar($login)) {
            $_SESSION['name_user'] = $dao->ingresar($login);
            
        } else {
            $mensaje = "El usuario no existe";
        }
        break;

    case "desc":        
        echo 'me fui';
        session_destroy();
        $mensaje = "Se ha cerrado la sesion";
        break;
}

header('location:../index.php?message_login=' . $mensaje);