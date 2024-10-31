<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>
        <?= $article['title'] ?>
    </h1>
    <small>Ecrit le
        <?= $article['created_at'] ?>
    </small>
    <p>
        <?= $article['introduction'] ?>
    </p>
    <hr>
    <?= $article['content'] ?>
    <?php 
    
    if (count($commentaires) === 0) : ?>
    <h2>Il n'y a pas encore de commentaire pour cet article ... SOYEZ LE PREMIER !
        :D</h2>

    <?php else : ?>

    <h2 class="comment-heading">Il y a déjà
        <?= count($commentaires) ?> réactions :
    </h2>

    <?php foreach ($commentaires as $commentaire) : ?>
    <h3 class="comment-author" >Commentaire de
        <?= $commentaire['author'] ?>
    </h3>
    <small class="comment-date">Le
        <?= $commentaire['created_at'] ?>
    </small>
    <blockquote class="comment-content">
        <em>
            <?= $commentaire['content'] ?>
        </em>
    </blockquote>
    <a href="delete-comment.php?id=<?= $commentaire['id'] ?>" onclick="return
     window.confirm(`Êtes vous sûr de vouloir supprimer ce commentaire ?!`)">Supprimer</a>
    <?php endforeach ?>
    <?php endif ?>

    <form action="save-comment" method="POST">
        <h3>Vous voulez réagir ? N'hésitez pas les bros !</h3>
        <input type="text" name="author" placeholder="Votre pseudo !">
        <textarea name="content" id="" cols="30" rows="10" placeholder="Votre commentaire 
..."></textarea>
        <input type="hidden" name="article_id" value="<?= $article_id ?>">
        <button>Commenter !</button>
    </form>
</body>

</html>