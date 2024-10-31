<?php
require_once ("database.php");


/**
* Ajouter un nouvel article
*/
// Vérification de l'authentification de l'utilisateur
// Assurez-vous que l'utilisateur est connecté avant de lui permettre d'ajouter un article
// Récupération des données du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = "Développèment d'application"; //$_POST['title'];

    $slug = strtolower(str_replace(' ', '-', $title)); // Création du slug à partir du titre
    // $slug2 = str_replace(' ', '-', $slug1); // Création du slug à partir du titre
    // $slug1 =iconv('UTF-8 ', '', $slug2); // Création du slug à partir du titre
    
    
    // var_dump ($title) ;echo'<br>';
    // var_dump ($slug) ;echo'<br>';
    // var_dump ($slub2) ;echo'<br>';
    $introduction = $_POST['introduction'];
    $content = $_POST['content'];
    // Validation des données
    if (empty($title) || empty($slug) || empty($introduction) || empty($content)) {
    die("Veuillez remplir tous les champs du formulaire !");
    }
    // Connexion à la base de données avec PDO
    

$pdo = new PDO('mysql:host=localhost;dbname=blogpoo;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    // Insertion du nouvel article dans la base de données
    $query = $pdo->prepare('INSERT INTO articles (title, slug, introduction, content, created_at) 
    VALUES (?, ?, ?, ?, NOW())');
    $query->execute([$title, $slug, $introduction, $content]);
    // Redirection vers la page d'accueil ou l'article nouvellement créé
    header("Location: index.php");
    exit();
    }

//titre de la page
$pageTitle = 'ajoute d\'article du blog';

//debut du tampon de la page d esortie
ob_start();

//inclusion dutemplate pour la page d'acceuil

require("templates/articles/add-article_html.php");

//recuperation du contenu de tampon de la page de sortie
$pageContent = ob_get_clean();
//inclusion du template de la page de sortie
require("templates/layout_html.php");


?>

