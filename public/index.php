<?php
session_start();

/**
 * Dump and die.
 *
 * @param $var
 * @return void
 */
function dd(...$var) {
    foreach ($var as $elem) {
        echo '<pre class="codespan">';
        echo '<code>';
        !$elem || $elem == '' ? var_dump($elem) : print_r($elem);
        echo '</code>';
        echo '</pre>';
    }

    die();
}

require_once __DIR__ . '/../config/db.php';

$router = require_once __DIR__ . '/../config/rootes.php';


// dd($_SERVER['REQUEST_URI']);

$url = isset($_GET['url']) ? $_GET['url'] : (isset($_GET['page']) ? $_GET['page'] : '');

$requestMethod = $_SERVER['REQUEST_METHOD'];


$router->dispatch($url, $requestMethod);