<?php

namespace Controller;

use Model\Manager\ThemeManager;
use Model\Manager\TopicManager;
use Model\Manager\PostManager;

class HomeController
{

  // affichage de la page d'accueil, fonction par défaut

  public function index()
  {

    $themeModel = new ThemeManager;
    $themes = $themeModel->findAll();

    $id = (isset($_GET['id'])) ? $_GET['id'] : null;

    $topicModel = new TopicManager;
    $postsModel = new PostManager;

    $topic = $topicModel->findOneById($id);
    $posts = $postsModel->findPostsByTopic($id);

    return [
      "view" => "home.php",
      "data" => [
        "themes" => $themes,
        "posts" => $posts,
        "topic" => $topic
      ]
    ];
  }
}
