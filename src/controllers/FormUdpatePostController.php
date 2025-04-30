<?php

class FormUpdatePostController extends Controller
{
    public function index()
    {

        try {
            if ($_SERVER['REQUEST_METHOD'] !== "POST") {
                throw new Exception("méthode de requete non trouvée");
            }

            if (!isset($_POST["post_id"])) {
                throw new Exception('id du post manquant');
            }

            $postId = $_POST['post_id'];
            $post = PostRepositorie::getPostById($postId);

            if (!$post) {
                throw new Exception("Post manquant");
            }

            include_once "../views/updatePost.php";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
