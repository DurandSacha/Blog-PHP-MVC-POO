<?php

namespace App\src\DAO;

use App\src\model\Article;

class ArticleDAO extends DAO
{
    public function getArticles()
    {
        /*$sql = 'SELECT id, title, art_content, user_id, art_date_added FROM article ORDER BY id DESC';*/
        // jointure sur table article , champs user_id
        // recuperer "username" de la table "user"

         $sql = 'SELECT article.id, title, art_content, user.username, art_date_added,user_id
                FROM article
                INNER JOIN user
                ORDER BY article.id DESC';

        $result = $this->sql($sql);

        $articles = [];
        foreach ($result as $row) {
            $articleId = $row['id'];
            $articles[$articleId] = $this->buildObject($row);
            /*var_dump($articles);*/
        }
        return $articles;
    }

    public function getArticle($idArt)
    {
        $sql = 'SELECT article.id, title, art_content, username, art_date_added,user_id  FROM article  INNER JOIN user WHERE article.id = ?';
        $result = $this->sql($sql, [$idArt]);
        $row = $result->fetch();
        if($result) {
            return $this->buildObject($row);
        }
        echo 'Aucun article existant avec cet identifiant :(';
    }

    public function addArticle($article)
    {
        //Permet de récupérer les variables $title, $content et $author
        extract($article);

        $sql = 'INSERT INTO article (title, art_content, user_id, art_date_added) VALUES (?, ?, ?, NOW())';
        $this->sql($sql, [$title, $content, $_SESSION['user']['id'] /*$author*/]);
    }

    public function rmArticle($id)
    {
        $sql = 'DELETE FROM article WHERE id=?';
        $this->sql($sql,[$id]);
    }

    public function updatePost($title,$content,$author,$id)
    {
        $sql = 'UPDATE article SET title= ?, art_content= ?, user_id = ?, art_date_added = NOW() WHERE id=?;';
        $this->sql($sql,[$title, $content, $_SESSION['user']['id'], $id]);

    }

    public function articleCount()
    {
        $sql = 'SELECT article.id, title, art_content, username, art_date_added,user_id
                FROM article
                INNER JOIN user
                ORDER BY id DESC';
        $result = $this->sql($sql);

        $article = [];
        $x = 0;
        foreach ($result as $row) {
            $articleId = $row['id'];
            $article[$articleId] = $this->buildObject($row);
            $x = $x + 1 ;
        }
        return $x;
    }

    // hydratation 
    private function buildObject(array $row)
    {
        $article = new Article();
        $article->setId($row['id']);
        $article->setTitle($row['title']);
        $article->setContent($row['art_content']);
        $article->setDateAdded($row['art_date_added']);
        $article->setUser_id($row['user_id']);
        $article->setUsername($row['username']);
        return $article;
    }
}
