<?php
namespace App\Backend\Modules\Connexion;

use \AddictFram\BackController;
use \AddictFram\HTTPRequest;

class ConnexionController extends BackController
{
  public function executeIndex (HTTPRequest $request) {
      
      $pseudo = $request->postData('pseudo');
      $password = $request->postData('password');
      $manager = $this->managers->getManagerOf('Member'); 
      $member = $manager->get('pseudo',$pseudo);
      $id = $member['id'];

      if ($request->method() == 'POST')
      {
        if ($member)
        {
          if (password_verify($password, $member['password'])) 
          {
            if(empty($_SESSION)) 
            {
              $this->app->user()->setAttribute('id',$member['id']);
              $this->app->user()->setAttribute('pseudo',$member['pseudo']);
              $this->app->user()->setAttribute('mail',$member['mail']);
              $this->app->user()->setAttribute('phone',$member['phone']);
              $this->app->user()->setAttribute('profession',$member['profession']);
              $this->app->user()->setAttribute('genre',$member['genre']);
              $this->app->user()->setAttribute('name',$member['name']);
              $this->app->user()->setAttribute('avatar',$member['avatar']);
            }

            if(!empty($_POST['autoLogin'])) {
              $this->app->httpResponse()->setCookie('login', $id, time()+ (10 * 365 * 24 * 60 * 60));
            } else {
              if(isset($_COOKIE['login'])) {
                $this->app->httpResponse()->setCookie('login', '');
              }
            }

            $this->app->user()->setAuthenticated(true);
            $this->app->user()->setFlash('Bonjour ' . $_SESSION['pseudo'] . ' !');
            $this->app->httpResponse()->redirect('/');
          } 
          else 
          {
            $this->app->user()->setFlash('Le mot de passe est incorrect');
          }
        } 
        else
        {
          $this->app->user()->setFlash('Ce pseudonyme n\'existe pas');
        } 
      } 
    }

    public function executeLogout(HTTPRequest $request)
    { 
      $this->app->user()->logOut();
      // Suppression des cookies de connexion automatique
      $this->app->httpResponse()->setCookie('login', Null, time() - 360);
      $this->app->user()->setFlash('Vous vous êtes bien déconnecté');
      $this->app->httpResponse()->redirect('/');
    }
}