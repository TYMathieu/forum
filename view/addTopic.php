<?php
App\Session::getUser();
$topic = $data['theme'];

?>

<h1>Ajoutez un topic dans le thème "<?= $topic->getNom() ?>"</h1>

<form action="?ctrl=topic&method=addTopic&id=<?= $topic->getId() ?>&user_id=<?= $_SESSION['user']->getId() ?>" method="post">
  <p><input type="text" name="title" placeholder="Titre du topic" required></p>
  <p><textarea name="content" rows="4" placeholder="Votre message" required></textarea></p>
  <button type="submit">Créer</button>
</form>