<?php
class Persona{
    public $name;
    public $age;

    function __construct($name,$age){
        $this->name = $name;
        $this->age = $age;
    }
    public function Talk(){
        echo "Hello\n";
    }
}
class Ingeniero extends Persona{
    function __construct($name,$age){
        parent::__construct($name,$age);
    }
    public function Talk()
    {
        echo "Hello i'am an engineer\n";
    }
}
$p = new Persona("Alvaro",21);
$p->Talk();
print_r($p);
$ing = new Ingeniero("Alvaro",21);
$ing->Talk();
print_r($ing);
?>