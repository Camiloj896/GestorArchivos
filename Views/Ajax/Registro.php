<?php

require_once "../../Model/Registro.php";
require_once "../../controllers/Registro.php";

class RegistroAjax{

    public $Nombre;
    public $Apellido;
    public $Correo;
    public $Pass;

    Public function GuardarDatosAjax(){

        $datos = array(
            "Nombre" => $this->Nombre,
            "Apellido" => $this->Apellido,
            "Correo" => $this->Correo,
            "Pass" => $this->Pass,
            "Rol" => "User",
        );

        $res = RegistroController::GuardarDatosController($datos);

        echo $res;

    }

}

if(isset($_POST["Nombre"])){
    $Registro = new RegistroAjax();
    $Registro->Nombre = $_POST["Nombre"]; 
    $Registro->Apellido = $_POST["Apellido"];
    $Registro->Correo = $_POST["Correo"];
    $Registro->Pass = $_POST["Pass"];
    $Registro->GuardarDatosAjax();
    
}