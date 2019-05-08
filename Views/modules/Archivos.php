<div class="card card-table">

    <div class="card-header">
        <div class="header-new">
            <a href="#New-File" class="text-success" data-toggle="modal"><i class="fas fa-plus"></i></a>
        </div>
        <div class="title">Archivos</div>
    </div>

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
                <tr>
                <td>Sony Xperia M4</td>
                <td class="number">$149</td>
                <td>Aug 23, 2018</td>
                <td><i id="archivo1" class="fas fa-download download"></i></td>
                <td></td>                    
                </tr>
                <tr>
                <td>Apple iPhone 6</td>
                <td class="number">$535</td>
                <td>Aug 20, 2018</td>
                <td class="text-success">Completed</td>
                <td class="actions"><a class="icon" href="#"><i class="mdi mdi-plus-circle-o"></i></a></td>
                </tr>
                <tr>
                <td>Samsung Galaxy S7</td>
                <td class="number">$583</td>
                <td>Aug 18, 2018</td>
                <td class="text-warning">Pending</td>
                <td class="actions"><a class="icon" href="#"><i class="mdi mdi-plus-circle-o"></i></a></td>
                </tr>
                <tr>
                <td>HTC One M9</td>
                <td class="number">$350</td>
                <td>Aug 15, 2018</td>
                <td class="text-warning">Pending</td>
                <td class="actions"><a class="icon" href="#"><i class="mdi mdi-plus-circle-o"></i></a></td>
                </tr>
                <tr>
                <td>Sony Xperia Z5</td>
                <td class="number">$495</td>
                <td>Aug 13, 2018</td>
                <td class="text-danger">Cancelled</td>
                <td class="actions"><a class="icon" href="#"><i class="mdi mdi-plus-circle-o"></i></a></td>
                </tr>
            </tbody>

        </table>

    </div>

</div>

<!-- ARCHIVOS NUEVOS
--------------------------------------->

<div id="New-File" class="modal fade">

    <div class="modal-dialog modal-content">
        
        <!-- CERRAR MODAL -->

        <div class="modal-header" style="border:1px solid #eee">            
            
            <button type="button" class="close" data-dismiss="modal"><i class="fas fa-times"></i></button>                
    
        </div>

        <div class="modal-body" style="border:1px solid #eee">
            
            <form enctype="multipart/form-data">
                
                <div class="Content-new-file">
                    <input type="file" value="Seleccionar">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Nombre" aria-describedby="basic-addon1">
                </div>

            </form>        
            
    
        </div>

        <div class="modal-footer" style="border:1px solid #eee">
            
            <button type="submit" class="btn btn-outline-dark">Guardar</button>                
    
        </div>
        
    </div>
</div>