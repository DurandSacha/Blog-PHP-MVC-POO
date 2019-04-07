<?php

namespace App\src\controller;

use App\src\DAO\UserDAO;
use App\src\model\View;
use App\src\model\User;

class ConnexionController
{
    private $view;
    private $user;

    public function __construct()
    {
        $this->view = new View();
        $this->userDAO = new UserDAO();
    }

    public function connect($post)
    {
        if (isset($_POST['email']) && ($_POST['password'])) {

            //verifier que le membre existe
            $result = $this->userDAO->verificationBDD($_POST['email'],$_POST['password']);
            if ($result == true) {

                $role = $this->userDAO->verifyRole($_POST['email']);
                if($role[0] == 'administrator'){
                    $_SESSION['admin'] = 'true' ;
                    $_SESSION['membre'] = 'true' ;
                    $this->view->render('backOffice', [
                    ]);
                }
                else if($role[0] == 'member'){
                    $_SESSION['admin'] = 'false' ;
                    $_SESSION['membre'] = 'true';
                    header('Location: ../public/index.php');
                }
            }
            else{
                $this->view->render('connect', [
                  // envoyer message erreur
                ]);
            }
        }
        else {
            $this->view->render('connect', [
            ]);
        }
    }

    public function register($post)
    {
        if (isset($_POST['email']) && ($_POST['username']) && ($_POST['password'])  ) {
            $this->userDAO->addUser($_POST['email'],$_POST['password'],$_POST['username']);

            $this->view->render('../public/home', [
            ]);

        }
        else {

            $this->view->render('register', [
            ]);
        }
    }
}










