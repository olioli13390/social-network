<?php

class PostController extends Controller
{
    public function index()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                if (!isset($_POST['titre']) || empty($_POST['title'])) {
                    throw new Exception("titre manquant");
                }

                if (empty($_POST['message'])) {
                    throw new Exception("contenu manquant");
                }

                $title = $_POST["title"];
                $message = $_POST["message"];
                $author = $_SESSION["user_id"];
                $post = new Post($title, $message, $author);
                PostRepositorie::createPost($post);
                header('Location: wall');
                exit();
            }
        } catch (Exception $e) {
            $e->getMessage();
        }
        include_once "../views/wall.php";
    }
}
