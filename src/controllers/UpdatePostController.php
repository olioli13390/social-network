<?php

class UpdatePostController extends Controller
{
    public function index()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] !== "POST") {
                throw new Exception("Méthode requete invalide");
            }
            if (!isset($_POST['post_id'])) {
                throw new Exception("Id manquante");
            }

            $postId = $_POST['post_id'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            PostRepositorie::updatePost($postId, $title, $content);
            header('Location: /wall');
            exit();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
