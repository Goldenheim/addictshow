<?php
namespace Entity;

use \JFBlog\Entity;

class Member extends Entity
{
  protected $pseudo,
            $password,
            $mail,
            $mail_confirm,
            $password_confirm,
            $hash_validation,
            $avatar = array();

  const PSEUDO_INVALIDE = 1;
  const MAIL_INVALIDE = 2;
  const PASSWORD_INVALIDE = 3;
  const MAIL_CONFIRM_INVALIDE = 4;
  const PASSWORD_CONFIRM_INVALIDE = 5;
  const HASH_VALIDATION_INVALIDE = 6;
  const AVATAR_INVALIDE = 7;

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

   public function setAvatar($avatar)
  {
    if (!empty($avatar))
    {
      $this->erreurs[] = self::AVATAR_INVALIDE;
    }

    $this->avatar = $avatar;
  }

  public function setPassword($password)
  {
    if (!is_string($password) || empty($password))
    {
      $this->erreurs[] = self::PASSWORD_INVALIDE;
    }

    $this->password = $password;
  }

  public function setHash_validation($hash_validation)
  {
    if (empty($hash_validation))
    {
      $this->erreurs[] = self::HASH_VALIDATION_INVALIDE;
    }

    $this->hash_validation = $hash_validation;
  }

  public function setMail_confirm($mail_confirm)
  {
    if (!is_string($mail_confirm) || empty($mail_confirm))
    {
      $this->erreurs[] = self::MAIL_CONFIRM_INVALIDE;
    }

    $this->mail_confirm = $mail_confirm;
  }

  public function setPassword_confirm($password_confirm)
  {
    if (!is_string($password_confirm) || empty($password_confirm))
    {
      $this->erreurs[] = self::PASSWORD_CONFIRM_INVALIDE;
    }

    $this->password_confirm = $password_confirm;
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

  public function mail_confirm()
  {
    return $this->mail_confirm;
  }

  public function password_confirm()
  {
    return $this->password_confirm;
  }

  public function hash_validation()
  {
    return $this->hash_validation;
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