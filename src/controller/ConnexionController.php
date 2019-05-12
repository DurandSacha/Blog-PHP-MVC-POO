<?php

namespace App\src\controller;

use App\src\DAO\UserDAO;
use App\src\model\View;
use App\src\DAO\CommentDAO;
use App\src\DAO\ArticleDAO;

class ConnexionController
{
    private $view;
    private $userDAO;
    private $commentDAO;
    private $articleDAO;

    public function __construct()
    {
        $this->view = new View();
        $this->userDAO = new UserDAO();
        $this->commentDAO = new CommentDAO();
        $this->articleDAO = new ArticleDAO();
    }

    public function connect($post)
    {

        if (isset($_POST['email']) && ($_POST['password'])) {

            $hash = $this->userDAO->getHash($_POST['email']);
            if (password_verify($_POST['password'], $hash[0])) {

                $result = $this->userDAO->verificationBDD($_POST['email'], $hash[0]);
                if ($result == true) {

                    $role = $this->userDAO->verifyRole($_POST['email']);
                    if ($role[0] == 'administrator') {

                        $sessionRole = 'admin';


                        $nbComments = $this->commentDAO->commentCount();
                        $nbArticles = $this->articleDAO->articleCount();
                        $nbAdmin = $this->userDAO->adminCount();
                        $nbAdminWait = $this->userDAO->adminWaitCount();

                        $this->view->render('admin/back-office', [
                            'nbComments' => $nbComments,
                            'nbArticles' => $nbArticles,
                            'nbAdmin' => $nbAdmin,
                            'nbAdminWait' => $nbAdminWait
                        ]);


                    } else if ($role[0] == 'member') {

                        $sessionRole = "membre";


                        $this->view->render('home', [
                        ]);
                    }
                }

                $username = $this->userDAO->getName($_POST['email']);
                $id = $this->userDAO->getUserId($_POST['email']);

                unset($_SESSION['user']);
                $_SESSION['user'] = ['role' => $sessionRole, 'name' => $username, 'id' => $id];

            } else {
                $this->view->render('connect', [

                ]);
            }
        } else {
            $this->view->render('connect', [
            ]);
        }
    }

    public function register($post)
    {
        if (isset($_POST['email']) && ($_POST['username']) && ($_POST['password'])) {
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $this->userDAO->addUser($_POST['email'], $password, $_POST['username']);

            $this->view->render('home', [
            ]);

        } else {

            $this->view->render('register', [
            ]);
        }
    }

    public function deconnect()
    {

        session_destroy();
        unset($_SESSION['user']);

        $this->view->render('home', [
        ]);
    }
}










