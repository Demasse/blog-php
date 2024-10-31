<?php

class Renderer{

    public static function render(string $path, array $variables=[]){

    //debut du tampon de la page d esortie
    ob_start();
    
    //inclusion dutemplate pour la page d'acceuil
    extract($variables);
    require("templates/" . $path . "_html.php");
    
    //recuperation du contenu de tampon de la page de sortie
    $pageContent = ob_get_clean();
    //inclusion du template de la page de sortie
    require("templates/layout_html.php");
    
    
    }
}