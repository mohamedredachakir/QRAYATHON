<?php

session_start();
include __DIR__ . "/../config/db.php";

$uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
$uri = trim($uri , '/');

$routes = [
    "home" => "home.php",
    "books" => "books.php",
    "discrbook" => "discrbook.php",
    "panier" => "panier.php",
    "profile" => "profile.php",
    "signup" => "auth/signup.php",
    "signin" => "auth/signin.php"
];

if(array_key_exists($uri,$routes)){
    require __DIR__ . "/../app/controller/" . $routes[$uri];
}else{
    require __DIR__ . "/../views/404.php";
}

