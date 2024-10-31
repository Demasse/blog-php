
<h1>Cours Blog PHP 2024</h1>
<div class="article-grid">
<?php foreach ($articles as $article) : ?>
  <div class="article">
  <h2><?= $article['title']; ?></h2>
   <p><?= $article['introduction']; ?></p>

   <a href="article.php?id=<?= $article['id']; ?>">Voir plus</a>
   </div>

<?php endforeach ?>
</div>