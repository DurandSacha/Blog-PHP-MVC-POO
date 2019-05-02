<?php

namespace App\src\DAO;

use App\src\model\Article;

class ArticleDAO extends DAO
{
    public function getArticles()
    {
        $sql = 'SELECT id, title, content, author, date_added FROM article ORDER BY id DESC';
        $result = $this->sql($sql);
        $articles = [];
        foreach ($result as $row) {
            $articleId = $row['id'];
            $articles[$articleId] = $this->buildObject($row);
        }
        return $articles;
    }

    public function getArticle($idArt)
    {
        $sql = 'SELECT id, title, content, author, date_added FROM article WHERE id = ?';
        $result = $this->sql($sql, [$idArt]);
        $row = $result->fetch();
        if($row) {
            return $this->buildObject($row);
        } 
        echo 'Aucun article existant avec cet identifiant :(';
    }

    public function addArticle($article)
    {
        //Permet de récupérer les variables $title, $content et $author
        extract($article);

        $sql = 'INSERT INTO article (title, content, author, date_added) VALUES (?, ?, ?, NOW())';
        $this->sql($sql, [$title, $content, $author]);
    }

    public function rmArticle($id)
    {
        $sql = 'DELETE FROM article WHERE id=?';
        $this->sql($sql,[$id]);
    }

    public function updatePost($title,$content,$author,$id)
    {
        $sql = 'UPDATE article SET title= ?, content= ?, author = ?, date_added = NOW() WHERE id=?;';
        $this->sql($sql,[$title, $content, $author, $id]);

    }

    public function articleCount()
    {
        $sql = 'SELECT * FROM article';
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
        $article->setContent($row['content']);
        $article->setDateAdded($row['date_added']);
        $article->setAuthor($row['author']);
        return $article;
    }
}
