<?php

class LogInDAO {

    private $con;
    private $object;

    function LogInDAO() {
        require '../Modelo/clsConexion.php';
        $this->object = new clsConexion();
        $this->con = $this->object->conectar();
    }

    function ingresar(LogIn $obj) {
        $sql = "SELECT nombre,usuario,password "
                . "from usuario "
                . "where usuario='" . $obj->getUsuario() . "' AND password='" . $obj->getPassword() . "'";

        $resultado = $this->object->ejecutar($sql);
        return $this->object->validarLogin($resultado);
    }

}
