<?php

namespace Controller;

use Model\Manager\PostManager;
use Model\Manager\TopicManager;
use App\Router;

class PostController
{
  public function themeList()
  {

    $postModel = new PostManager;
    $posts = $postModel->findAll();

    return [
      "view" => "listOfThemes.php",
      "data" => [
        "posts" => $posts
      ]
    ];
  }

  public function sendPost()
  {
    $user = (isset($_GET['user_id'])) ? $_GET['user_id'] : null;
    $topic_id = (isset($_GET['topic_id'])) ? $_GET['topic_id'] : null;

    if (!empty($_POST)) {
      $content = filter_input(INPUT_POST, "content", FILTER_SANITIZE_STRING);

      $model = new PostManager();

      $model->addPost($content, $user, $topic_id);
    }
    $topicModel = new TopicManager;
    $postsModel = new PostManager;

    $topic = $topicModel->findOneById($topic_id);
    $posts = $postsModel->findPostsByTopic($topic_id);

    return [
      "view" => "listOfMessagesByTopic.php",
      "data" => [
        "posts" => $posts,
        "topic" => $topic
      ]
    ];
  }

  // méthode pour ajouter un message (répondre)
  // méthode pour modifier son message
  // méthode pour supprimer son message

}
