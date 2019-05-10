<?php

namespace App\src\model;

class Article
{
    private $id;

    private $title;
    
    private $art_content;
    
    private $user_id;
    
    private $art_date_added;

    
    public function getId()
    {
        return $this->id;
    }

    
    public function setId($id)
    {
        $this->id = $id;
    }

    
    public function getTitle()
    {
        return $this->title;
    }

    
    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setContent($art_content)
    {
        $this->art_content = $art_content;
    }

    public function getContent()
    {
        return $this->art_content;
    }

    public function getUser_id()
    {
        return $this->user_id;
    }

    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }

    public function getDateAdded()
    {
        return $this->art_date_added;
    }

    public function setDateAdded($art_date_added)
    {
        $this->art_date_added = $art_date_added;
    }
}