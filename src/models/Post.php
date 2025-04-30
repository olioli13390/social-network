<?php

class Post
{
    private $title;
    private $content;
    private $user_id;

    public function __construct($title, $content, $user_id)
    {
        $this->setTitle($title);
        $this->setContent($content);
        $this->setUser_id($user_id);
    }

    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function setContent($content)
    {
        $this->content = $content;
    }
    public function getUser_id()
    {
        return $this->user_id;
    }
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }
}
