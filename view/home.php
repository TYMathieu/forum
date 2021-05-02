<!-- Lien vers les categories -->
<div class="arianne"><a href="?ctrl=theme&method=categorysList">Voir la liste des catégories</a></div>
<div id="wrapper">
  <div class="block">
    <h2 class="center">FORUM JOJO</h2>
  </div>
  <!-- Affichage des différentes catégories -->
  <?php foreach ($data['themes'] as $category) { ?>
    <div class="block">
      <a href="?ctrl=theme&method=listTopicsByCategory&id=<?= $category->getId_category(); ?>">
        <h2> <?= $category->getNom() ?></h2>
      </a>
    </div>
  <?php
  } ?>
</div>