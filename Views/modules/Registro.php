<div class="login-Register">

    <div id="Register-Content">

        <!-- HEADER DEL REGISTRO (BTN "X") 
        ------------------------------------>

        <div class="modal-header text-center" style="border:1px solid #eee">
            
            <h3 class="modal-title text-center">Registro</h3>            

        </div>

        <!-- FORMULARIO REGISTRO
        ---------------------------------->

        <div class="modal-body" style="border:1px solid #eee">
            
            <form method="POST">
            
                <!-- NOMBRE Y APELLIDO -->
                <div class="input-group mb-3" id="Alerts-Register">
                    <div class="input-group-prepend">
                    <span class="input-group-text input-color"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Nombre" id="NombreRegistro">
                    <input type="text" class="form-control" placeholder="Apellido" id="ApellidoRegistro">
                </div>

                <!-- CORREO -->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text input-color" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" class="form-control" placeholder="Correo" id="CorreoRegistro">
                </div>

                <!-- CONTRASEÑA -->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text input-color" id="basic-addon1"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" class="form-control" placeholder="Contraseña" id="PassRegistro">
                </div>

            </form>       
        
        </div>

        <!-- FOOTER DEL REGISTRO 
        ------------------------------------>

        <div class="modal-footer" style="border:1px solid #eee">
                        
            <button type="submit" class="btn btn-outline-dark" id="btn-Register">Registrarse</button>

        </div>
            
    </div> 

</div>   


