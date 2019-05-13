<?php

namespace App\src\controller;

use App\src\DAO\ArticleDAO;
use App\src\model\View;
use App\src\DAO\CommentDAO;
use App\src\DAO\UserDAO;


class BackController
{
    private $view;
    private $articleDAO;
    private $commentDAO;
    private $userDAO;

    public function __construct()
    {
        $this->articleDAO = new ArticleDAO();
        $this->view = new View();
        $this->commentDAO = new CommentDAO();
        $this->userDAO = new UserDAO();
    }


    public function adminArticle()
    {
        if (isset($_SESSION['user']['role']) == 'admin') {
            $articles = $this->articleDAO->getArticles();


            $this->view->render('admin/adminArticle', [
                'articles' => $articles,

            ]);
        }
    }

    public function editArticle()
    {
        if (isset($_SESSION['user']['role']) == 'admin') {
            if (isset($_GET['id'])) {
                $blogpost = $this->articleDAO->getArticle($_GET['id']);
                $authors = $this->userDAO->getAuthor();
                $this->view->render('admin/editArticle', [
                    'blogpost' => $blogpost,
                    'authors' => $authors
                ]);
            } else {
                $this->view->render('home', [
                ]);
            }
        }

    }

    public function updatePost($post)
    {
        if (isset($_SESSION['user']['role']) == 'admin') {


            if (isset($post['submit'])) {
                $id = $_POST['id'];

                $articleDAO = new ArticleDAO();
                $articleDAO->updatePost($_POST['title'], $_POST['content'], $id);
            }
            $this->editArticle($id);


        }
    }


    public function adminCommentaire()
    {
        if (isset($_SESSION['user']['role']) == 'admin') {

            $comments = $this->commentDAO->getCommentsList();
            $this->view->render('admin/adminCommentaire', [
                'comments' => $comments,
            ]);
        }
    }

    public function adminCommentaireWaiting()
    {
        if (isset($_SESSION['user']['role']) == 'admin') {

            $comments = $this->commentDAO->getCommentsWaiting();
            $this->view->render('admin/adminCommentWait', [
                'comments' => $comments,
            ]);

        }
    }

    public function declineComment($id)
    {
        if (isset($_SESSION['user']['role']) == 'admin') {


            $this->commentDAO->declineComment($id);
            $comments = $this->commentDAO->getCommentsWaiting();
            $this->view->render('admin/adminCommentWait', [
                'comments' => $comments,
            ]);

        }
    }

    public function acceptComment($id)
    {
        if (isset($_SESSION['user']['role']) == 'admin') {

            $this->commentDAO->acceptComment($id);
            $comments = $this->commentDAO->getCommentsWaiting();
            $this->view->render('admin/adminCommentWait', [
                'comments' => $comments,
            ]);
        }
    }

    public function addComment()
    {
        if (isset($_POST['content'])) {

            $article_id = $_POST['id'];
            $pseudo = $_SESSION['user']['name'];
            $this->commentDAO->addComment($_POST['content'], $article_id, $pseudo);


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
        if (isset($_SESSION['user']['role']) == 'admin') {

            $privileges = $this->userDAO->getPrivilege();

            $this->view->render('admin/adminDroit', [
                'privileges' => $privileges,
            ]);
        }
    }

    public function declineUser($id)
    {
        if (isset($_SESSION['user']['role']) == 'admin') {
            $this->userDAO->declineUser($id);
            $privileges = $this->userDAO->getPrivilege();
            $this->view->render('admin/adminDroit', [
                'privileges' => $privileges,
            ]);
        }
    }

    public function acceptUser($id)
    {
        if (isset($_SESSION['user']['role']) == 'admin') {
            $this->userDAO->acceptUser($id);
            $privileges = $this->userDAO->getPrivilege();
            $this->view->render('admin/adminDroit', [
                'privileges' => $privileges,
            ]);

        }
    }

    public function requestUser($id)
    {
        if (isset($_SESSION['user']['role']) == 'admin') {
            $this->userDAO->requestUser($id);

            $this->view->render('home', [
            ]);
        }
    }

    public function addArticle($post)
    {
        if (isset($_SESSION['user']['role']) == 'admin') {

            if (isset($post['submit'])) {
                $articleDAO = new ArticleDAO();
                $articleDAO->addArticle($post);

                $articles = $this->articleDAO->getArticles();
                $this->view->render('admin/adminArticle', [
                    'articles' => $articles,
                ]);

            } else {
                $authors = $this->userDAO->getAuthor();
                $this->view->render('admin/add_article', [
                    'authors' => $authors
                ]);
            }


        }
    }

    public function rmArticle($post)
    {
        if (isset($_SESSION['user']['role']) == 'admin') {
            if (empty($_GET)) {
            } else {
                echo $_GET['id'];
            }
            if (isset($_GET['id'])) {
                $articleDAO = new ArticleDAO();
                $articleDAO->rmArticle($post);

            }
            $articles = $this->articleDAO->getArticles();
            $this->view->render('admin/adminArticle', [
                'articles' => $articles,
            ]);
        }
    }

    public function backOffice()
    {
        $nbComments = $this->commentDAO->commentCount();
        $nbArticles = $this->articleDAO->articleCount();
        $nbAdmin = $this->userDAO->adminCount();
        $nbAdminWait = $this->userDAO->adminWaitCount();


        $nbCommentWait = $this->commentDAO->commentWaitCount();
        $nbCommentDone = $this->commentDAO->commentDoneCount();
        $nbCommentDeclined = $this->commentDAO->commentDeclinedCount();

        $nbCommentDonePourcent = ($nbCommentDone * 100) / $nbComments;
        $nbCommentDeclinedPourcent = ($nbCommentDeclined * 100) / $nbComments;
        $nbCommentWaitPourcent = ($nbCommentWait * 100) / $nbComments;

        $this->view->render('admin/back-office', [
            'nbComments' => $nbComments,
            'nbArticles' => $nbArticles,
            'nbAdmin' => $nbAdmin,
            'nbAdminWait' => $nbAdminWait,
            'nbCommentDonePourcent' => $nbCommentDonePourcent,
            'nbCommentDeclinedPourcent' => $nbCommentDeclinedPourcent,
            'nbCommentWaitPourcent' => $nbCommentWaitPourcent
        ]);
    }


}

