<?php

class RegistroController{

    
    Public function GuardarDatosController($datosController){

        $res = RegistroModel::GuardarDatosModel($datosController, "users");

        if ($res){
            echo "ok";
        }else{
            echo "mal";
        }
        
    }

}

