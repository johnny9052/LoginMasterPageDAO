<?php

class estudianteDAO {

    private $con;
    private $object;

    function estudianteDAO() {
        require '../Infraestructura/Conexion.php';
        $this->object = new Conexion();
        $this->con = $this->object->conectar();
    }

    public function guardar(Estudiante $obj) {

        $sql = "insert into estudiante(codigo,nombre,apellido,cedula,edad,semestre) values('" .
                $obj->getCodigo() . "','" . $obj->getNombre() . "','" . $obj->getApellido() . "','" . $obj->getCedula() . "'," .
                $obj->getEdad() . "," . $obj->getSemestre() . ");";

        //echo $sql;
        
        $resultado = $this->object->ejecutar($sql);
        $this->object->respuesta($resultado, 'estudiantes');
    }

    public function listar(Estudiante $obj) {
        $slq = "select codigo,nombre,apellido,cedula,edad,semestre from estudiante";
        $resultado = $this->object->ejecutar($slq);
        $this->construirListado($resultado);
    }

    public function construirListado($resultado) {

        if ($resultado && pg_num_rows($resultado) > 0) {
            $cadenaHTML = "<table border='1'>";
            $cadenaHTML .="<tr>";
            $cadenaHTML .="<th>Codigo</th>";
            $cadenaHTML .="<th>Nombre</th>";
            $cadenaHTML .="<th>Apellido</th>";
            $cadenaHTML .="<th>Cedula</th>";
            $cadenaHTML .="<th>Edad</th>";
            $cadenaHTML .="<th>Semestre</th>";
            $cadenaHTML .="</tr>";

            for ($cont = 0; $cont < pg_num_rows($resultado); $cont++) {
                $cadenaHTML .="<tr>";
                $cadenaHTML .="<td>" . pg_result($resultado, $cont, 0) . "</td>";
                $cadenaHTML .="<td>" . pg_result($resultado, $cont, 1) . "</td>";
                $cadenaHTML .="<td>" . pg_result($resultado, $cont, 2) . "</td>";
                $cadenaHTML .="<td>" . pg_result($resultado, $cont, 3) . "</td>";
                $cadenaHTML .="<td>" . pg_result($resultado, $cont, 4) . "</td>";
                $cadenaHTML .="<td>" . pg_result($resultado, $cont, 5) . "</td>";
                $cadenaHTML .="</tr>";
            }

            $cadenaHTML .="</table>";
        } else {
            $cadenaHTML .="<b>No hay registros en la base de datos</b>";
        }

        header('location: ../index.php?page=estudiantes&&info_list=' . $cadenaHTML);
    }

    public function buscar(Estudiante $obj) {
        $slq = "select id,codigo,nombre,apellido,cedula,edad,semestre from estudiante "
                . "WHERE codigo='" . $obj->getCodigo() . "';";
        $resultado = $this->object->ejecutar($slq);
        $this->construirBusqueda($resultado);
    }

    public function construirBusqueda($resultado) {
        $vec = pg_fetch_row($resultado);

        if (isset($vec) && $vec[0] != "") {
            $lista = "id=" . $vec[0] . "&&";
            $lista .= "codigo=" . $vec[1] . "&&";
            $lista .= "nombre=" . $vec[2] . "&&";
            $lista .= "apellido=" . $vec[3] . "&&";
            $lista .= "cedula=" . $vec[4] . "&&";
            $lista .= "edad=" . $vec[5] . "&&";
            $lista .= "semestre=" . $vec[6];
            header('location: ../index.php?page=estudiantes&&' . $lista);
        } else {
            $mensaje = "No se encontro informacion";
            header('location: ../index.php?page=estudiantes&&message=' . $mensaje);
        }
    }

    public function modificar(Estudiante $obj) {
        $sql = "update estudiante set codigo='" . $obj->getCodigo() . "'" .
                ",nombre='" . $obj->getNombre() . "', apellido='" . $obj->getApellido() . "'" .
                ",cedula='" . $obj->getCedula() . "', edad=" . $obj->getEdad() .
                ",semestre=" . $obj->getSemestre() . " where id =" . $obj->getId();
        $resultado = $this->object->ejecutar($sql);
        $this->object->respuesta($resultado, 'estudiantes');
    }

    public function eliminar(Estudiante $obj) {
        $sql = "delete from estudiante where id =" . $obj->getId();
        $resultado = $this->object->ejecutar($sql);
        $this->object->respuesta($resultado, 'estudiantes');
    }

}