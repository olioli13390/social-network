<?php

class DeletePostController extends Controller
{
    public function index()
    {


        try {
            if ($_SERVER['REQUEST_METHOD'] !== "POST") {
                throw new Exception("Méthode inaccessible");
            }

            if (!isset($_POST["post_id"])) {
                throw new Exception("Id du poste manquant");
            }

            $postId = $_POST['post_id'];
            PostRepositorie::deletePost($postId);

            header('Location: wall');
            exit();
            include_once "../views/wall.php";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
