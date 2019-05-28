$("#login").click( function(){
    $("#login-content").toggle(400)
})

$("#mostrarPass").click( function(){
    atri = $("#passwordIngreso").attr("type");
    if(atri == "password"){
        $("#passwordIngreso").attr("type","text");    
    }else{
        $("#passwordIngreso").attr("type","password");    
    }
    
})