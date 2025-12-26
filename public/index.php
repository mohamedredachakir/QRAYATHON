<?php
session_start();

require_once __DIR__ . '/../config/db.php';

$router = require_once __DIR__ . '/../config/rootes.php';

$url = isset($_GET['url']) ? $_GET['url'] : (isset($_GET['page']) ? $_GET['page'] : '');

$requestMethod = $_SERVER['REQUEST_METHOD'];


$router->dispatch($url, $requestMethod);