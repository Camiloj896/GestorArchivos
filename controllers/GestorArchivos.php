<?php

class GestorArchivosController{    

     #MOSTRAR DATOS DE LOS ARCHIVOS
    #--------------------------------->

    public function mostrarArchivosController(){
        
        echo '
            <tr>
            <td>Sony Xperia M4</td>
            <td class="number">$149</td>
            <td>Aug 23, 2018</td>
            <td><i id="archivo1" class="fas fa-download download"></i></td>
            <td></td>                    
            </tr>
            <tr>
            <td>Apple iPhone 6</td>
            <td class="number">$535</td>
            <td>Aug 20, 2018</td>
            <td class="text-success">Completed</td>
            <td class="actions"><a class="icon" href="#"><i class="mdi mdi-plus-circle-o"></i></a></td>
            </tr>
            <tr>
            <td>Samsung Galaxy S7</td>
            <td class="number">$583</td>
            <td>Aug 18, 2018</td>
            <td class="text-warning">Pending</td>
            <td class="actions"><a class="icon" href="#"><i class="mdi mdi-plus-circle-o"></i></a></td>
            </tr>
            <tr>
            <td>HTC One M9</td>
            <td class="number">$350</td>
            <td>Aug 15, 2018</td>
            <td class="text-warning">Pending</td>
            <td class="actions"><a class="icon" href="#"><i class="mdi mdi-plus-circle-o"></i></a></td>
            </tr>
            <tr>
            <td>Sony Xperia Z5</td>
            <td class="number">$495</td>
            <td>Aug 13, 2018</td>
            <td class="text-danger">Cancelled</td>
            <td class="actions"><a class="icon" href="#"><i class="mdi mdi-plus-circle-o"></i></a></td>
            </tr>
        ';

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
    
    public function descargarArchivoController($idctr){
                               
        #Obtener los datos del archivo a descargar
        #------------------------------------------->

        $archivo = GestorArchivosModel::InfoArchivoModel($idctr, "archivos");                

        #Obtener fecha actual
        #--------------------------->

        $fecha = date("Y-m-d H:i");  

        #buscar archivo por el nombre
        #---------------------------------------------->

        #Descargar Archivo
        #----------------------------->

        #Guardar Registro de Descarga
        #-------------------------------->

        $datosRegistro = array(
            "Nombre" => $archivo["Nombre"],
            "Tipo" => $archivo["Tipo"],
            "Accion" => "Descarga",
            "Usuario" => $_SESSION["usuario"],
            "Fecha" => $fecha
        );

        $registro = GestorArchivosModel::GuardarRegistroModel($datosRegistro, "historial");             

        #retornar respuesta  
        #------------------------->        
        

        
    }

   

}

