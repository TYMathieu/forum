<!-- Lien vers les categories -->
<!-- <div class="arianne"><a href="?ctrl=theme&method=categorysList">Voir la liste des catégories</a></div> -->
<div id="wrapper">
  <div class="block">
    <h2 class="center">FORUM JOJO</h2>
  </div>
  <br>
  <!-- Affichage des différentes catégories -->
  <?php foreach ($data['themes'] as $category) { ?>
    <div class="block">
      <a href="?ctrl=theme&method=listTopicsByCategory&id=<?= $category->getId(); ?>">
        <h2> <?= $category->getNom() ?></h2>
      </a>
    </div>
  <?php
  } ?>

  <?php if (App\Session::getUser()) {
  ?>
    <a href="?ctrl=theme&method=createTheme"><button class="black">Créer un theme</button></a>

  <?php
  }
  ?>
</div>