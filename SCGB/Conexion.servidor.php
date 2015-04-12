<?php

class Conexion {
 
    private $host;
    private $usuario;
    private $contrasena;
    private $nombreDb;
    private $conexion;
    private $cantidadConsultas;

    function Conexion() {
        $this->host = "127.0.0.1";
        $this->usuario = "tsigroup_proyect";
        $this->contrasena = "tuKKrWy49k4T";
        $this->nombreDb = "tsigroup_proyecto";
        $this->cantidadConsultas = 0;
    }
 
    function Host($host = "") {
        if (!empty($host)) {
            $this->host = $host;
        } else {
            return $this->host;
        }
    }
 
    function Usuario($usuario = "") {
        if (!empty($usuario)) {
            $this->usuario = $usuario;
        } else {
            return $this->usuario;
        }
    }
 
    function Contrasena($contrasena = "") {
        if (!empty($contrasena)) {
            $this->contrasena = $contrasena;
        } else {
            return $this->contrasena;
        }
    }
 
    function NombreDb($nombreDb = "") {
        if (!empty($nombreDb)) {
            $this->nombreDb = $nombreDb;
        } else {
            return $this->nombreDb;
        }
    }
 
    function NombreTabla($nombreTabla = "") {
        if (!empty($nombreTabla)) {
            $this->nombreTabla = $nombreTabla;
        } else {
            return $this->nombreTabla;
        }
    }
 
    function Conectar() {
        $this->conexion = mysql_connect("$this->host", "$this->usuario", "$this->contrasena") or die("Error al conectar");
        mysql_select_db("$this->nombreDb") or die("Error al Seleccionar la base de dato");
    }
 
    function Desconectar() {
        @mysql_close($this->conexion);
    }
 
    public function Reconectar() {
        $this->conectar();
    }
 
    function Consulta($consulta, $debug = 0) {
        $this->cantidadConsultas++;
        $val = 0;
        $mensajeerror = "<strong>Ha ocurrido un error al hacer una consulta Pongase en contacto con el administrador</strong>";
        if ($debug == $val) {
            $result = mysql_query($consulta);
            if (!$result) {
                $message = '
Problema: <strong>' . mysql_error() . " "; $message .= ' </strong>En la query:<strong> ' . $consulta . '</strong>';
                die($message);
            }
        } else {
            $result = mysql_query($consulta) or die($mensajeerror);
        }
        return $result;
    }
 
    function getNumeroDeFilas($consulta) {
        return mysql_num_rows($consulta);
    }
    function getRespuesta($consulta){
            return mysql_fetch_array($consulta);
    }
}

?>
