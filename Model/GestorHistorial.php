<?php

require_once "Conexion.php";

Class GestorHistorialModel{

    public function MostrarInfoHistorial($tabla){

        $stmt = Conexion::Conectar()->prepare("SELECT * FROM $tabla");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

    }

}