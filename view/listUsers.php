<h1>All Users list</h1>

<ul>
  <?php foreach ($data['users'] as $user) { ?>
    <li>
      <?= $user->getNickname() ?>
    </li>
  <?php } ?>
</ul>