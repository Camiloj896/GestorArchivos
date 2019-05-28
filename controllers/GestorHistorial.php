<?php

Class GestorHistorialController{

    public function MostrarInfoHistorial(){

        $res = GestorHistorialModel::MostrarInfoHistorial("historial");
       

        foreach ($res as $row => $item) {
            
            if ($item["Accion"] == "Descarga"){
                $color = "text-danger";
            }elseif($item["Accion"] == "Carga"){
                $color = "text-success";
            }

            echo '<tr>
                    <td>'.$item["Nombre"].'</td>
                    <td>'.$item["Tipo"].'</td>
                    <td class="'.$color.'">'.$item["Accion"].'</td>
                    <td>'.$item["Usuario"].'</td>
                    <td>'.$item["Fecha"].'</td>
                    <td></td>                    
                  </tr>';
        }
        
    }

}