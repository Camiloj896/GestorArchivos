<?php

class GestorUsuarioController{

    public function mostrarInfoUsuario($id){

        $res = GestorUsuarioModel::mostrarInfoUsuario($id, "users");        
        
        echo '<div class="Content-imagen-profile">
                <div class="marco-img">
                    <i class="fas fa-window-close" id="cambiarImagen" style="display:none"></i>
                    <img src="'.$res["image"].'" class="image-profile" id="imagenPerfil" alt="foto de perfil">
                </div>                
            </div>
            <div id="msjnuevaIMG" style="display:none" class="text-center text-danger"><strong>El tamaño de la imagen debe ser 300x300</strong></div>            
            <div id="msjerrorCampo" style="display:none" class="text-center text-danger"><strong>Complete la información</strong></div>
            <hr>
            <i class="fas fa-user-edit text-primary" id="editarUsuario"></i>
            <div id="content-profile">
                <br/>
                <strong>Nombre: </strong><input type="text" id="nombrePerfil" value="'.$res["Nombre"].'" readonly><br/>                
                <strong>Apellido: </strong><input type="text" id="apellidoPerfil" value="'.$res["Apellido"].'" readonly><br/>
                <strong>Correo: </strong><input type="text" id="correoPerfil" value="'.$res["Correo"].'" readonly><br/>                
                <input type="text" id="idPerfil" value="'.$res["id"].'" style="display:none">
            </div>';  
    
    }

    //IMAGEN TEMPORAL
    //----------------------->

    public function imagenTemporal($imagen){
        
        list($ancho, $alto) = getimagesize($imagen);

        if($ancho < 300 || $alto < 300){
            echo 0;
        }else{
            $numAleatorio = mt_rand(100, 999);

            $ruta = "../../Views/images/Perfil/Temporal/imgTempProfile" . $numAleatorio . ".jpg";

            $imagenTemporal = move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);                       
            
            echo $ruta;
        }

    }

    public function editarInfoUsuario($datos){

        //VERIFICAR IMAGEN NUEVA
        //---------------------------->

        if (isset($_FILES["Imagen"]["tmp_name"])){

            //ELIMINAR IMAGENES TEMPORALES
            //----------------------------------

            $borar = glob("Views/images/Perfil/Temporal/*");
            foreach ($borar as $file){
                unlink($file);
            }

            //IMAGEN ANTERIOR DIFERENTE (DEFAULT) ELIMINAR
            //----------------------------------------------->

            if (!$datos["ImagenAn"] == "Views/images/Perfil/Default.png"){

                inlink($datos["ImagenAn"]);

                $numAleatorio = mt_rand(100, 999);

                $ruta = "../../Views/images/Perfil/imgProfile" . $numAleatorio . ".jpg";

                $imagenTemporal = move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);

            }else{

                $ruta = "Views/images/Perfil/Default.png";

            }            

        }

        //ACTUALIZAR DATOS
        //------------------------->

        $res = GestorUsuarioModel::editarInfoUsuario($datos, $ruta, "users");

        if($res){
            echo "Ok";
        }else{
            echo "Mal";
        }                     
        
    }

    public function eliminarUsuario(){
        
    }

}