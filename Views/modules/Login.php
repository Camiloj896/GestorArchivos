<div class="login-Register">
    <div id="Login-Content">

        <div class="card-header text-center">
            <i class="fas fa-users"></i>
        </div>

        <div class="card-body">

            <form method="POST" onsubmit="return validaringreso()">                             

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="email" class="form-control" placeholder="Usuario" name="usuarioIngreso" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                    </div>                                       
                    <input type="password" class="form-control" placeholder="Contraseña" id="passwordIngreso" name="passwordIngreso" required>                    
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-eye" id="mostrarPass"></i></span>
                    </div> 
                </div>

                <div>                    
                    <input class="form-control formIngreso btn btn-outline-dark" type="submit" value="Iniciar">                    
                </div>    
                            
            </form>                    
        </div>   
        
        <div class="card-footer text-muted">
            © - 2019
        </div>   

    </div>    
</div>

<?php
	
    $ingreso = new Ingreso();
    $ingreso -> IngresoController();

?>

