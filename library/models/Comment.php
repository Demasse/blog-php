<?php

require_once ("library/database.php");
require_once('library/models/Model.php');


class Comment extends Model{

    protected $table="commentaire";

     public function findAllWithArticles(int $article_id): array {
        
         $sql="SELECT * FROM commentaire WHERE article_id=?";
         $query = $this->pdo -> prepare($sql);
         $query ->execute([$article_id]);
         $commentaires =$query -> fetchAll();
         return $commentaires;

     }

    public function find(int $id): int {
        
        $sql="SELECT article_id FROM commentaire WHERE id=?";
        $query = $this->pdo -> prepare($sql);
        $query ->execute([$id]);
        $commentaire=$query -> fetchColumn();
        return $commentaire;

    }

    // public  function delete(int $id): void {
        
    //     $query = $this->pdo->prepare('DELETE FROM commentaire WHERE id = :id');
    //     $query->execute(['id' => $id]);

    // }

    public function insert(string $author,string $content,int $article_id): void {
       // pdo =getPdo();
        $sql ="INSERT INTO commentaire SET author =:author, content=:content, article_id=:article_id ,created_at = NOW()";
        $query = $this->pdo -> prepare($sql);
        $query ->execute(compact ('author','content','article_id')) ;
        
    }





}