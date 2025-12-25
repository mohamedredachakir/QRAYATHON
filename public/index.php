<?php


session_start();


require_once './../app/controller/authcontroller.php';

$auth = new authcontroller();


$page = isset($_GET['page']) ? $_GET['page'] : 'login';


switch($page){
    case 'register' : 
        $auth->register();
        require_once './views/auth/singup.views.php';
        break;
    case 'login' :
        $auth->login(); 
        require_once './views/auth/signin.views.php';
        break;
    case 'logout' : 
        $auth->logout();
        break;
    case 'books' :
        require_once './app/controller/bookcontroller.php';
        require_once './app/models/books.php';
        break;
    default :
        require_once './views/errors/404.php';

};