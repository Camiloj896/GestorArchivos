$(".download").click( function(){
    
    var id = $(this).attr("id");

    // var $datos = new FormData();

    // $datos.append("id", id.slice(7));

    // $.ajax({
    //     url: "views/Ajax/GestorArchivos.php",
    //     method: "POST",
    //     data: datos,
    //     cache: false,
    //     contentType: false,
    //     processData: false,
    //     success: function(res){

    //     }

    // })



    console.log(id.slice(7));

    
})