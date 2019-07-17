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

  public function getUnique($id)
  {
    $requete = $this->dao->prepare('SELECT id, pseudo, mail, password, date_inscription FROM members WHERE id = :id');
    $requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $requete->execute();
    
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Member');
    
    if ($member = $requete->fetch())
    {
      $member->setDateAjout(new \DateTime($member->dateAjout()));
      
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
    $requete = $this->dao->prepare('INSERT INTO member SET pseudo = :pseudo, mail = :mail, password = :password, date_inscription');
    
    $requete->bindValue(':pseudo', $member->pseudo());
    $requete->bindValue(':mail', $member->mail());
    $requete->bindValue(':password', $member->password());
    
    $requete->execute();
  }

  protected function modify(Member $member)
  {
    $requete = $this->dao->prepare('UPDATE member SET pseudo = :pseudo, mail = :mail, password = :password WHERE id = :id');
    
    $requete->bindValue(':pseudo', $member->pseudo());
    $requete->bindValue(':mail', $member->mail());
    $requete->bindValue(':password', $member->password());
    $requete->bindValue(':id', $member->id(), \PDO::PARAM_INT);
    
    $requete->execute();
  }

  public function delete($id)
  {
    $this->dao->exec('DELETE FROM members WHERE id = '.(int) $id);
  }
}