<?php

require_once "../../Controller/GestorArchivos.php";
require_once "../../Model/GestorArchivos.php";

class GestorArchivosAjax{

    public $id;

    public function descargarArchivoAjax(){

        $res = GestorArchivosController::descargarArchivoController($this->id);
        
    }

}

if(isset($_POST["id"])){

    $descarga = new GestorArchivosAjax();
    $descarga->id = $_POST["id"];
    $descarga->descargarArchivoAjax();

}
