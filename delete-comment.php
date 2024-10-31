

<?php

require_once('library/database.php');
require_once('library/utils.php');
require_once('library/autoload.php'); 



$model = new comment;

/**
* 1. Récupération du paramètre "id" en GET
*/
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if ($id === null || $id === false) {
die("Ho ! Fallait préciser le paramètre id en GET !");
}
/**
* 2. Connexion à la base de données avec PDO
*/

$pdo = getPdo();
/**
* 3. Récupération de l'identifiant de l'article avant la suppression du commentaire
*/ 
 $commentaires = $model ->  find($id);
 $article_id = $model ->  find($id);
if (!$commentaires) {
die("Aucun commentaire n'a l'identifiant $id !");
};
/* 4. Suppression réelle du commentaire
 */

$model ->delete($id);

redirect("article.php?id=".$article_id);

?>