<?php

namespace Controller;

use Model\Manager\TopicManager;
use Model\Manager\PostManager;
use Model\Manager\ThemeManager;

class TopicController
{

  // méthodes pour afficher la liste des messages pour un sujet (grâce à l'id du topic)
  public function listPostsByTopic()
  {

    $id = (isset($_GET['id'])) ? $_GET['id'] : null;

    $topicModel = new TopicManager;
    $postsModel = new PostManager;

    $topic = $topicModel->findOneById($id);
    $posts = $postsModel->findPostsByTopic($id);

    return [
      "view" => "listOfMessagesByTopic.php",
      "data" => [
        "posts" => $posts,
        "topic" => $topic
      ]
    ];
  }

  public function addTopic()
  {
    $themeid = (isset($_GET['id'])) ? $_GET['id'] : null;
    $themeModel = new ThemeManager;
    $theme = $themeModel->findOneById($themeid);

    if (!empty($_POST)) {
      $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
      $content = filter_input(INPUT_POST, "content", FILTER_SANITIZE_STRING);
      $user = (isset($_GET['user_id'])) ? $_GET['user_id'] : null;
      // Gestion du topic
      $model_topic = new TopicManager();
      $model_topic->addTopic($title, $themeid, $user);
      // Gestion du post
      $lastid = $model_topic->lastTopic();
      $model_post = new PostManager();
      $model_post->addPost($content, $user, $lastid[0]['id_topic']);
      // Redirection vers le topic créer
      $postsModel = new PostManager;
      $topic = $model_topic->findOneById($lastid[0]['id_topic']);
      $posts = $postsModel->findPostsByTopic($lastid[0]['id_topic']);

      return [
        "view" => "listOfMessagesByTopic.php",
        "data" => [
          "posts" => $posts,
          "topic" => $topic
        ]
      ];
    }

    return [
      "view" => "addTopic.php",
      "data" => [
        "theme" => $theme
      ]
    ];
  }
}
