<?php

namespace Model\Manager;

use App\AbstractManager;

// Le Manager va hériter de toutes les méthodes publiques et protégées, 
// propriétés et constantes de la classe parente. 
// Temps qu'une classe n'écrase pas ces méthodes, elles conservent leur fonctionnalité d'origine.

class PostManager extends AbstractManager
{
  private static $classname = "Model\Entity\Post";
  //fully qualified classname

  public function __construct()
  {
    self::connect(self::$classname);
  }

  public function findAll()
  {
    $sql = "SELECT * FROM post";

    return self::getResults(
      self::select($sql, null, true),
      self::$classname
    );
  }

  public function findPostsByTopic($id)
  {
    $sql = "SELECT * FROM posts
    WHERE topic_id = :id
    ORDER BY dateCreation";

    return self::getResults(
      self::select(
        $sql,
        ["id" => $id],
        true
      ),
      self::$classname
    );
  }

  public function addPost($content, $user, $topic)
  {
    $sql = "INSERT INTO posts (content, user_id, topic_id)
    VALUES (:content, :user, :topic)";

    return self::create(
      $sql,
      [
        "content" => $content,
        "user" => $user,
        "topic" => $topic
      ]
    );
  }
}
