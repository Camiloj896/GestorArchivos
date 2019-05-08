<?php

require_once "Conexion.php";

class IngresoModels{

    public function IngresoModel($DatosModel, $tabla){

        $stmt = Conexion::Conectar()->prepare("SELECT * FROM users WHERE Correo = :correo");        

        $stmt->bindParam("correo", $DatosModel["usuario"], PDO::PARAM_STR);        
        
        $stmt->execute();
            
        return $stmt->fetch();      
        
        $stmt -> close();
        
    }

}