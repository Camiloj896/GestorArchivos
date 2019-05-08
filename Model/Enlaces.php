<?php

class EnlacesModels{

    # Enlaces Para el conntenido de la Pagina
    #\------------------------------------------->

    public function Enlacesmodel($enlace){

        # Lista de enlaces validos
        #\------------------------------->

        if ($enlace == "Archivos" ||
            $enlace == "Login" ||
            $enlace == "Registro" ||
            $enlace == "Salir" ||
            $enlace == "Historial" ||
            $enlace == "Perfil"){

            $module = "Views/modules/". $enlace . ".php";

        # Enlace de inicio
        #\------------------------------->

        }elseif ($enlace == "index"){
            
            $module = "Views/modules/Archivos.php";

        # Enlace por defecto
        #\------------------------------->

        }else{

            $module = "Views/modules/Archivos.php";

        }

        return $module;

    }

}