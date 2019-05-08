
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 border-bottom shadow-sm menu-dark">
        <h5 class="my-0 mr-md-auto font-weight-normal text-white">Nombre</h5>
        <nav class="my-2 my-md-0 mr-md-3">            
            <a class="p-2 text-white" href="Archivos">Archivos</a>
            <?php

                session_start();

                #VEFIRICAR SI EXISTE UNA SESION
                #---------------------------------------->

                if (isset($_SESSION["validar"])) { 

                    #SI EL USUARIO ES EL ADMINISTRADOR HABILITAR HISTORIAL
                    #--------------------------------------------------------->

                    if($_SESSION["Rol"] == "Admin")  
                    {
                        echo '<a class="p-2 text-white" href="Historial">Historial</a>';                          
                    }

                    #MODIFICAR EL MENU PARA LOS USUARIOS
                    #--------------------------------------------------------->
                    
                    echo '<a class="p-2 text-white" href="Perfil">Perfil</a>
                          <a class="p-2 text-white" href="Salir">Salir</a>';
                
                #MENU POR DEFECTO 
                #--------------------->

                }else{
                    echo '<a class="p-2 text-white" href="Login">Iniciar sesión</a>            
                          <a class="p-2 text-white" href="Registro">Registro</a>';
                }
        
            ?>
        </nav>        
    </div>


