<?php

namespace App\config;

use App\src\controller\FrontController;
use App\src\controller\ErrorController;
use App\src\controller\BackController;
use App\src\controller\ConnexionController;

class Router
{
    private $frontController;
    private $errorController;
    private $backController;
    private $connexionController;

    public function __construct()
    {
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->errorController = new ErrorController();
        $this->connexionController = new ConnexionController();
    }

    public function run()
    {
        try{
            if(isset($_GET['route']))
            {
                if($_GET['route'] === 'article'){
                    $this->frontController->article($_GET['idArt']);
                }
                else if($_GET['route'] === 'addArticle') {
                    $this->backController->addArticle($_POST);
                }
                else if($_GET['route'] === 'rmArticle') {
                    $id = $this->getParametre($_POST, 'id');
                    $this->backController->rmArticle($id);
                }
                else if($_GET['route'] === 'editArticle') {
                    $id = $this->getParametre($_POST, 'id');
                    $this->backController->editArticle($id);
                }
                else if($_GET['route'] === 'blog') {
                    $this->frontController->blog();
                }
                else if($_GET['route'] === 'connect') {
                    $this->connexionController->connect($_POST);
                    //$this->backController-> adminArticle();

                }
                else if($_GET['route'] === 'register') {
                    $this->connexionController->register($_POST);
                }
                else if($_GET['route'] === 'deconnexion') {
                    $this->connexionController->deconnect();
                }
                else if($_GET['route'] === 'adminarticle') {
                    $this->backController->adminArticle($_POST);
                }
                else if($_GET['route'] === 'admincommentaire') {
                    $this->backController->adminCommentaire();
                }
                else if($_GET['route'] === 'admindroit') {
                    $this->backController->adminDroit();
                }
                else if($_GET['route'] === 'cv') {
                    $this->frontController->downloadCv();
                }
                else if($_GET['route'] === 'contact') {
                    $this->frontController->contact($_POST);
                }
                else{
                    $this->errorController->error();
                }
            }
            else{
                $this->frontController->home();

            }
        }
        catch (Exception $e)
        {
            $this->ErrorController->error();
        }
    }

     // Recherche un paramètre dans un tableau
     private function getParametre($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        }
        
    }


}


