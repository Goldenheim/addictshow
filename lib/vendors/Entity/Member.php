<?php
namespace Entity;

use \JFBlog\Entity;

class Member extends Entity
{
  protected $pseudo,
            $password,
            $mail,
            $avatar;

  const PSEUDO_INVALIDE = 1;
  const MAIL_INVALIDE = 2;
  const PASSWORD_INVALIDE = 3;

  public function isValid()
  {
    return !(empty($this->pseudo) || empty($this->mail) || empty($this->password));
  }


  // SETTERS //

  public function setPseudo($pseudo)
  {
    if (!is_string($pseudo) || empty($pseudo))
    {
      $this->erreurs[] = self::PSEUDO_INVALIDE;
    }

    $this->pseudo = $pseudo;
  }

  public function setMail($mail)
  {
    if (!is_string($mail) || empty($mail))
    {
      $this->erreurs[] = self::MAIL_INVALIDE;
    }

    $this->mail = $mail;
  }

  public function setPassword($password)
  {
    if (!is_string($password) || empty($password))
    {
      $this->erreurs[] = self::PASSWORD_INVALIDE;
    }

    $this->password = $password;
  }

  // GETTERS //

  public function pseudo()
  {
    return $this->pseudo;
  }

  public function mail()
  {
    return $this->mail;
  }

  public function password()
  {
    return $this->password;
  }

  public function dateAjout()
  {
    return $this->date_inscription;
  }

  public function avatar()
  {
    return $this->avatar;
  }
}