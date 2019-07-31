<?php
namespace Model;

use \Entity\Comment;

class CommentsManagerPDO extends CommentsManager
{
  protected function add(Comment $comment)
  {
    $q = $this->dao->prepare('INSERT INTO comments SET movie = :movie, auteur = :auteur, member_id = :member_id, contenu = :contenu, avatar = :avatar, date = NOW()');
    
    $q->bindValue(':movie', $comment->movie(), \PDO::PARAM_INT);
    $q->bindValue(':auteur', $comment->auteur());
    $q->bindValue(':member_id', $comment->member_id());
    $q->bindValue(':contenu', $comment->contenu());
    $q->bindValue(':avatar', $comment->avatar());
    
    $q->execute();
    
    $comment->setId($this->dao->lastInsertId());
  }

  public function answer(Comment $comment, $answer)
  {
    $q = $this->dao->prepare('UPDATE comments SET answer = :answer WHERE id = :id');
    
    $q->bindValue(':id', $comment->id(), \PDO::PARAM_INT);
    $q->bindValue(':answer', $answer);
    
    $q->execute();
  }

  public function deleteAnswer($id)
  {
    $this->dao->exec('UPDATE comments SET answer = "" WHERE id = '.(int) $id);
  }

  public function getAnswers()
  {
    $sql = 'SELECT comments.id, comments.auteur, comments.date, comments.contenu, comments.news,comments.answer, news.titre AS titre FROM comments INNER JOIN news ON comments.news = news.id ORDER BY comments.date DESC ';

    $requete = $this->dao->query($sql);
    $requete->setFetchMode();
    
    $answers = $requete->fetchAll();
    
    $requete->closeCursor();
    
    return $answers;
  }

  public function getListOf($movie)
    {
      if (!ctype_digit($movie))
      {
        throw new \InvalidArgumentException('L\'identifiant passé doit être un nombre entier valide');
      }
      
      $q = $this->dao->prepare('SELECT comments.id, comments.movie, comments.auteur, comments.contenu, comments.answer, comments.report, comments.date, members.avatar AS avatar FROM comments INNER JOIN members ON comments.member_id = members.id WHERE comments.movie = :movie');
      $q->bindValue(':movie', $movie, \PDO::PARAM_INT);
      $q->execute();
      
      $q->setFetchMode();
      
      $comments = $q->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');
      
      foreach ($comments as $comment)
      {
        $comment->setDate(new \DateTime($comment->date()));
      }
      
      return $comments;
    }

  public function getReportList()
  {
    $sql = 'SELECT comments.id, comments.auteur, comments.contenu, comments.news , news.titre AS titre FROM comments INNER JOIN news ON comments.news = news.id WHERE report = 1';
    
    $requete = $this->dao->query($sql);
    $requete->setFetchMode();
    
    $reportList = $requete->fetchAll();
    
    $requete->closeCursor();
    
    return $reportList;
  }  

  protected function modify(Comment $comment)
  {
    $q = $this->dao->prepare('UPDATE comments SET contenu = :contenu, report = 2 WHERE id = :id');
    
    $q->bindValue(':contenu', $comment->contenu());
    $q->bindValue(':id', $comment->id(), \PDO::PARAM_INT);
    
    $q->execute();
  }
  
  public function get($id)
  {
    $q = $this->dao->prepare('SELECT id, movie, auteur, contenu, date, report FROM comments WHERE id = :id');
    $q->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $q->execute();
    
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');
    
    return $q->fetch();
  }  

  public function author($id)
  {
    $q = $this->dao->prepare('SELECT id, movie, auteur, contenu, date, report FROM comments WHERE member_id = :id ORDER BY date DESC');
    $q->bindValue(':id', $id);
    $q->execute();
    
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');

    $comments = $q->fetchAll();
          
    foreach ($comments as $comment)
    {
      $comment->setDate(new \DateTime($comment->date()));
    }
    
    return $comments;
  }  

  public function authorCount($id)
  {
    return $this->dao->query('SELECT COUNT(*) FROM comments WHERE member_id =' . (int) $id)->fetchColumn();
  }

  public function delete($id)
  {
    $this->dao->exec('DELETE FROM comments WHERE id = '.(int) $id);
  }

  public function deleteFromNews($news)
  {
    $this->dao->exec('DELETE FROM comments WHERE news = '.(int) $news);
  }

  public function getMovie($id)
  {
    $q = $this->dao->prepare('SELECT movie FROM comments WHERE id = '.(int) $id);

    $q->execute();
  
    return $newsId = $q->fetch();
  }

  public function report($id) 
  {
    $requete = $this->dao->prepare('UPDATE comments SET report = :report WHERE id = :id');
    
    $requete->bindValue(':report', 1);
    $requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    
    $requete->execute();
  }

  public function reportCount()
  {
    return $this->dao->query('SELECT COUNT(*) FROM comments WHERE report = 1')->fetchColumn();
  }


  public function getList($debut = -1, $limite = -1)
  {
    $sql = 'SELECT id, auteur, date, contenu, movie FROM comments ORDER BY comments.date DESC ';

    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }
    
    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');
    $lastCom = $requete->fetchAll();
    
    $requete->closeCursor();
    
    return $lastCom;
  }
}