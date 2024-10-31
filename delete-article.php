

<?php
require_once ('library/database.php');
require_once ('library/utils.php');
require_once('library/autoload.php'); 



$model = new Article();

// require_once("database");

if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
    die("Tu n'as pas précisé l'id de cet article");
}
$id = $_GET['id'];

$pdo = getPdo();

$article = $model -> find($id);

if (!$article) {
    die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer");
}

$model ->delete($id);

redirect('add-article.php');

// $message="";

// if (isset($_GET["id"])){
//     $id = $_GET["id"];
//     $sql="DELETE FROM articles WHERE id=?";
//     $re_suppr = $pdo -> prepare($sql);
//     $re_suppr->execute([$id]);
    
//     if($re_suppr -> rowCount() > 0){
//         $message="<p class='success'> Article supprimé </p>";
//     } else {
//         $message="<p class='error'>Aucun article trouvé avec cet id</p>";
//     }
// } else {
//     $message="<p class='error'>ID non valide</p>";
// }

// header("location: add-article.php ");
// exit()

?>