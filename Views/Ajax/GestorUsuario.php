<?php

require_once "../../Model/GestorUsuario.php";
require_once "../../controllers/GestorUsuario.php";

class GestorUsuarioAjax{
    
    // IMAGEN TEMPORAL PARA EL PERFIL
    //----------------------------------------------
    public $nombreImagenTemporal;    
    public function imagenTemporalAjax(){
        
        $datos = $this->nombreImagenTemporal;
        
        $res = GestorUsuarioController::imagenTemporal($datos);        
             
        echo $res;
    }

    // ACTUALIZAR DATOS
    //----------------------------------------------

    public $NombreN, $ApellidoN, $CorreoN, $ImagenN, $ImagenAN, $id;

    public function datosNuevosUsuario(){

        $datos = array(
            "Nombre" => $this->NombreN,
            "Apellido" => $this->ApellidoN,
            "Correo" => $this->CorreoN,
            "ImagenAn" => $this->ImagenAN,
            "id" => $this->id
        );

        $res = GestorUsuarioController::editarInfoUsuario($datos);
        
        echo $res;
        
    }

   
}

// OBJETOS
//---------------------------------------------------------------------

//IMAGEN TEMPORAL
if(isset($_FILES["imagen"]["tmp_name"])){
    $imagen = new GestorUsuarioAjax();
    $imagen->nombreImagenTemporal = $_FILES["imagen"]["tmp_name"];    
    $imagen->imagenTemporalAjax();
}

//DATOS NUEVOS 

if(isset($_POST["Nombre"])){
    $datosNuevos = new GestorUsuarioAjax();
    $datosNuevos->NombreN = $_POST["Nombre"];
    $datosNuevos->ApellidoN = $_POST["Apellido"];
    $datosNuevos->CorreoN = $_POST["Correo"];
    $datosNuevos->ImagenAN = $_POST["ImagenAntigua"];
    $datosNuevos->id = $_POST["id"];
    $datosNuevos->ImagenN = $_FILES["Imagen"]["tmp_name"];
    $datosNuevos->datosNuevosUsuario();
}

