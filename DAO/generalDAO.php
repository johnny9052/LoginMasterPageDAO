<?php

class generalDAO {

    private $con;
    private $objCon;

    function generalDAO($tipo) {

        if ($tipo == 1) {
            require 'Modelo/clsConexion.php';
        } else {
            require '../Modelo/clsConexion.php';
        }

        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function listarDepartamento(clsGeneral $obj) {
        $slq = "select id,nombre from departamento";
        $resultado = $this->objCon->ejecutar($slq);
        $this->construirOptionsSelectDirecto($resultado);
    }

    public function listarMunicipio(clsGeneral $obj) {
        $slq = "select id,nombre from municipio where id_depto=" . $obj->getId();
        $resultado = $this->objCon->ejecutar($slq);
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

?>