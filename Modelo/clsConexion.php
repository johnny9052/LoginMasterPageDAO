<?php

class clsConexion{
    private $usuario;
    private $password;
    private $dataBase;
    private $puerto;
    private $host;
    private $cadenaConexion;
    private $connect;
    private $consulta_ID;
    
    public function conectar(){
        $this->usuario = "postgres";
        $this->password = "admin";
        $this->dataBase ="registroAcademico";
        $this->puerto = 5432;
        $this->host = "localhost";
       
        $this->cadenaConexion = "host=$this->host port = $this->puerto dbname = $this->dataBase user = $this->usuario password = $this->password";
        
        $this->connect = pg_connect($this->cadenaConexion) or die("Error al realizar la conexion con la base de datos");
        
    }
    
    public function acceder_conexion(){
        return $this->connect;
    }
    
    function ejecutar($sql){
        if($sql ==""){
            return 0;
        }else{
            $this->consulta_ID = pg_query($this->connect, $sql);
            return $this->consulta_ID;
        }
    }
    
    
    function ejecutarValidandoUniqueANDPrimaryKey($sql) {
        if ($sql == "") {
            return 0;
        } else {
            /* Si puede enviar la consulta sin importar que encuentre llaves duplicadas */
            if (pg_send_query($this->connect, $sql)) {
                /* Ejecuta la consulta */
                $this->consulta_ID = pg_get_result($this->connect);
                /* Se tiene algun resultado sin importar que contenga errores de duplidados */
                if ($this->consulta_ID) {
                    /* Detecte un posible error */
                    $state = pg_result_error_field($this->consulta_ID, PGSQL_DIAG_SQLSTATE);
                    /* Si no se genero ningun error */
                    if ($state == 0) {
                        return $this->consulta_ID;
                    } else {
                        /* Si encontro algun error */
                        return false;
                    }
                }
            }
        }
    }
    
    function validarLogin($resultado){
        $vec = pg_fetch_row($resultado);
        
        if ($vec[0]!=""){
            return $vec[0];
        }else{
            return "";
        }
    }
    
    function  respuesta($resultado){
        if($resultado){
            $mensaje = "operacion exitosa";            
        }else{
            $mensaje = "Error en la operación";
        }
        header('location: ../index.php?page=estudiantes&&message='.$mensaje);            
    }
        
}
?>