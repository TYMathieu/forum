<?php
$topic = $data['topic'];
$i = 0;
?>

<div id="wrapper">
  <div class="block row">
    <div class="col-1">
      <img src="https://via.placeholder.com/75" alt="">
    </div>
    <div class="col-11">
      <h2><?= $topic->getTitle() ?></h2>
      <p">Par <?= $topic->getUser()->getPseudonym() ?> - <?= $topic->getDateCreation() ?></p>
    </div>
  </div>
  <?php foreach ($data['posts'] as $post) {
    if ($i == 0) {
      echo "<p class='firstpost'>" . $post->getContent() . "</p></div>";
      $i++;
    } else {
  ?>
      <div class="block_txt row">
        <div class="col-1">
          <img src="https://via.placeholder.com/75" alt="">
        </div>
        <div class="col-11">
          <p><?php echo $post->getUser()->getPseudonym() . " - " . $post->getdateCreation() ?></p>
          <p><?= $post->getContent() ?></p>
        </div>
      </div>
  <?php
    }
  } ?>
  <?php if (App\Session::getUser()) {
  ?>
    <div class="block_txt row">
      <div class="col-1">
        <img src="https://via.placeholder.com/75" alt="">
      </div>
      <div class="col-11">
        <p><?= $_SESSION['user']->getPseudonym(); ?></p>
        <form action="?ctrl=post&method=sendPost&user_id=<?= $_SESSION['user']->getId() ?>&topic_id=<?= $topic->getId() ?>" method="post">
          <textarea name="content" rows="4" required></textarea>
          <button type="submit">Répondre</button>
        </form>
      </div>
    </div>

  <?php
  }
  ?>