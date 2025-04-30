<?php
session_start();

class LoginController extends Controller
{
    public function index()
    {
        $error = [];
        try {
            if ($_SERVER['REQUEST_METHOD'] !== "POST") {
                throw new Exception("Requete manquante");
            }
            if (!isset($_POST['email-log']) || !isset($_POST['password-log'])) {
                throw new Exception("Veuillez remplir tous les champs");
            }
            $email = $_POST['email-log'];
            $password = $_POST['password-log'];
            $user = UserRepositorie::getUserByEmail($email);

            if ($user && $user->getPassword() === $password) {
                $_SESSION['user_id'] = $user->getId();
                $_SESSION['user_nom'] = $user->getNom();
                $_SESSION['user_prenom'] = $user->getPrenom();
                header('Location: wall');
                exit();
            } else {
                $error[] =  "Mauvaise combinaison email et mot de passe";
            }
        } catch (Exception $e) {
            $e->getMessage();
        }
        include_once '../views/login.php';
    }
}
