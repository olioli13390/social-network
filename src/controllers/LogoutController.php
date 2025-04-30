<?php

class LogoutController extends Controller
{
    public function index()
    {
        include_once '../views/main.php';
        try {
            if ($_SERVER['REQUEST_METHOD'] !== "POST") {
            }
            session_destroy();
            header('Location: login');
            exit();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

