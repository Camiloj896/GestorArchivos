<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proyecto</title>
    <link rel="stylesheet" href="Views/css/style.css">
    <link rel="stylesheet" href="Views/font-awesont/css/all.css">
    <link rel="stylesheet" href="Views/css/bootstrap.css"> 
    <link rel="stylesheet" href="views/css/sweetalert.css">

    <script src="Views/js/jquery-3.3.1.min.js"></script>         
    <script src="Views/js/bootstrap.js"></script> 
    <script src="views/js/sweetalert.min.js"></script>

</head>
<body>
    
    <!-- MENU
    ----------------------------------------->    

    <?php
        include "modules/Menu.php";
    ?>  

    <!-- CONTENIDO
    ----------------------------------------->

    <section class="container">

        <?php
            
            $content = new Enlaces();
            $content -> EnlacesController();

        ?>  

    </section>    
    
    <!-- SCRIPTS  -->    
       
    <script src="Views/js/script.js"></script> 
    <script src="Views/js/Registro.js"></script> 
    <script src="Views/js/Validaringreso.js"></script>
    <script src="Views/js/GestorArchivos.js"></script>    
    <script src="Views/js/GestorPerfil.js"></script>        
</body>
</html>