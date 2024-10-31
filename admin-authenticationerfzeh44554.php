
<?php
require_once ("database.php");

//creation dun administrateur et authentification


//verification des existence d'un administrateur
$sql = "SELECT  COUNT(*) AS count From administrateurs WHERE 
role = 1";
$query = $pdo->prepare($sql);
$query-> execute();
$result = $query->fetch();


if($result['count']=== 0){
    $username="dan";
    $password="1234";


    //hashage du password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

 //insertion de ladministarteur dans la bd

 $sql=  " INSERT INTO `administrateurs` (`username`, `password`, `role`) VALUES (?, ?, 1)";

 
    $query = $pdo->prepare($sql);
    $query -> execute([ $username , $hashedPassword  ]);
        echo'le compte  administrateur cree avec succes👍👍👍👍';

}

//verification de l'authentification de l'administrateur
if($_SERVER ['REQUEST_METHOD']=== 'POST'){
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    //recuperation des info de l'administrateur depuis le db
    $sql = "SELECT * FROM  administrateurs WHERE username = ?";
    $query = $pdo->prepare($sql);
        $query -> execute ([$username]) ;
        $user = $query->fetch();
        
        //Recuperation des informations de l'administrateur depuis la DataBase
        $sql = " SELECT* FROM `administrateurs` WHERE username = ?";

        $query = $pdo->prepare($sql);
        $query->execute([$username]);
        $user = $query->fetch();
        
        if($user && password_verify($password, $user['password'])
        && $user['role'] === 1) {
            header("location: add-article.php ");
        echo "Vous avez été authentifié avec succès !";

 

        exit();

        }else{
        // Authentification échouée
        echo "<p style='color: #fff;padding:20px; background:rgb(37, 146, 223);  font-size: 20px; width:400px'> Nom d'utilisateur ou mot de passe incorrect ! </p>";
                
        }


    }



//titre de la page
$pageTitle = 'Connexion administrateur';

//debut du tampon de la page d esortie
ob_start();

//inclusion dutemplate de la page d'administrteur

require("templates/admin/admin-authentification_html.php");

//recuperation du contenu de tampon de la page de sortie
$pageContent = ob_get_clean();

//inclusion du template de la page de sortie

require("templates/layout_html.php");


?>