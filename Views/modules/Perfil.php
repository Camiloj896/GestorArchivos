<?php
    if (!isset($_SESSION["validar"])) { 
        header("location:Index");        
    }
?>
<div class="Content-profile">
    <div class="card border-dark mb-3" style="width: 400px;">
        <div class="card-header"></div>
        <div class="card-body text-dark">

            <?php
                $usuario = new GestorUsuarioController();
                $usuario->mostrarInfoUsuario($_SESSION["id"]);                
            ?>

        </div>
    </div>
</div>



