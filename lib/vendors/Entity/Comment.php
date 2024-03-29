<?php
namespace Entity;

use \AddictFram\Entity;

class Comment extends Entity
{
  protected $movie,
            $auteur,
            $member_id,
            $contenu,
            $answer,
            $avatar,
            $date;

  const AUTEUR_INVALIDE = 1;
  const CONTENU_INVALIDE = 2;
  const AVATAR_INVALIDE = 3;

  public function isValid()
  {
    return !(empty($this->contenu));
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

  public function setMember_id($member_id)
  {
    if (!is_string($member_id) || empty($member_id))
    {
      $this->erreurs[] = self::MEMBER_ID_INVALIDE;
    }

    $this->member_id = $member_id;
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
    if (!is_string($titre) || empty($titre))
    {
      $this->erreurs[] = self::AUTEUR_INVALIDE;
    }

    $this->titre = $titre;
  }

  public function setAvatar($avatar)
  {
    if (!is_string($avatar) || empty($avatar))
    {
      $this->erreurs[] = self::AVATAR_INVALIDE;
    }

    $this->avatar = $avatar;
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

  public function member_id()
  {
    return $this->member_id;
  }

  public function avatar()
  {
    return $this->avatar;
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