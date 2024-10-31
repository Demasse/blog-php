<?php

require_once ("library/database.php");
require_once('library/models/Model.php');



class Article extends Model{
 
    protected $table="articles";

//    public function findAll() : array{
        
//         $resultats = $this->pdo->query("SELECT * FROM articles ");
//         $articles = $resultats->fetchAll();

//         return $articles ;
//     }

    
//   public function delete(int $id): void {
        
//         $sql="DELETE FROM articles WHERE id=?";
//         $re_suppr = $this->pdo -> prepare($sql);
//         $re_suppr->execute([$id]);
//     }
        

}