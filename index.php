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

	$template = new TemplateController();
	$template -> template();