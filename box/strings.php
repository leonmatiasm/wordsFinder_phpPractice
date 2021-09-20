<?php



function subrayarPalabras($palabra, $string){
    
    $string = strtolower($string);
    $palabra = strtolower($palabra);

    if(str_contains($string, $palabra)){
        
        $parrafo = str_ireplace($palabra, "<span class='text-warning bg-dark px-1'><ins>$palabra</ins></span>", $string);

        return $parrafo;
    }else{
        return "No encontramos coincidencias";
    }
}

