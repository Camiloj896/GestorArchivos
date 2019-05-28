<?php

if (!isset($_SESSION["validar"])) { 
    header("location:Index");
}else{
    if(!$_SESSION["Rol"] == "Admin"){
        header("location:Index");
    } 
}
    
?>

<div class="card card-table">

    <!-- HEADER ARCHIVOS
    ---------------------------->

    <div class="card-header" style="background-color: #007bff">
        <div class="header-new">
            <!-- BOTON NUEVO ARCHIVO -->
            
        </div>
    </div>

    <!-- Lista de Archivos
    ---------------------------->

    <div class="card-body table-responsive">
        <table class="table table-striped table-borderless">

            <thead>
                <tr>
                <th style="width:20%;">Nombre</th>
                <th style="width:20%;" class="number">Tipo</th>
                <th style="width:20%;">Accion</th>
                <th style="width:20%;">Usuario</th>
                <th style="width:20%;" class="actions">Fecha</th>
                </tr>
            </thead>

            <tbody class="no-border-x">                

                <?php
                    $historial = new GestorHistorialController();
                    $historial->MostrarInfoHistorial();
                ?>                

            </tbody>

        </table>

    </div>

</div>
