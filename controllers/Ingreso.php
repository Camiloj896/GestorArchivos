<?php
class Ingreso{

    public function IngresoController(){

        // VERIFICAR LOS DATOS DEL FORMULARIO
        // --------------------------------------->       

        if (isset($_POST["usuarioIngreso"])){
                                        
            //ARRAY PARA VERIFICAR USUARIO EN LA BASE            

            $DatosArray = array(
                "usuario" => $_POST["usuarioIngreso"],
                "password" => $_POST["passwordIngreso"]
            );                  

            //ENVIAR DATOS AL MODELO (VERIFICAR SI EL USUARIO EXISTE EN LA BASE

            $Res = IngresoModels::IngresoModel($DatosArray,"users");            

            //SI LOS DATOS CORRESPONDEN INICIAR LA SESION
                                
            if ($Res["Correo"] == $_POST["usuarioIngreso"] && $Res["Pass"] == $_POST["passwordIngreso"]) { 
                                                
                session_start();
                
                $_SESSION["validar"] = true;
                $_SESSION["Rol"] = $Res["Rol"];
                $_SESSION["usuario"] = $Res["Nombre"];
                
                header("location:Archivos");
            
            //SI LOS DATOS NO CORRESPONDEN MOSTRAR UNA ALERTA

            }else{

                echo '<script>

                        swal({
                            title: "¡Error!",
                            text: "¡El usuario/Contraseña no coninciden!",
                            type: "warning",
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: true
                            },
                            function(isConfirm){                    
                                
                        });

                      </script>';

            }
                
            
        }      
    }
}