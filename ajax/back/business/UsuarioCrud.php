<?php
class UsuarioCrud
{
    private $db;

    function __construct(Conexion $db)
    {
        $this->db = $db;
    }

    function Create(Usuario $user)
    {
        $sql = "insert into users(first_name,last_name,edad)values(:nombre,:apellido,:edad)";
        $sql = $this->db->conn->prepare($sql);
    
        $sql->bindValue(':nombre', $user->nombre, PDO::PARAM_STR);
        $sql->bindValue(':apellido', $user->apellido, PDO::PARAM_STR);
        $sql->bindValue(':edad', $user->edad, PDO::PARAM_INT);

        $sql->execute();

        $lastInsertId = $this->db->conn->lastInsertId();
        return $lastInsertId > 0;
    }
    function Read()
    {
        $sql = 'SELECT* FROM users';
        $res = [];
        $datosLeidos = $this->db->conn->query($sql);
        foreach ($datosLeidos as $row) {
            require_once("../modelos/Usuario.php");
            $u = new Usuario($row["id"],$row["first_name"],$row["last_name"],$row["edad"]);
            $res[] = $u;
        }
        return $res;
    }
    function Update($us){
        $sql = "update users set first_name = :nombre ,last_name = :apellido ,edad = :edad where id = :idUs";
        $sql = $this->db->conn->prepare($sql);

        $sql->bindValue(':idUs', $us->id, PDO::PARAM_INT);
        $sql->bindValue(':nombre', $us->nombre, PDO::PARAM_STR);
        $sql->bindValue(':apellido', $us->apellido, PDO::PARAM_STR);
        $sql->bindValue(':edad', $us->edad, PDO::PARAM_INT);

        return $sql->execute();
    }
    function Delete($id){
        $sql = "delete from users where id = :id";
        $sql = $this->db->conn->prepare($sql);

        $sql->bindValue(':id', $id, PDO::PARAM_INT);

        return $sql->execute();
    }
    function Get($id){
        $sql = "select*from users where id = :id";
        $sql = $this->db->conn->prepare($sql);

        $sql->bindValue(':id', $id, PDO::PARAM_INT);

        $sql->execute();

        $datos = $sql->fetchAll();
        
        if(sizeof($datos) == 0){
            return 0;
        }else{
            require_once("./modelos/Usuario.php");
            return new Usuario($datos[0]["id"],$datos[0]["first_name"],$datos[0]["last_name"],$datos[0]["edad"]);
        }
    }
}
