<?php

namespace App\src\controller;

use App\src\DAO\ArticleDAO;
use App\src\model\View;
use App\src\model\UserDAO;

class BackController
{
    private $view;
    private $articleDAO;
    private $userDAO;
    
    public function __construct()
    {
        $this->articleDAO = new ArticleDAO();
        $this->view = new View();
    }

    public function adminArticle()
    {
        if(isset($_SESSION['admin']) == 'true') {
            $this->view->render('admin/adminArticle', [
            ]);
        }
    }
    public function adminCommentaire()
    {
        if(isset($_SESSION['admin']) == 'true') {
            $this->view->render('admin/adminCommentaire', [
            ]);
        }
    }
    public function adminDroit()
    {
        if(isset($_SESSION['admin']) == 'true') {
            $this->view->render('admin/adminDroit', [
            ]);
        }
    }



    public function addArticle($post)
    {
        if(isset($_SESSION['admin']) == 'true') {


            if (isset($post['submit'])) {
                $articleDAO = new ArticleDAO();
                $articleDAO->addArticle($post);
                header('Location: ../public/index.php');
            }
            $this->view->render('admin/add_article', [
                'post' => $post
            ]);
        }
    }

    public function rmArticle($post)
    {
        if(isset($_SESSION['admin']) == 'true') {
            if(empty($_POST)){ }
            else { echo $_POST['id'];}

            if(isset($_POST['id'])) {
                $articleDAO = new ArticleDAO();
                $articleDAO->rmArticle($post);

                header('Location: ../public/index.php');
            }
            $articles = $this->articleDAO->getArticles();

            $this->view->render('admin/remove_article', [
                'articles' => $articles,
            ]);
        }

    }













}