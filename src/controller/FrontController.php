<?php

namespace App\src\controller;

use App\src\DAO\ArticleDAO;
use App\src\DAO\CommentDAO;
use App\src\model\View;

class FrontController
{
    private $articleDAO;
    private $commentDAO;
    private $view;

    public function __construct()
    {
        $this->articleDAO = new ArticleDAO();
        $this->commentDAO = new CommentDAO();
        $this->view = new View();
    }

    public function home()
    {
        $this->view->render('home', [
            //'articles' => $articles
        ]);
    }

    public function blog()
    {
        $articles = $this->articleDAO->getArticles();
        $this->view->render('blog', [
            'articles' => $articles
        ]);
    }

    public function article($id)
    {
        $article = $this->articleDAO->getArticle($id);
        $comments = $this->commentDAO->getCommentsFromArticle($id);
        $this->view->render('single', [
            'article' => $article,
            'comments' => $comments
        ]);
    }

    public function downloadCv()
    {
        $file_name = "../public/cv.txt";
        header("Content-Disposition: attachment; filename=\"$file_name\"");
    }

    public function contact()
    {
        if (empty($_POST['name']) ||
            empty($_POST['email']) ||
            empty($_POST['phone']) ||   // verifier 10 caractère
            empty($_POST['message']) ||
            !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            echo "No arguments Provided!";
            return false;
        }

        ini_set("SMTP", "smtp.gmail.com");
        ini_set("smtp_port", 587); // ou 465
        ini_set("auth_username", "sacha6623@gmail.com");
        ini_set("auth_password", "cmntjbrztvucxrff ");

        $name = strip_tags(htmlspecialchars($_POST['name']));
        $email_address = strip_tags(htmlspecialchars($_POST['email']));
        $phone = strip_tags(htmlspecialchars($_POST['phone']));
        $message = strip_tags(htmlspecialchars($_POST['message']));

        $to = $email_address;
        $email_subject = "Website Contact Form:  $name";

        $email_body = "You have received a new message from your website contact form.\n\n" . "Here are the details:\n\nName: 
    $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";

        $headers = "From: mail@sachadurand.fr\n";
        $headers .= "Reply-To: $email_address";
        mail($to, $email_subject, $email_body, $headers);

        header('Location: ../public/index.php');

        return true;


    }


}



