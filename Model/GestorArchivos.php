<?php

require_once "Conexion.php";

class GestorArchivosModel{

    #MOSTRAR DATOS DEL ARCHIVO
    #------------------------------->
    
    public function InfoArchivoModel($id, $tabla){

        $stmt = Conexion::Conectar()->prepare("SELECT Nombre, Tipo FROM $tabla WHERE id = :id");
        
        $stmt->bindParam("id", $id, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();
        
    }

    #Guardar el registro de los archivos que se suben/descargan
    #-------------------------------------------------------------->

    public function GuardarRegistroModel($datosModel, $tabla){

        $stmt = Conexion::Conectar()->prepare("INSERT INTO $tabla (Nombre, Tipo, Accion, Usuario, Fecha) VALUES (:nombre, :tipo, :accion, :usuario, :fecha)");
        $stmt->bindParam("nombre", $datosModel["Nombre"], PDO::PARAM_STR);
        $stmt->bindParam("tipo", $datosModel["Tipo"], PDO::PARAM_STR);
        $stmt->bindParam("accion", $datosModel["Accion"], PDO::PARAM_STR);
        $stmt->bindParam("usuario", $datosModel["Usuario"], PDO::PARAM_STR);
        $stmt->bindParam("fecha", $datosModel["Fecha"], PDO::PARAM_STR);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }

        $stmt->close();

    }

}

