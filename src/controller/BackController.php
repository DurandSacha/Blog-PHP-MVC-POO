<?php

namespace App\src\controller;

use App\src\DAO\ArticleDAO;
use App\src\model\View;
use App\src\DAO\CommentDAO;


class BackController
{
    private $view;
    private $articleDAO;
    private $commentDAO;

    public function __construct()
    {
        $this->articleDAO = new ArticleDAO();
        $this->view = new View();
        $this->commentDAO = new CommentDAO();
    }


    public function adminArticle()
    {
        if (isset($_SESSION['user']) == 'admin') {
            $articles = $this->articleDAO->getArticles();

            $blogpost = $this->articleDAO->getArticle(1);

            $this->view->render('admin/adminArticle', [
                'articles' => $articles,
                'blogpost' => $blogpost,
            ]);
        }
    }

    public function editArticle($id)
    {
        if (isset($_SESSION['user']) == 'admin') {
            if (isset($_GET['id'])){
                $blogpost = $this->articleDAO->getArticle($_GET['id']);
                $this->view->render('admin/editArticle', [
                    'blogpost' => $blogpost
                ]);
            }
            else{
                $this->view->render('home', [
                ]);
            }
        }

    }
    public function updatePost($post)
    {
        if (isset($_SESSION['user']) == 'admin') {


            if (isset($post['submit'])) {
                $id = $_POST['id'];

                $articleDAO = new ArticleDAO();
                $articleDAO->updatePost($_POST['title'],$_POST['content'],$_POST['author'],$id);
            }
            $this->editArticle($id);


        }
    }


    public function adminCommentaire()
    {
        if (isset($_SESSION['user']) == 'admin') {

            $comments = $this->commentDAO->getCommentsList();
            $this->view->render('admin/adminCommentaire', [
               'comments' => $comments,
            ]);
        }
    }
    public function adminCommentaireWaiting()
    {
        if (isset($_SESSION['user']) == 'admin') {

            $comments = $this->commentDAO->getCommentsWaiting();
            $this->view->render('admin/adminCommentWait', [
                'comments' => $comments,
            ]);

        }
    }

    public function declineComment($get)
    {
        if (isset($_SESSION['user']) == 'admin') {

            $comments = $this->commentDAO->getCommentsWaiting();
            $this->commentDAO->declineComment($get);
            $this->view->render('admin/adminCommentWait', [
                'comments' => $comments,
            ]);

        }
    }
    public function acceptComment($get)
    {
        if (isset($_SESSION['user']) == 'admin') {
            $comments = $this->commentDAO->getCommentsWaiting();
            $this->commentDAO->acceptComment($get);
            $this->view->render('admin/adminCommentWait', [
                'comments' => $comments,
            ]);
        }

    }
    public function addComment($post)
    {
        if (isset($_POST['content'])){

            $article_id = $_POST['id'];
            $pseudo = $_SESSION['name'];
            $this->commentDAO->addComment($_POST['content'], $article_id, $pseudo['username']);


        }
        $article = $this->articleDAO->getArticle($article_id);
        $comments = $this->commentDAO->getCommentsFromArticle($article_id);
        $this->view->render('single', [
            'article' => $article,
            'comments' => $comments
        ]);

    }



    public function adminDroit()
    {
        if (isset($_SESSION['user']) == 'admin') {
            $this->view->render('admin/adminDroit', [
            ]);
        }
    }

    public function adminProjet()
    {
        if (isset($_SESSION['user']) == 'admin') {
            $this->view->render('admin/adminProjet', [
            ]);
        }
    }

    public function addArticle($post)
    {
        if (isset($_SESSION['user']) == 'admin') {
            $articles = $this->articleDAO->getArticles();

            if (isset($post['submit'])) {
                $articleDAO = new ArticleDAO();
                $articleDAO->addArticle($post);

                $this->view->render('admin/adminArticle', [
                    'articles' => $articles,
                ]);
            }
            $this->view->render('admin/add_article', [
                'post' => $post
            ]);
        }
    }

    public function rmArticle($post)
    {
        if (isset($_SESSION['user']) == 'admin') {
            if (empty($_GET)) {
            } else {
                echo $_GET['id'];
            }
            $articles = $this->articleDAO->getArticles();
            if (isset($_GET['id'])) {
                $articleDAO = new ArticleDAO();
                $articleDAO->rmArticle($post);

                $this->view->render('admin/adminArticle', [
                    'articles' => $articles,
                ]);

            }
            $this->view->render('admin/adminArticle', [
                'articles' => $articles,
            ]);
        }
    }

    public function backOffice(){
        $this->view->render('admin/back-office', [

        ]);
    }


}