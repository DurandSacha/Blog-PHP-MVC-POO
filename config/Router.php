<?php

namespace App\config;

use App\src\controller\FrontController;
use App\src\controller\ErrorController;
use App\src\controller\BackController;

class Router
{
    private $frontController;
    private $errorController;
    private $backController;

    public function __construct()
    {
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->errorController = new ErrorController();
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


