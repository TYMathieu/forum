<div class="arianne"><a href="index.php">Retour au forum</a></div>
<h1 class="categorylist">Listes des catégories</h1>

<?php foreach ($data['categorys'] as $category) { ?>
  <div class="categorylist">
    <?= $category->getNom() ?>
  </div>
<?php } ?>

</div>