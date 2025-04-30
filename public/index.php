<?php

// ROUTER
require_once '../core/Router.php';
require_once '../src/models/Db.php'; 

// REPO
require_once '../src/models/repositories/UserRepositorie.php';
require_once '../src/models/repositories/PostRepositorie.php';

// MODELS
require_once '../src/models/User.php';
require_once '../src/models/Post.php';

// CONTROLLERS
require_once '../src/controllers/Controller.php';
require_once '../src/controllers/RegisterController.php';
require_once '../src/controllers/LoginController.php';
require_once '../src/controllers/SuccessController.php';
require_once '../src/controllers/WallController.php';
require_once '../src/controllers/PostController.php';
require_once '../src/controllers/FormUdpatePostController.php';
require_once '../src/controllers/UpdatePostController.php';
require_once '../src/controllers/DeletePostController.php';
require_once '../src/controllers/LogoutController.php';





$router = new Router();
$router->start();
