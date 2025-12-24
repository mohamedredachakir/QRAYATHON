<?php


$page = $_GET['page'] ?? 'home';

switch($page){
    case 'home':
        require_once '../app/Controllers/HomeController.php';
        break;
    case 'login':
    case 'register':
        require_once '../app/Controllers/AuthController.php';
        break;
    case 'books':
        require_once '../app/Controllers/BookController.php';
        break;
    case 'profile':
        require_once '../app/Controllers/ProfileController.php';
        break;
    default:
        require_once '../views/errors/404.php';
}
