<?php

class LoginDAO {

    private $con;
    private $objCon;

    function LoginDAO() {
        require '../Modelo/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    function ingresar(clsLogin $obj) {
        $sql = "SELECT nombre,usuario,password "
                . "from usuario "
                . "where usuario='" . $obj->getUsuario() . "' AND password='" . $obj->getPassword() . "'";
        
        $resultado = $this->objCon->ejecutar($sql);
        return $this->objCon->validarLogin($resultado);
    }

}

?>
