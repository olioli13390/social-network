<?php

class RegisterController extends Controller
{
    public function index()
    {
        $error = [];

        try {
            if ($_SERVER['REQUEST_METHOD'] === "POST") {
                if (!isset($_POST['LastName'])) {
                    $LastName = null;
                } else {
                    $LastName = $_POST['LastName'];
                    if (!preg_match('/^[a-zA-Z\s]+$/', $LastName)) {
                        $error[] = "Nom invalide doit contenir seulement des lettres.";
                    }
                }
                if (!isset($_POST['FirstName'])) {
                    $FirstName = null;
                } else {
                    $FirstName = $_POST['FirstName'];
                    if (!preg_match('/^[a-zA-Z\s]+$/', $FirstName)) {
                        $error[] = "Prénom invalide doit contenir seulement des lettres.";
                    }
                }
                if (!isset($_POST['email'])) {
                    $email = null;
                } else {
                    $email = $_POST['email'];
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $error[] = "Email invalide.";
                    }
                }
                if (!isset($_POST['password'])) {
                    $password = null;
                } else {
                    $password = $_POST['password'];
                    if (!preg_match('/^[a-zA-Z0-9]+$/', $password)) {
                        $error[] = "Mot de passe invalide.";
                    }
                }
                
                if (empty($error)) {
                    $user = new User(0, $LastName, $FirstName, $email, $password);
                    UserRepositorie::postUser($user);
                    header('Location: success');
                    exit();
                } else {
                    include_once '../views/register.php';
                    return $error;
                }
            }
        } catch (PDOException $e) {
            if ($e->getCode() == 23000 && strpos($e->getMessage(), 'user.email_UNIQUE') !== false) {
                $error[] = "Cet email est déjà utilisé. Veuillez en choisir un autre.";
            }
        } catch (Exception $e) {
            $error[] = $e->getMessage();
        }
        include_once '../views/register.php';
    }
}
