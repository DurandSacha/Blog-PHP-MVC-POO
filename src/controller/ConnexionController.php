<?php

namespace App\src\controller;

use App\src\DAO\UserDAO;
use App\src\model\View;
use App\src\model\User;
use App\src\DAO\ArticleDAO;

class ConnexionController
{
    private $view;
    private $user;
    private $articleDAO;

    public function __construct()
    {
        $this->view = new View();
        $this->userDAO = new UserDAO();
    }

    public function connect($post)
    {
        if (isset($_POST['email']) && ($_POST['password'])) {

            //verifier que le membre existe
            //$password = password_hash($_POST['password'],PASSWORD_BCRYPT);


            $hash = $this->userDAO->getHash($_POST['email']);

            $result = $this->userDAO->verificationBDD($_POST['email'],$hash[0]);
            if ($result == true) {

                $role = $this->userDAO->verifyRole($_POST['email']);
                if($role[0] == 'administrator'){
                    $_SESSION['user'] = 'admin' ;



                    $this->view->render('admin/back-office', [
                    ]);
                }
                else if($role[0] == 'member'){
                    $_SESSION['user'] = 'membre' ;

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
            $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
            $this->userDAO->addUser($_POST['email'],$password,$_POST['username']);

            $this->view->render('home', [
            ]);

        }
        else {

            $this->view->render('register', [
            ]);
        }
    }
    public function deconnect()
    {

        unset($_SESSION['user']);
        $this->view->render('home', [
        ]);
    }
}










