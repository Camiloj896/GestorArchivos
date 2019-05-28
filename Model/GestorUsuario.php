<?php

require_once "Conexion.php";

class GestorUsuarioModel{

    public function mostrarInfoUsuario($id, $tabla){

        $stmt = Conexion::Conectar()->prepare("SELECT * from $tabla Where id = :id");
        $stmt->bindParam("id", $id, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

    }

    public function editarInfoUsuario($datos, $imagen, $tabla){

        $stmt = Conexion::Conectar()->prepare("UPDATE $tabla SET Nombre = :nombre, Apellido = :apellido, Correo = :correo, image = :imagen WHERE id = :id");
        $stmt->bindParam("id", $datos["id"], PDO::PARAM_STR);
        $stmt->bindParam("nombre", $datos["Nombre"], PDO::PARAM_STR);
        $stmt->bindParam("apellido", $datos["Apellido"], PDO::PARAM_STR);
        $stmt->bindParam("correo", $datos["Correo"], PDO::PARAM_STR);
        $stmt->bindParam("imagen", $imagen, PDO::PARAM_STR);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }

        $stmt->close();        
        
    }

    public function eliminarUsuario(){
        
    }

}