<?php

namespace App\src\controller;

use App\src\DAO\ArticleDAO;
use App\src\model\View;

class BackController
{
    private $view;
    private $articleDAO;
    
    public function __construct()
    {
        $this->articleDAO = new ArticleDAO();
       
        $this->view = new View();
    }

    public function addArticle($post)
    {
        if(isset($post['submit'])) {
            $articleDAO = new ArticleDAO();
            $articleDAO->addArticle($post);
            header('Location: ../public/index.php');
        }
        $this->view->render('add_article', [
            'post' => $post
        ]);
    }

    public function rmArticle($post)
    {
        if(empty($_POST)){ echo 'Pas de variable POST';}
        else { echo $_POST['id'];}

        if(isset($_POST['id'])) {
            $articleDAO = new ArticleDAO();
            $articleDAO->rmArticle($post);
    
            header('Location: ../public/index.php');
        }
        
        $articles = $this->articleDAO->getArticles();
        
        $this->view->render('remove_article', [
            'articles' => $articles,
        ]);
    }



}