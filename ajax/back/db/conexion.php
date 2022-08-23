<?php
class Conexion{
    private $contraseña = "2305";
    private $usuario = "sa";
    private $nombreBaseDeDatos = "registro";
    # Puede ser 127.0.0.1 o el nombre de tu equipo; o la IP de un servidor remoto
    private $rutaServidor = "127.0.0.1";
    
    public $conn;
    function Conectar() {
        try {
            $this->conn = new PDO("sqlsrv:server=$this->rutaServidor;database=$this->nombreBaseDeDatos", $this->usuario, $this->contraseña);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo "Ocurrió un error con la base de datos: " . $e->getMessage();
            die();
        }
    }
}