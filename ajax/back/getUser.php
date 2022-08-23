<?php
class Usuario{
    public $correo;
    public $contra;
    
    function __construct($c,$p)
    {
        $this->correo = $c;
        $this->contra = $p;
    } 
}
if (isset($_GET['id'])) {
    echo json_encode(array('success' => 1,'usuario'=>new Usuario("alvaroku123@gmail.com","12345")));
} else {
    echo json_encode(array('success' => 0));
}