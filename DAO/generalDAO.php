<?php

class generalDAO {

    private $con;
    private $object;

    function generalDAO($tipo) {

        if ($tipo == 1) {
            require 'Infraestructura/Conexion.php';
        } else {
            require '../Infraestructura/Conexion.php';
        }

        $this->object = new Conexion();
        $this->con = $this->object->conectar();
    }

    public function listarDepartamento(General $obj) {
        $slq = "select id,nombre from departamento";
        $resultado = $this->object->ejecutar($slq);
        $this->construirOptionsSelectDirecto($resultado);
    }

    public function listarMunicipio(General $obj) {
        $slq = "select id,nombre from municipio where id_depto=" . $obj->getId();
        $resultado = $this->object->ejecutar($slq);
        $this->construirOptionsSelect($resultado, $obj->getPage());
    }

    public function construirOptionsSelectDirecto($resultado) {
        $cadenaHTML = "";
        if ($resultado && pg_num_rows($resultado) > 0) {
            for ($cont = 0; $cont < pg_num_rows($resultado); $cont++) {

                $cadenaHTML .="<option value='" . pg_result($resultado, $cont, 0) . "'>";
                $cadenaHTML .=pg_result($resultado, $cont, 1);
                $cadenaHTML .="</option>";
            }
        } else {
            $cadenaHTML .="<b>No hay registros en la base de datos</b>";
        }

        echo $cadenaHTML;
    }

    public function construirOptionsSelect($resultado, $page) {
        $cadenaHTML = "";
        if ($resultado && pg_num_rows($resultado) > 0) {
            for ($cont = 0; $cont < pg_num_rows($resultado); $cont++) {
                $variable = ($cont == 0) ? "selected='selected'" : "";
                $cadenaHTML .="<option " . $variable . " value='" . pg_result($resultado, $cont, 0) . "'>";
                $cadenaHTML .=pg_result($resultado, $cont, 1);
                $cadenaHTML .="</option>";
            }
        } else {
            $cadenaHTML .="<b>No hay registros en la base de datos</b>";
        }
        header('location: ../index.php?page=' . $page . '&&contenidoSel=' . $cadenaHTML);
    }

}
