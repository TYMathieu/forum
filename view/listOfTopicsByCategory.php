<?php
$category = $data['category'];
?>

<div class="listContainer">

  <!-- category Title -->
  <h2 class="title"> category :
    <?php echo "<span style ='color:rgb(248, 156, 139);'>" . $category->getNom() . "</span>"; ?>
  </h2>

  <!-- Topics -->
  <div class="list">
    <ul class="list-unstyled">

      <?php foreach ($data['topics'] as $topic) { ?>

        <li>
          <a class="topicsTitles" href="?ctrl=topic&method=listMessagesByTopic&id=<?= $topic->getId(); ?>" style="color: white;">
            <?= $topic->getTitle(); ?>
          </a>
          Posted by <?= $topic->getUser()->getPseudonym(); ?>.
          On <?= $topic->getDateCreation(); ?>
        </li>
        <li><br></li>

      <?php } ?>
      <!-- <button type="button" class="myButton"> -->
      <!-- finir le code pour cette fonctionnalit√© dans TopicController -->
      <!-- <a href="?ctrl=topic&method=addNewTopic" class="nounderline" style="color: white;">New Topic</a> -->
      <!-- </button> -->
    </ul>
  </div>
</div>