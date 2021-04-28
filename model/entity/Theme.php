<?php

namespace Model\Entity;

use App\AbstractEntity;

class Theme extends AbstractEntity
{
  private $id;
  private $nom;
  private $imgPath;

  public function __construct($data)
  {
    parent::hydrate($data, $this);
  }

  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of imgPath
   */
  public function getImgPath()
  {
    return $this->imgPath;
  }

  /**
   * Set the value of imgPath
   *
   * @return  self
   */
  public function setImgPath($imgPath)
  {
    $this->imgPath = $imgPath;

    return $this;
  }

  /**
   * Get the value of nom
   */
  public function getNom()
  {
    return $this->nom;
  }

  /**
   * Set the value of nom
   *
   * @return  self
   */
  public function setNom($nom)
  {
    $this->nom = $nom;

    return $this;
  }
}
