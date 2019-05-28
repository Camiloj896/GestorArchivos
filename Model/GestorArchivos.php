<?php

require_once "Conexion.php";

class GestorArchivosModel{

    #VERIFICAR SI EL NOMBRE ESTA EN USO
    #---------------------------------------->

    public function verificarNombreArchivo($Nombre){

        $stmt = Conexion::Conectar()->prepare("SELECT Nombre, Tipo FROM archivos WHERE Nombre = :nombre");

        $stmt->bindParam("nombre", $Nombre, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

    }

    #MOSTRAR DATOS DEL ARCHIVO
    #------------------------------->
    
    public function InfoArchivoModel($id, $tabla){

        $stmt = Conexion::Conectar()->prepare("SELECT Nombre, Tipo FROM $tabla WHERE id = :id");
        
        $stmt->bindParam("id", $id, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();
        
    }

    #GUARDAR INFORMACION DEL ARCHIVO
    #--------------------------------------------->

    public function GuardarInfoArchivo($datosModel, $tabla){
        
        $stmt = Conexion::Conectar()->prepare("INSERT INTO $tabla (Nombre, Tipo, Fecha, Ruta) VALUES (:nombre, :tipo, :fecha, :ruta)");

        $stmt->bindParam("nombre", $datosModel["Nombre"], PDO::PARAM_STR);
        $stmt->bindParam("tipo", $datosModel["Tipo"], PDO::PARAM_STR);
        $stmt->bindParam("fecha", $datosModel["Fecha"], PDO::PARAM_STR);        
        $stmt->bindParam("ruta", $datosModel["Ruta"], PDO::PARAM_STR); 
        
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }

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

     #MOSTRAR LOS DATOS DE TODOS LOS ARCHIVOS
    #-------------------------------------------->
    
    public function InfoArchivosModel($tabla){

        $stmt = Conexion::Conectar()->prepare("SELECT * FROM $tabla");       
        
        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();
        
    }

}

