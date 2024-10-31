<?php
/*
retourne la function
*/

class Database{


  public static  function getPdo():PDO{
        
        $pdo = new PDO('mysql:host=localhost;dbname=cours-blog-php-2024;charset=utf8', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
    
            return $pdo ;
            
}
    
    }
  

   
  

    