


<?php
/**
* Ajouter un nouvel article
*/
// Vérification de l'authentification de l'utilisateur
// Assurez-vous que l'utilisateur est connecté avant de lui permettre d'ajouter un article
// Vérification et nettoyage des entrées
function clean_input($data){
return htmlspecialchars(stripslashes(trim($data)));
}
// Récupération des données du formulare
if (isset($_POST['add-article'])) {

    // Nettoyage des entrées

    $title = clean_input(filter_input(INPUT_POST, 'title', FILTER_DEFAULT));

    $slug = strtolower(str_replace(' ', '-', $title));

     // Mise à jour du slug à partir du titre

    $introduction = clean_input(filter_input(INPUT_POST, 'introduction', 
    FILTER_DEFAULT));
    $content = clean_input(filter_input(INPUT_POST, 'content', FILTER_DEFAULT));
    // Validation des données
    if (empty($title) || empty($slug) || empty($introduction) || empty($content)) {
    $error = "Veuillez remplir tous les champs du formulaire !";
    } else {
        // Connexion à la base de données avec PDO
   $pdo = new PDO('mysql:host=localhost;dbname=cours-blog-php-2024;charset=utf8', 'root', '', [

  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
   PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC

    ]);
    // Insertion du nouvel article dans la base de données

  $query = $pdo->prepare('INSERT INTO articles (title, slug, introduction, 
  content, created_at) VALUES (?, ?, ?, ?, NOW())');
     $query->execute([$title, $slug, $introduction, $content]);

      }

     }
    $pageTitle = "Ajouter un article";

       ob_start();

        require 'templates/articles/add-article_html.php';

       $pageContent = ob_get_clean();

    require 'templates/layout_html.php';
    