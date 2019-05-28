<?php

require_once "Conexion.php";

class RegistroModel{

    Public function GuardarDatosModel($datosModel, $tabla){                
        
        $stmt = Conexion::Conectar()->prepare("INSERT INTO $tabla (Nombre, Apellido, Correo, Pass, Rol, image) VALUES (:nombre, :apellido, :correo, :pass, :rol, :image)");   

        $stmt->bindParam("nombre", $datosModel["Nombre"], PDO::PARAM_STR);
        $stmt->bindParam("apellido", $datosModel["Apellido"], PDO::PARAM_STR);
        $stmt->bindParam("correo", $datosModel["Correo"], PDO::PARAM_STR);
        $stmt->bindParam("pass", $datosModel["Pass"], PDO::PARAM_STR);        
        $stmt->bindParam("rol", $datosModel["Rol"], PDO::PARAM_STR);        
        $stmt->bindParam("image", $datosModel["Image"], PDO::PARAM_STR);    

        if ($stmt->execute()){
            return true;
        }else{
            return false;
        }

        $stmt->close();
        
    }

}