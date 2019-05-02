<?php

namespace App\src\DAO;

use App\src\model\Comment;

class CommentDAO extends DAO
{
    public function getCommentsFromArticle($idArt)
    {
        $sql = 'SELECT id, pseudo, content, date_added, article_id,status FROM comment WHERE article_id = ? AND status = ? OR status = ?';
        $result = $this->sql($sql, [$idArt, 'Accepted','declined']);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        return $comments;
    }

    public function getCommentsList()
    {
        $sql = 'SELECT * FROM comment';
        $result = $this->sql($sql);

        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }

        return $comments;
    }

    public function getCommentsWaiting()
    {
        $sql = 'SELECT id, pseudo, content, date_added, article_id, status FROM comment WHERE status = ?';
        $result = $this->sql($sql, ['waiting']);

        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        return $comments;
    }

    public function getStatus($idArt)
    {
        $sql = 'SELECT status FROM comment WHERE article_id = ?';
        $result = $this->sql($sql, [$idArt]);
        return $result;
    }

    public function acceptComment($idComment)
    {
        $sql = 'UPDATE comment SET status = ? WHERE id = ?';
        $this->sql($sql, ['Accepted', $idComment]);
    }

    public function declineComment($idComment)
    {
        $sql = 'UPDATE comment SET status = ? WHERE id = ?';
        $this->sql($sql, ['declined', $idComment]);
    }

    public function addComment(string $content, int $article_id, string $pseudo): void
    {

        $sql = 'INSERT INTO comment (pseudo, content, date_added, article_id) VALUES (?,?,NOW(),?)';
        $this->sql($sql, [$pseudo, $content, $article_id]);
    }
    public function commentCount()
    {
        
        $sql = 'SELECT id, pseudo, content, date_added, article_id,status status FROM comment';
        $result = $this->sql($sql);

        $comments = [];
        $x = 0;
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
            $x = $x + 1 ;
        }
        return $x;
    }




    private function buildObject(array $row)
    {
        $comment = new Comment();
        $comment->setId($row['id']);
        $comment->setPseudo($row['pseudo']);
        $comment->setContent($row['content']);
        $comment->setDateAdded($row['date_added']);
        $comment->setArticle_id($row['article_id']);
        $comment->setStatus($row['status']);
        return $comment;
    }
}
