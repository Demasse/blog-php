

<div class="admin">
    <div class="article adm">
      <span style='color:#FF6600 ; font-size:4rem; text-align:center; font-weight: 
700px;'>Adminitrateur dan : </span>
      <a href="index.php">Se deconnecter</a>
    </div>
    
    <?php
 if (isset($error)) {
 echo "<p style='color: #fff;padding:20px; background:#FF6600; 
width:400px'>$error</p>";
 }
 ?>

<h1>Editer un nouvel article</h1>
<form method="POST" action="edit-article">
  <label for="title">Title:</label>
  <input type="text" name="title" id="title" value="<?= $title;?>">
  <br>
  <div hidden>
    <label for="slug">Slug:</label>
    <input type="text" name="slug" id="slug" value="<?= $slug;?>">
    </div>
    <br>
    <label for="introduction">Introduction:</label>
    <textarea name="introduction" id="introduction"><?= $introduction;?></textarea>
    <br>
    <label for="content">Content:</label>
    <textarea name="content" id="content"><?= $content;?></textarea>
    <br>
    <input type="submit" name="update" value="EDITER">
    <input type="text" name="id" id="title" value =<?=$articleId?> style="visibility : hidden">
</form>