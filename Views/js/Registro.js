
// Validar Datos de Registro
//------------------------------>

$("#btn-Register").click( function(){

    $("#Alert").remove();

    var Nombre = $("#NombreRegistro").val();
    var Apellido = $("#ApellidoRegistro").val();
    var Correo = $("#CorreoRegistro").val();
    var Pass = $("#PassRegistro").val();


    if (Nombre == "" || Apellido == "" || Correo == "" || Pass == ""){       
        
        $("#Alerts-Register").before('<div class="alert alert-warning alerta text-center" id="Alert">Por favor llene todos los campos</div>');      

        // VALIDAR NOMBRE

        if(Nombre == ""){ 
            $("#NombreRegistro").css({"border-color":"red"}); 
        } else {
            $("#NombreRegistro").css({"border-color":"rgb(204, 204, 204)"}); 
        }

        // VALIDAR APELLIDO

        if(Apellido == ""){ 
            $("#ApellidoRegistro").css({"border-color":"red"}); 
        } else {
            $("#ApellidoRegistro").css({"border-color":"rgb(204, 204, 204)"}); 
        }

        // VALIDAR CORREO

        if(Correo == ""){ 
            $("#CorreoRegistro").css({"border-color":"red"}); 
        } else {
            $("#CorreoRegistro").css({"border-color":"rgb(204, 204, 204)"}); 
        }

        // VALIDAR CONTRASEÑA

        if(Pass == ""){ 
            $("#PassRegistro").css({"border-color":"red"}); 
        } else {
            $("#PassRegistro").css({"border-color":"rgb(204, 204, 204)"}); 
        }    

    }else{

        $("#Alert").remove();

        var datos = new FormData();		
		
        datos.append("Nombre", Nombre);
        datos.append("Apellido", Apellido);
        datos.append("Correo", Correo);
        datos.append("Pass", Pass);

        // ENVIAR DATOS POR AJAX
        // --------------------------------->

        $.ajax({
            url: "Views/Ajax/Registro.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,            
            success: function(res){  
                
                console.log(res);

                if(res == "ok"){
                    swal({
						title: "¡OK!",
						text: "¡Usuario registrado correctamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
				
							if (isConfirm){				
								window.location = "Login";
							}
					});
                }

            }
        })
    }

})
