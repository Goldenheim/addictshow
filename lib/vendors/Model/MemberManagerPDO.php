<?php
namespace Model;

use \Entity\Member;

class MemberManagerPDO extends MemberManager
{
  public function getList($debut = -1, $limite = -1)
  {
    $sql = 'SELECT id, pseudo, mail, password, date_inscription FROM members ORDER BY id DESC';
    
    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }
    
    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Member');
    
    $listeMember = $requete->fetchAll();
    
    foreach ($listeMember as $member)
    {
      $member->setDateAjout(new \DateTime($member->dateAjout()));
    }
    
    $requete->closeCursor();
    
    return $listeMember;
  }

  public function getAllList()
  {
    $sql = 'SELECT id, pseudo, mail, password, date_inscription  FROM members ORDER BY id';
    
    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Member');
    
    $listeAllMember = $requete->fetchAll();
    
    foreach ($listeAllMember as $member)
    {
      $member->setDateAjout(new \DateTime($member->dateAjout()));
    }
    
    $requete->closeCursor();
    
    return $listeAllMember;
  }

  public function get($attr, $value)
  {
    $requete = $this->dao->prepare('SELECT id, pseudo, mail, password, avatar, date_inscription, phone, name, profession, genre FROM members WHERE '. $attr .' = :attr');
    $requete->bindValue(':attr', $value);
    $requete->execute();
    
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Member');
    
    if ($member = $requete->fetch())
    { 
      return $member;
    }
      
    return null;
  }
  
  public function count()
  {
    return $this->dao->query('SELECT COUNT(*) FROM members')->fetchColumn();
  }

  protected function add(Member $member)
  {
    $requete = $this->dao->prepare('INSERT INTO members SET pseudo = :pseudo, mail = :mail, password = :password, hash_validation = :hash_validation, avatar = :avatar, tmdbSession = :tmdbSession, date_inscription = NOW()');
    
    $requete->bindValue(':pseudo', $member->pseudo());
    $requete->bindValue(':mail', $member->mail());
    $requete->bindValue(':password', password_hash($member->password(), PASSWORD_DEFAULT));
    $requete->bindValue(':hash_validation', $member->hash_validation());
    $requete->bindValue(':tmdbSession', $member->tmdbSession());
    $requete->bindValue(':avatar', $member->avatar());
    
    $requete->execute();
  }

  protected function modify(Member $member)
  {
    $requete = $this->dao->prepare('UPDATE members SET pseudo = :pseudo, mail = :mail, name = :name, phone = :phone, profession = :profession, genre = :genre WHERE id = :id');
    
    $requete->bindValue(':pseudo', $member->pseudo());
    $requete->bindValue(':mail', $member->mail());
    $requete->bindValue(':name', $member->name());
    $requete->bindValue(':phone', $member->phone());
    $requete->bindValue(':profession', $member->profession());
    $requete->bindValue(':genre', $member->genre());
    $requete->bindValue(':id', $member->id(), \PDO::PARAM_INT);
    
    $requete->execute();
  }

  public function delete($id)
  {
    $this->dao->exec('DELETE FROM members WHERE id = '.(int) $id);
  }

  public function addfav($id, $movie)
  {
    $requete = $this->dao->prepare('INSERT INTO favourite SET member_id = :member_id, show_id = :show_id');
   
    $requete->bindValue(':member_id', $id);
    $requete->bindValue(':show_id', $movie);
   
    $requete->execute();
 }

  public function getFav($id)
    {
      $requete = $this->dao->prepare('SELECT show_id FROM favourite WHERE member_id = ' .(int) $id);
      $requete->execute();
      
      $requete->setFetchMode();
      
      $favourites = $requete->fetchAll();

      return $favourites;
    }

  public function deleteFav($id)
  {
    $this->dao->exec('DELETE FROM favourite WHERE show_id = '.(int) $id);
  }  
}