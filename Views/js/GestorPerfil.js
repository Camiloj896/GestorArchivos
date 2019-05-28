
// MODIFICAR INFORMACION USUARIO

$("#editarUsuario").click( function(){
    var nombre = $("#nombrePerfil").val();
    var apellido = $("#apellidoPerfil").val();
    var correo = $("#correoPerfil").val();
    var id = $("#idPerfil").val();    
    var img = $("#imagenPerfil").attr("src");    

    $(this).hide();
    $("#cambiarImagen").show();
    $("#content-profile").html("");
    $("#content-profile").append('<div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text input-color" id="basic-addon1"><i class="fas fa-user"></i></span></div><input type="text" class="form-control" value="'+nombre+'" id="nombrePerfil2" required></div>');
    $("#content-profile").append('<div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text input-color" id="basic-addon1"><i class="fas fa-user"></i></span></div><input type="text" class="form-control" value="'+apellido+'" id="apellidoPerfil2" required></div>');
    $("#content-profile").append('<div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text input-color" id="basic-addon1"><i class="fas fa-envelope"></i></span></div><input type="email" class="form-control" value="'+correo+'" id="correoPerfil2"></div>');
    $("#content-profile").append('<input type="text" id="idPerfil" value="'+id+'" style="display:none">');
    $("#content-profile").append('<br/><div class="card-footer Content-imagen-profile"><button type="button" class="btn btn-outline-dark" id="Cancelar">Cancelar</button><button type="button" class="btn btn-outline-dark" id="Guardar" style="margin-left:5px">Guardar</button></div>');

    // CENCERLAR EDICION
    $("#Cancelar").click( function(){
        $(".marco-img").html('<i class="fas fa-window-close" id="cambiarImagen" style="display:none"></i><img src="'+img+'" class="image-profile" id="imagenPerfil" alt="foto de perfil">');
        $("#content-profile").html('<br/><strong>Nombre: </strong><input type="text" id="nombrePerfil" value="'+nombre+'" readonly><br/><strong>Apellido: </strong><input type="text" id="apellidoPerfil" value="'+apellido+'" readonly><br/>       <strong>Correo: </strong><input type="text" id="correoPerfil" value="'+correo+'" readonly><input type="text" id="idPerfil" value="'+id+'" style="display:none"><br/>');
        $("#editarUsuario").show();
        //$("#cambiarImagen").hide();
        $("#msjnuevaIMG").hide();        
    })

    //CAMBIO DE IMAGEN

    $("#cambiarImagen").click( function(){
        $(".marco-img").css({"display":"flex","justify-content":"center","align-items":"center"});
        $(".marco-img").html('<input type="file" value="Seleccionar" id="CambioImagenPerfil">');
        $("#msjnuevaIMG").show();        

        //VALIDAR ARCHIVO (IMAGEN)

        $("#CambioImagenPerfil").change( function(){
            
            imagen = this.files[0];

            var imagentype = imagen.type;

            if (imagentype == "image/jpeg" || imagentype == "image/png") {
                $("#alert").remove(); 
            }else{
                $(".card-body").before('<div class="alert alert-warning" id="alert"><strong>formato incorrecto!</strong></div>');        
            }  

            //MOSTRAR IMAGEN TEMPORAL O MSJ DE ERROR POR EL TAMAÑO
            
            var datosImage = new FormData();
    
            datosImage.append("imagen", imagen);
    
            $.ajax({
                url: "Views/ajax/GestorUsuario.php",
                method: "POST",
                data: datosImage,
                cache: false,
                contentType: false,
                processData: false,
                success: function(res){            
                     if (res == 0){
                        $("#card-body").before('<div class="alert alert-warning" id="alert"><strong>tamaño incorrecto!</strong></div>'); 
                    }else{
                        $("#alert").remove();                        
                        $(".marco-img").html('<i class="fas fa-window-close" id="cambiarImagen" style="display:none"></i><img src="'+res.slice(6)+'" class="image-profile" id="imagenPerfil" alt="foto de perfil">');                    
                        $("#msjnuevaIMG").hide();
                    }
                }
            });           
        })       
    })    

    //ACTUALIZAR DATOS

    $("#Guardar").click( function(){
        
        nombre = $("#nombrePerfil2").val();
        apellido = $("#apellidoPerfil2").val();
        correo = $("#correoPerfil2").val();

        //VALIDAR NOMBRE
        if (nombre == ""){            
            $("#msjerrorCampo").show();
            $("#nombrePerfil2").css({"border-color":"red"});
        }else{
            $("#msjerrorCampo").hide();
            $("#nombrePerfil2").css({"border-color":"rgb(204, 204, 204)"});
        }
        
        //VALIDAR APELLIDO
        if (apellido == ""){
            $("#msjerrorCampo").show();
            $("#apellidoPerfil2").css({"border-color":"red"});
        }else{
            $("#msjerrorCampo").hide();
            $("#apellidoPerfil2").css({"border-color":"rgb(204, 204, 204)"});
        }

        //VALIDAR CORREO
        if (correo == ""){
            $("#msjerrorCampo").show();
            $("#correoPerfil2").css({"border-color":"red"});
        }else{
            $("#msjerrorCampo").hide(); 
            $("#correoPerfil2").css({"border-color":"rgb(204, 204, 204)"});
        }

        if(!nombre == "" && !apellido == "" && !correo==""){

            var datos = new FormData();
            datos.append("Nombre", nombre);
            datos.append("Apellido", apellido);
            datos.append("Correo", correo);
            datos.append("id", id);            

            //CAMBIAR IMAGEN            
            $("#CambioImagenPerfil").change( function(){
                imagen = this.files[0];
                datos.append("Imagen", imagen);
                datos.append("ImagenAntigua", img);
            })

            //GUARDAR DATOS NUEVOS

            $.ajax({
                url: "Views/ajax/GestorUsuario.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                success: function(res){                     
                    
                    if(res == "Ok"){
                        
                            swal({
                                title: "¡OK!",
                                text: "¡Los datos se actualizaron correctamente!",
                                type: "success",
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false
                                },
                                function(isConfirm){
                        
                                    if (isConfirm){				
                                        window.location = "Perfil";
                                    }
                            });
                         
                    }
                     
                }
            });       

        }
    })   
})