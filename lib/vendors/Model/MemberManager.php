<?php
namespace Model;

use \JFBlog\Manager;
use \Entity\member;

abstract class MemberManager extends Manager
{
  /**
   * Méthode retournant une liste des membres demandées 
   * @param $debut int Le premier membre à sélectionner
   * @param $limite int Le nombre de membre à sélectionner
   * @return array La liste des membres. Chaque entrée est une instance de Member.
   */
  abstract public function getList($debut = -1, $limite = -1);

  /**
     * Méthode retournant un pseudo précis.
     * @param $attr string L'attribut du membre à récupérer
     * @param $value 
     * @return Member le membre demandé
     */
   abstract public function get($attr, $value);

 /**
    * Méthode renvoyant le nombre de membres.
    * @return int
    */
   abstract public function count();

   /**
      * Méthode permettant d'ajouter un membre.
      * @param $member member Le membre à ajouter
      * @return void
      */
   abstract protected function add(Member $member);
   
   /**
    * Méthode permettant d'enregistrer un membre.
    * @param $member Member le membre à enregistrer
    * @see self::add()
    * @see self::modify()
    * @return void
    */
   public function save(Member $member)
   {
     if ($member->isValid())
     {
       $member->isNew() ? $this->add($member) : $this->modify($member);
     }
     else
     {
       throw new \RuntimeException('L\'utilisateur doit être validé pour être enregistré');
     }
   }   

   /**
    * Méthode permettant de modifier un membre.
    * @param $member member le membre à modifier
    * @return void
    */
   abstract protected function modify(member $member);  
   
   /**
   * Méthode permettant de supprimer un membre.
   * @param $id int L'identifiant du membre à supprimer
   * @return void
   */
  abstract public function delete($id); 
}