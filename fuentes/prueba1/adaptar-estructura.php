<?php

function adaptar_estructura(&$datos, $estructura){
    if(!isset($estructura['atributos'])){
        throw new Exception('Falta definir atributos');
    }
    if(isset($estructura['tipo']) && $estructura['tipo']=='array'){
        $datos_a_estructurar=&$datos;
    }else{
        $datos_a_estructurar=array(&$datos);
    }
    foreach($datos_a_estructurar as $id=>&$elemento){
        foreach($estructura['atributos'] as $nombre_campo=>$valor_campo){
            if(!isset($elemento[$nombre_campo])){
                if(is_array($valor_campo)){
                    if(isset($valor_campo['predeterminado_especial']) &&
                       $valor_campo['predeterminado_especial']=='id'
                    ){
                        $valor_predeterminado=$id;
                    } else if(!isset($valor_campo['valor_predeterminado'])){
                        if(!isset($valor_campo['predeterminado_otro'])){
                          throw new Exception("Falta parametro obligatorio ('{$nombre_campo}' no tiene valor por defecto)");
                        }
                        else {
                          $indice= $valor_campo['predeterminado_otro'];
                          $valor_predeterminado=$datos_a_estructurar[0]["{$indice}"];
                        }
                    } else {
                        $valor_predeterminado=$valor_campo['valor_predeterminado'];
                    }                    
                } else {
                    $valor_predeterminado=$valor_campo;        
                }
                $elemento[$nombre_campo]=$valor_predeterminado;
            } else {
                if(is_array($valor_campo) && isset($valor_campo['atributos'])){
                    adaptar_estructura($elemento[$nombre_campo],$valor_campo);
                }
            }
        }
    }
}
?>