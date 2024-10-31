
<?php

require_once ("library/database.php");
require_once('library/utils.php');
require_once('library/models/Article.php');
require_once('library/models/utilisateurs.php');

$model = new Article();

$utilisateursModel = new utilisateurs();

$utilisateurs = $utilisateursModel->findAll();
// var_dump($utilisateurs);
// die();


$pdo = getPdo();

 $articles = $model-> findAll("created_at DESC");

//titre de la page
$pageTitle = 'Accueil';

render('articles/index', compact('pageTitle','articles'));


?>
