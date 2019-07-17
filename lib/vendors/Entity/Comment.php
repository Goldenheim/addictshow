<?php
namespace Entity;

use \JFBlog\Entity;

class Comment extends Entity
{
  protected $movie,
            $auteur,
            $contenu,
            $answer,
            $date;

  const AUTEUR_INVALIDE = 1;
  const CONTENU_INVALIDE = 2;

  public function isValid()
  {
    return !(empty($this->auteur) || empty($this->contenu));
  }

  public function setMovie($movie)
  {
    $this->movie = (int) $movie;
  }

  public function setAuteur($auteur)
  {
    if (!is_string($auteur) || empty($auteur))
    {
      $this->erreurs[] = self::AUTEUR_INVALIDE;
    }

    $this->auteur = $auteur;
  }

  public function setContenu($contenu)
  {
    if (!is_string($contenu) || empty($contenu))
    {
      $this->erreurs[] = self::CONTENU_INVALIDE;
    }

    $this->contenu = $contenu;
  }

  public function setTitre($titre)
  {
    if (!is_string($auteur) || empty($auteur))
    {
      $this->erreurs[] = self::AUTEUR_INVALIDE;
    }

    $this->titre = $titre;
  }

  public function setAnswer($answer)
  {
    if (!is_string($answer) || empty($answer))
    {
      $this->erreurs[] = self::CONTENU_INVALIDE;
    }

    $this->answer = $answer;
  }

  public function setDate(\DateTime $date)
  {
    $this->date = $date;
  }

  public function movie()
  {
    return $this->movie;
  }

  public function titre()
  {
    return $this->titre;
  }

  public function auteur()
  {
    return $this->auteur;
  }

  public function contenu()
  {
    return $this->contenu;
  }

  public function date()
  {
    return $this->date;
  }

  public function report()
  {
    return $this->report;
  }

  public function answer()
  {
    return $this->answer;
  }
}