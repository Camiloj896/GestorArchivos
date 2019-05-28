<?php

class GestorArchivosController{    

     #MOSTRAR DATOS DE LOS ARCHIVOS
    #--------------------------------->

    public function mostrarArchivosController(){

        $res = GestorArchivosModel::InfoArchivosModel("archivos");

        foreach ($res as $row => $item) {
            echo '<tr>
                    <td>'.$item["Nombre"].'</td>
                    <td class="number">'.$item["Tipo"].'</td>
                    <td>'.$item["Fecha"].'</td>
                    <td><a href="controllers/GestorArchivos.php?file='.$item["id"].'"><i class="fas fa-download download"></i></a></td>
                    <td></td>                    
                  </tr>';
        }
    
    }

     #GUARDAR ARCHIVO
    #-------------------------->

    public function cargaArchivoController(){

        if(isset($_FILES["archivoNuevo"]["name"])){            

            #Obtener Nombre y Archivo
            #--------------------------------->
            
            $nombre = $_POST["nombreArchivo"];
            $typeTMP = $_FILES["archivoNuevo"]["type"];
            $usuario = $_POST["nombreUser"];            

            #Comprobar tipo de archivo valido
            #-------------------------------------->

            switch ($typeTMP) {
                #WINRAR
                case "application/octet-stream":
                    $type = "rar";
                    break;
                #PDF
                case "application/pdf":
                    $type = "pdf";
                    break;
                #WORD
                case "application/vnd.openxmlformats-officedocument.wordprocessingml.document":
                    $type = "docx";
                    break;
                #EXCEL
                case "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet":
                    $type = "xlsx";
                    break;
                #TEXTO
                case "text/plain":
                    $type = "txt";
                    break;
                #JPEG
                case "image/jpeg":
                    $type = "jpg";
                    break;
                #PNG
                case "image/png":
                    $type = "png";
                    break;
            }     
            
            #Ruta del archivo
            #----------------------->

            $ruta = "Content_Files/".$nombre.".".$type; 

            #Verificar si el nombre esta en uso
            #-------------------------------------->

            $res = GestorArchivosModel::verificarNombreArchivo($nombre);

            if($res["Nombre"] == $nombre && $res["Tipo"] == $type){                

                echo '<script>
                        document.getElementById("NuevoArchivo").style.display = "block"
                        document.getElementById("AlertFile").style.display = "block"                        
                      </script>';               

            }else{

                #Guardar el Archivo
                #----------------------------------->                

                $archivoNuevo = move_uploaded_file($_FILES["archivoNuevo"]["tmp_name"], $ruta);

                #Obtener fecha actual
                #--------------------------->

                $fecha = date("Y-m-d H:i"); 
                
                //#Guardar información en la base
                //#---------------------------------->

                $DatosArchivo = array(
                    "Nombre" => $nombre,
                    "Tipo" => $type,
                    "Accion" => "Carga",
                    "Usuario" => $usuario,
                    "Ruta" => $ruta,
                    "Fecha" => $fecha
                );                             

                #Guardar informacion del archivo
                $infoArchivo = GestorArchivosModel::GuardarInfoArchivo($DatosArchivo, "archivos");

                #Crear registro en el historial
                $historial = GestorArchivosModel::GuardarRegistroModel($DatosArchivo, "historial");                

                if($infoArchivo && $historial){

                    echo '<script>
                            swal({
                                title: "¡OK!",
                                text: "¡El archivo se guardo correctamente!",
                                type: "success",
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false
                                },
                                function(isConfirm){
                        
                                    if (isConfirm){				
                                        window.location = "Archivos";
                                    }
                            });
                         </script>';

                }

             }         

        }

    }

    #DESCARGAR ARCHIVO
    #------------------------------------>
    
    public function descargarArchivoController($idctr,$usuario){
                               
        #Obtener los datos del archivo a descargar
        #------------------------------------------->

        require_once "./../Model/GestorArchivos.php";

        $archivo = GestorArchivosModel::InfoArchivoModel($idctr, "archivos");                        

        #Obtener fecha actual
        #--------------------------->

        $fecha = date("Y-m-d H:i");  
        
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

        #Obtener MINE para descargar el Archivo (TIPO)
        #----------------------------------->

        switch ($archivo["Tipo"]) {
            #WINRAR
            case "rar":
                $Mine = "application/x-rar-compressed";
                break;
            #PDF
            case "pdf":
                $Mine = "application/pdf";
                break;
            #WORD
            case "docx":
                $Mine = "application/msword";
                break;
            #EXCEL
            case "xlsx":
                $Mine = "application/vnd.ms-excel";
                break;
            #TEXTO
            case "txt":
                $Mine = "text/plain";
                break;
            #JPEG
            case "jpg":
                $Mine = "image/jpeg";
                break;
            #PNG
            case "png":
                $Mine = "image/png";
                break;
        }     

        #Descargar Archivo
        #----------------------------->

        $nombreArchivo = $archivo["Nombre"].".".$archivo["Tipo"];
        
        header("Content-disposition: attachment; filename=".$nombreArchivo);
        header("Content-type:".$Mine);
        readfile("./../Content_Files/".$nombreArchivo);                                    
        
    }

   

}

if (isset($_GET["file"])){
    session_start();
    if(isset($_SESSION["usuario"])){
        $UsuHistorial = $_SESSION["usuario"];
    }else{
        $UsuHistorial = "Anonimo";
    }

    $descarga = new GestorArchivosController();
    $descarga-> descargarArchivoController($_GET["file"],$UsuHistorial);
    
}

