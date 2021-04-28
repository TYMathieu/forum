<?php

namespace Controller;

use Model\Manager\ThemeManager;
use Model\Manager\TopicManager;

class ThemeController
{
  public function themeList()
  {

    $themeModel = new ThemeManager;
    $themes = $themeModel->findAll();

    return [
      "view" => "listOfThemes.php",
      "data" => [
        "themes" => $themes
      ]
    ];
  }

  public function listTopicsByCategory()
  {

    $id = (isset($_GET['id'])) ? $_GET['id'] : null;

    $themeModel = new ThemeManager;
    $topicModel = new TopicManager;

    $theme = $themeModel->findOneById($id);
    $topics = $topicModel->findTopicsByCategory($id);

    return [
      "view" => "listOfTopicsByCategory.php",
      "data" => [
        "theme" => $theme,
        "topics" => $topics
      ]
    ];
  }

  public function createTheme()
  {
    if (!empty($_POST)) {
      $theme = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
      $model = new ThemeManager;

      if (!$model->findOneByName($theme)) {
        $model->addTheme($theme);
        header("Location:index.php");
      } else {
        var_dump("Ce theme existe déjà");
      }
    }

    return [
      "view" => 'addTheme.php',
      "data" => null
    ];
  }
}
