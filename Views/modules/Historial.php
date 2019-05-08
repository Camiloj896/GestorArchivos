<?php

if (!isset($_SESSION["validar"])) { 
    header("location:Index");
}else{
    if(!$_SESSION["Rol"] == "Admin"){
        header("location:Index");
    } 
}
    
?>

<H1>HISTORIAl</h1>