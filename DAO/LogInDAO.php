<?php

class LogInDAO {

    private $con;
    private $object;

    function LogInDAO() {
        require '../Infraestructura/Conexion.php';
        $this->object = new Conexion();
        $this->con = $this->object->conectar();
    }

    function ingresar(LogIn $obj) {
        $sql = "SELECT nombre,nickname,password "
                . "from usuario "
                . "where nickname='" . $obj->getNickName() . "' AND password='" . $obj->getPassword() . "'";

        $resultado = $this->object->ejecutar($sql);
        return $this->object->validarLogin($resultado);
    }

}
