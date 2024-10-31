<?php
require_once('Library/database.php');
require_once('library/utils.php');
//require_once('library/models/Article.php');
//require_once('library/models/Comment.php');
require_once('library/autoload.php'); 



$pdo = getPdo();

$articleModel = new Article();
$commentModel = new Comment();




/**
* CE FICHIER DOIT AFFICHER UN ARTICLE ET SES COMMENTAIRES !
* 
* On doit d'abord récupérer le paramètre "id" qui sera présent en GET et vérifier son existence
* Si on n'a pas de param "id", alors on affiche un message d'erreur !
* 
* Sinon, on va se connecter à la base de données, récupérer les commentaires du plus ancien au plus récent (SELECT * FROM comments WHERE article_id = ?)
* 
* On va ensuite afficher l'article puis ses commentaires
*/
/**
* 1. Récupération du param "id" et vérification de celui-ci
*/
// On part du principe qu'on ne possède pas de param "id"

$article_id =$_GET['id'];

//on peut desormais decide: erreur ou pas


//on peut desormais decide:erreur ou pas
if($article_id == null || $article_id == false){
    die("vous devez precise un parametre 'id valide dans l'url" );
}


// $sql="SELECT * FROM  articles  WHERE id=:article_id";
// $query = $pdo -> prepare($sql);

// $query ->execute(['article_id' => $article_id]);

// $article =$query -> fetch();

//recuperation des commmentaire de l'artcle

$article = $articleModel->find($article_id) ;

$commentaires = $commentModel->findAllWithArticles($article_id) ;
 // var_dump ($commentaires) ;
//die();

//titre de la page
$pageTitle = $article['title'];
render('articles/show', compact('pageTitle', 'article', 'commentaires', 'article_id'));



?>
