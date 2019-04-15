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
        if (isset($_SESSION['user']) == 'admin') {
            $articles = $this->articleDAO->getArticles();

            $this->view->render('admin/adminArticle', [
                'articles' => $articles,
            ]);
        }
    }

    public function adminCommentaire()
    {
        if (isset($_SESSION['user']) == 'admin') {
            $this->view->render('admin/adminCommentaire', [
            ]);
        }
    }

    public function adminDroit()
    {
        if (isset($_SESSION['user']) == 'admin') {
            $this->view->render('admin/adminDroit', [
            ]);
        }
    }


    public function addArticle($post)
    {
        if (isset($_SESSION['user']) == 'admin') {


            if (isset($post['submit'])) {
                $articleDAO = new ArticleDAO();
                $articleDAO->addArticle($post);
                header('Location: ../public/index.php');
            }
            $this->view->render('admin/admin/adminArticle', [
                'post' => $post
            ]);
        }
    }

    public function rmArticle($post)
    {
        if (isset($_SESSION['user']) == 'admin') {
            if (empty($_POST)) {
            } else {
                echo $_POST['id'];
            }

            if (isset($_POST['id'])) {
                $articleDAO = new ArticleDAO();
                $articleDAO->rmArticle($post);

                header('Location: ../public/index.php');
            }
            $articles = $this->articleDAO->getArticles();

            $this->view->render('admin/adminArticle', [
                'articles' => $articles,
            ]);
        }
    }

    public function editArticle($idArt)
    {
        if (isset($_SESSION['user']) == 'admin') {

            $article = $this->articleDAO->getArticle($idArt);
            $articles = $this->articleDAO->getArticles();

            $this->view->render('admin/adminArticle', [
                'articles' => $articles,
                'article' => $article
            ]);

        }

        //update date mise a jour


    }


}