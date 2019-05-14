<div class="card card-table">

    <!-- HEADER ARCHIVOS
    ---------------------------->

    <div class="card-header">
        <div class="header-new">
            <!-- BOTON NUEVO ARCHIVO -->
            <i class="fas fa-plus text-success" id="btn-nuevoAr"></i>
        </div>

        <div class="title"><strong>Archivos</strong></div>

        <div id="NuevoArchivo" style="display:none">

            <hr>

            <div class="alert alert-danger alerta text-center" id="AlertFile" style="display:none">Ya existe un archivo con este nombre</div>

            <form enctype="multipart/form-data" method="POST" onsubmit="return ValidarArchivoNuevo()">
                    
                <div class="Content-new-file">
                    <input type="file" value="Seleccionar" name="archivoNuevo" Required>
                </div>

                <div class="alert alert-info text-center">
                    <strong>Formatos permitidos: </strong>(rar, pdf, docx, xlsx, txt, jpg, png)<br/><strong>Tamaño: </strong>(maximo 10 mb)
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" name="nombreArchivo" placeholder="Nombre" aria-describedby="basic-addon1" Required>
                </div>

                <?php       
                
                #OBTENER NOMBRE DEL USUARIO
                #---------------------------------------->

                if (isset($_SESSION["validar"])) {
                    echo '<input type="text" name="nombreUser" style="display:none" Value="'.$_SESSION["usuario"].'">';
                }else{
                    echo '<input type="text" name="nombreUser" style="display:none" Value="Anonimo">';
                }

                ?>                

                <hr>

                <button type="submit" id="GuardarArchivo" class="btn btn-outline-dark">Guardar</button>                

            </form> 
        </div>

    </div>

    <!-- Lista de Archivos
    ---------------------------->

    <div class="card-body table-responsive">
        <table class="table table-striped table-borderless">

            <thead>
                <tr>
                <th style="width:40%;">Nombre</th>
                <th class="number">Tipo</th>
                <th style="width:20%;">Fecha</th>
                <th style="width:20%;">Descarga</th>
                <th class="actions" style="width:5%;"></th>
                </tr>
            </thead>

            <tbody class="no-border-x">                

                <?php
                    $Archivos = new GestorArchivosController();
                    $Archivos->mostrarArchivosController();
                ?>                

            </tbody>

        </table>

    </div>

</div>

<?php
    $Archivos = new GestorArchivosController();
    $Archivos->cargaArchivoController()
?>