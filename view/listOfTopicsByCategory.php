<?php
$theme = $data['theme'];
?>

<div id="wrapper">
  <div class="block">
    <h2 class="center"><?= $data['theme']->getNom() ?></h2>
  </div>
  <br>
  <!-- Affichage des différentes catégories -->
  <?php foreach ($data['topics'] as $topic) { ?>
    <div class="block">
      <a href="?ctrl=topic&method=listPostsByTopic&id=<?= $topic->getId(); ?>">
        <h2> <?= $topic->getTitle() ?></h2>
      </a>
    </div>
  <?php
  } ?>

  <?php if (App\Session::getUser()) {
  ?>
    <a href="?ctrl=topic&method=addTopic&id=<?= $data['theme']->getId() ?>"><button class="black">Créer un topic</button></a>

  <?php
  }
  ?>
</div>