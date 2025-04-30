<?php
class WallController extends Controller
{
    public function index()
    {
        $posts = PostRepositorie::getPost();
        include_once '../views/wall.php';
    }
}
