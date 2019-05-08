<?php


class GestorArchivosController{
    
    public function descargarArchivoController($idctr){

        #Validar si el usuario esta logeado 
        #------------------------------------>       

        if($_SESSION["validar"]){

            $usuario = $_SESSION["usuario"];

        }else{

            $usuario = "Anonimo";

        }      
                     
        #Obtener los datos del archivo a descargar
        #------------------------------------------->

        $archivo = GestorArchivosModel::InfoArchivoModel($idctr, "archivos");                

        #Obtener fecha actual
        #--------------------------->

        $fecha = date("Y-m-d H:i");  

        #buscar archivo en el servidor por el nombre
        #---------------------------------------------->

        // FALTA CREAR FUNCION DEL FTP DESCARGA

        #Guardar Registro de Descarga
        #-------------------------------->

        $datosRegistro = array(
            "Nombre" => $archivo["Nombre"],
            "Tipo" => $archivo["Tipo"],
            "Accion" => "Descarga",
            "Usuario" => $usuario,
            "Fecha" => $fecha
        );

        $registro = GestorArchivosModel::GuardarRegistroModel($datosRegistro, "historial");             

        #retornar respuesta                  

        
    }

}

