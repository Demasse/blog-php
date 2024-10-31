
<?php

require_once ("database.php");

$message="";

if (isset($_GET["id"])){

    //$id = $_GET["id"];
    //recuperation des inf de l(article a edite)
    $sql="SELECT * FROM articles WHERE id = ?";
    $req = $pdo->prepare($sql);
    $articleId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    $req->execute([$articleId]);
    $article = $req->fetch(PDO::FETCH_ASSOC);

// Récupération des données
$title = $article['title'] ?? "" ;
$slug = $article['slug'] ?? "";
$introduction = $article['introduction'] ?? "" ;
$content = $article['content'] ?? "" ;

}


if (isset($_POST['update'])) {
                // Nettoyage des entrée
    
    
  $title = filter_input(INPUT_POST, 'title', FILTER_DEFAULT);
  $slug = strtolower(str_replace(' ', '-', $title)); // Mise à jour du slug à partir du titre
    $introduction = filter_input(INPUT_POST, 'introduction', FILTER_DEFAULT);
    $content = filter_input(INPUT_POST, 'content', FILTER_DEFAULT);
 echo  $articleId = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    
                // Validation des données
    
     if (empty($title) || empty($slug) || empty($introduction) || empty($content)) {
     $error = "Veuillez remplir tous les champs du formulaire !";
    
   } else {


      // Préparation de la requête SQL et mise à jour de l'article dans la base de données
      $sql = " UPDATE `articles` SET `title`= ? ,`introduction`= ? ,`content`= ?  WHERE id=?";
      
      $rs_modif = $pdo->prepare($sql);
      // Exécution de la requête
      $rs_modif->execute([$title, $introduction, $content, $articleId]);
      // Message de succès
      var_dump($rs_modif);
      $message = "<p style='text-align:center; color: #fff;padding:20px;background:green;margin-top:10px; width:300px'> Étudiant modifié avec success</p>";
    //   if (!$article) {
    //     echo "<p style='color: #fff;padding:20px; background:#FF6600;width:400px'>L'article n'existe pas.</p>";
    //   } else {
        if (isset($message)) {
          echo "<p style='color: #fff;padding:20px; background:#FF6600;width:400px'>$message</p>";
        }
    //   }
      
      }
    header('location: add-article.php');
}


//titre de la page
$pageTitle = 'edite un acticle';

//debut du tampon de la page d esortie
ob_start();

//inclusion dutemplate pour la page d'acceuil

require("templates/articles/edit-article_html.php");

//recuperation du contenu de tampon de la page de sortie
$pageContent = ob_get_clean();
//inclusion du template de la page de sortie
require("templates/layout_html.php");



?>
