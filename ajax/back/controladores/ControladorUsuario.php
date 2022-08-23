<?php
$modo = $_GET['modo'];
require_once("../db/conexion.php");
require_once("../business/UsuarioCrud.php");
$conexion = new Conexion();
$conexion->Conectar();

$crudUsuario = new UsuarioCrud($conexion);

switch($modo){
    case "create":
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $edad = $_POST["edad"];
        require_once("../modelos/Usuario.php");
        
        $insertado = $crudUsuario->Create(new Usuario(0,$nombre, $apellido, $edad));
        if ($insertado) {
            echo json_encode(array('success' => 1));
        } else {
            echo json_encode(array('success' => 0));
            //print_r($sql->errorInfo());
        }
        break;
    case 'read':
        echo json_encode(array('success' => 1,'usuarios'=>$crudUsuario->Read()));
        break;
    case "actualizar":
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $edad = $_POST["edad"];
        require_once("../modelos/Usuario.php");

        $actualizado = $crudUsuario->Update(new Usuario($id,$nombre, $apellido, $edad));
        if ($actualizado) {
            echo json_encode(array('success' => 1));
        } else {
            echo json_encode(array('success' => 0));
            //print_r($sql->errorInfo());
        }
        break;
    case "eliminar":
        $id = $_GET["id"];
        
        $eliminado = $crudUsuario->Delete($id);

        if ($eliminado) {
            echo json_encode(array('success' => 1));
        } else {
            echo json_encode(array('success' => 0));
            //print_r($sql->errorInfo());
        }
             
 
}