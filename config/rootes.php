<?php

class Router {
    private $routes = [];
    
    public function get($path, $controller, $method) {
        $this->routes['GET'][$path] = ['controller' => $controller, 'method' => $method];
    }
    
    public function post($path, $controller, $method) {
        $this->routes['POST'][$path] = ['controller' => $controller, 'method' => $method];
    }
    
    public function dispatch($url, $requestMethod) {
        
        $url = trim($url, '/');
        if (empty($url)) {
            $url = 'home';
        }
        
        
        if (isset($this->routes[$requestMethod][$url])) {
            $route = $this->routes[$requestMethod][$url];
            $controllerName = $route['controller'];
            $methodName = $route['method'];
            
           
            $controllerFile = __DIR__ . '/../app/Controllers/' . $controllerName . '.php';
            
            if (file_exists($controllerFile)) {
                require_once $controllerFile;
                $controller = new $controllerName();
                
                if (method_exists($controller, $methodName)) {
                    $controller->$methodName();
                } else {
                    $this->show404();
                }
            } else {
                $this->show404();
            }
        } else {
            $this->show404();
        }
    }
    
    private function show404() {
        http_response_code(404);
        require_once __DIR__ . '/../views/errors/404.php';
    }
}


$router = new Router();


$router->get('home', 'HomeController', 'index');
$router->get('', 'HomeController', 'index');


$router->get('login', 'AuthController', 'showLogin');
$router->post('login', 'AuthController', 'login');
$router->get('register', 'AuthController', 'showRegister');
$router->post('register', 'AuthController', 'register');
$router->get('logout', 'AuthController', 'logout');


$router->get('books', 'BookController', 'index');
$router->get('books/details', 'BookController', 'details');
$router->get('books/add', 'BookController', 'add'); 
$router->post('books/add', 'BookController', 'add');
$router->post('books/edit', 'BookController', 'edit');
$router->post('books/delete', 'BookController', 'delete');


$router->post('borrow/create', 'BorrowController', 'create');
$router->post('borrow/return', 'BorrowController', 'returnBook');
$router->get('myborrows', 'BorrowController', 'myBorrows');


$router->get('profile', 'ProfileController', 'index');

return $router;