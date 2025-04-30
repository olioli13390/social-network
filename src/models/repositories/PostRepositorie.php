<?php

class PostRepositorie extends Db
{

    private static function request($request, $params = [])
    {
        $result = self::getInstance()->prepare($request);
        $result->execute($params);
        return $result;
    }
    
    public static function getPost()
    {
        $sql = "SELECT p.id AS post_id, p.title, p.content, p.created_at, p.user_id, u.nom, u.prenom
                FROM post AS p
                JOIN user AS u ON p.user_id = u.id
                ORDER BY p.created_at DESC";
        return self::request($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getPostById($postId)
    {
        $sql = "SELECT p.id AS post_id, p.title, p.content, p.created_at, p.user_id, u.nom, u.prenom
                FROM post AS p
                JOIN user AS u ON p.user_id = u.id
                WHERE p.id = :id";
        $params = [':id' => $postId];
        return self::request($sql, $params)->fetch(PDO::FETCH_ASSOC);
    }

    public static function createPost(Post $post)
    {
        $sql = "INSERT INTO post (title, content, user_id) VALUES (:title, :content, :user_id)";
        $params = [
            ':title' => $post->getTitle(),
            ':content' => $post->getContent(),
            ':user_id' => $post->getUser_id(),
        ];
        return self::request($sql, $params);
    }

    public static function deletePost($postId)
    {
        $sql = "DELETE FROM post WHERE id = :id";
        $params = [":id" => $postId];
        return self::request($sql, $params);
    }

    public static function updatePost($postId, $title, $content)
    {
        $sql = "UPDATE post SET title = :title, content = :content WHERE id = :id";
        $params = [
            ':title' => $title,
            ':content' => $content,
            ':id' => $postId
        ];
        return self::request($sql, $params);
    }
}
