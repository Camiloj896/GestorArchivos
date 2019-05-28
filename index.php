<?php

    # Incluir las vistas/Template desde el controlador
    #\---------------------------------------------------->

    require_once "./controllers/template.php";	    

    require_once "./controllers/Enlaces.php";
    require_once "./Model/Enlaces.php";

    require_once "./controllers/Registro.php";
    require_once "./Model/Registro.php";
    
    require_once "./controllers/Ingreso.php";
    require_once "./Model/Ingreso.php";

    require_once "./controllers/GestorArchivos.php";
    require_once "./Model/GestorArchivos.php";

    require_once "./controllers/GestorUsuario.php";
    require_once "./Model/GestorUsuario.php";    

    require_once "./controllers/GestorHistorial.php";
    require_once "./Model/GestorHistorial.php";        

	$template = new TemplateController();
	$template -> template();