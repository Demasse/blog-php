<?php
require_once ("database.php");
require_once('library/database.php');
require_once('library/utils.php');
require_once('library/autoload.php'); 



$articleModel = new Article();
$commentModel = new Comment();

$pdo = getPdo();


$author = $_POST["author"] ??  "";
$content = $_POST["content"] ??  "";
$article_id = $_POST["article_id"] ??  "";

if(empty($author) || empty($content) || empty($article_id)){
    die("voulez remplir tt les champs");
}

// on fait quand meme gaffe a ce que les gars n'essaye pas de betise cheloues dans son commentaire
$content = htmlspecialchars($content);


// $sql="SELECT COUNT(*) FROM articles WHERE id =:article_id ";
// $query = $pdo -> prepare($sql);
// $query ->execute(["article_id" => $article_id]) ;
// $articleExists = $query ->fetchColumn();

$articles = $articleModel-> find($article_id);


if(!$articles){
    die("Ho l'article $article_id n'existe pas boss ! ");
}

$commentModel->insert( $author, $content, $article_id);

//la base de donnees 

$pdo = getPdo();

    // 4. Redirection vers l'article en question :
    redirect("article.php?id=".$article_id);

?>