
//FUNCIONES PARA LOS ARCHIVOS
//--------------------------------------->

//ARCHIVO NUEVO
//------------------------>

$("#btn-nuevoAr").click( function(){

    $("#NuevoArchivo").toggle(400);

});

//VALIDAR ARCHIVO
//----------------------->

function ValidarArchivoNuevo(){    

    //VALIDAR TAMAÑO DEL ARCHIVO
    //------------------------------->

    archivo = $("input[name=archivoNuevo]").get(0).files[0];

    $("#AlertFile").remove();

    if(archivo.size > 10000000){        
        $(".Content-new-file").before('<div class="alert alert-warning alerta text-center" id="AlertFile">El archivo excede el tamaño permitido </div>');
        return false;
    }    

    //VALIDAR NOMBRE DEL ARCHIVO
    //------------------------------>

    $("#AlertName").remove();

    var expresion = /^[a-zA-Z0-9]*$/;

    if (!expresion.test($("input[name=nombreArchivo]").val())) {
        $(".Content-new-file").before('<div class="alert alert-warning alerta text-center" id="AlertName">No Ingrese carracteres especiales </div>');
        return false;
    }        
    
    //VALIDAR TIPO DE ARCHIVO
    //------------------------------->

    if(archivo.type == "application/octet-stream" || archivo.type == "application/pdf" || archivo.type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" || archivo.type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" || archivo.type == "text/plain" || archivo.type == "image/jpeg" || archivo.type == "image/png"){        

        return true;    

    }else{

        $(".Content-new-file").before('<div class="alert alert-warning alerta text-center" id="AlertFile">Formato del archivo no permitido </div>');
        return false;
        
    }    

}

//DESCARGAR ARCHIVO
//---------------------------->

$(".download").click( function(){
    var id = $(this).attr("id");

    var datos = new FormData();

    datos.append("id", id);    

    $.ajax({
        url: "Views/Ajax/GestorArchivos.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,            
        success: function(res){           
            
        }
    })
})



