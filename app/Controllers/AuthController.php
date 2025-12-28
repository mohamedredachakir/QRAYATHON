<?php

 require_once './../app/Models/User.php'; 
 require_once './../config/db.php'; 

class AuthController {
    private $db;
    private $user;
    
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }
    
   
    public function showRegister() {
        require_once __DIR__ . '/../../views/auth/register.php';
    }
    
 
    public function showLogin() {
        require_once __DIR__ . '/../../views/auth/login.php';
    }
    
   
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /register');
            exit();
        }
        
  
        $errors = [];
        
        if (empty($_POST['firstName'])) {
            $errors[] = "First name is required";
        }
        
        if (empty($_POST['lastName'])) {
            $errors[] = "Last name is required";
        }
        
        if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Valid email is required";
        }
        
        if (empty($_POST['password']) || strlen($_POST['password']) < 4) {
            $errors[] = "Password must be at least 6 characters";
        }
        
   
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            dd($errors);
            header('Location: /404');
            exit();
        }
        
   
        $firstName = htmlspecialchars(trim($_POST['firstName']));
        $lastName = htmlspecialchars(trim($_POST['lastName']));
        $email = htmlspecialchars(trim($_POST['email']));
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $role = "reader"; 
        
        
        $checkQuery = "SELECT id FROM users WHERE email = :email";
        $checkStmt = $this->db->prepare($checkQuery);
        $checkStmt->bindParam(':email', $email);
        $checkStmt->execute();
        
        if ($checkStmt->rowCount() > 0) {
            $_SESSION['error'] = "Email already exists";
            dd($checkStmt);
            header('Location: index.php?page=register');
            exit();
        }
        
     
        $query = "INSERT INTO users (firstName, lastName, email, password, role) 
                  VALUES (:firstName, :lastName, :email, :password, :role)";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);
        
        if ($stmt->execute()) {
            $_SESSION['success'] = "Registration successful! Please login.";
            header('Location: index.php?page=login');
            exit();
        } else {
            $_SESSION['error'] = "Registration failed. Please try again.";
            header('Location: /register');
            exit();
        }
    }
    
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /login');
            exit();
        }
        
 
        if (empty($_POST['email']) || empty($_POST['password'])) {
            $_SESSION['error'] = "Email and password are required";
            header('Location: /login');
            exit();
        }
        
        $email = htmlspecialchars(trim($_POST['email']));
        $password = $_POST['password'];
        
     
        $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        if ($stmt->rowCount() === 0) {
            $_SESSION['error'] = "Invalid email or password";
            header('Location: /login');
            exit();
        }
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
       
        if (!password_verify($password, $user['password'])) {
            $_SESSION['error'] = "Invalid email or password";
            header('Location: /login');
            exit();
        }
        
     
        $_SESSION['user'] = $user;
        
        $_SESSION['success'] = "Welcome back, " . $user['firstName'] . "!";
        
      
        if ($user['role'] === 'admin') {
            header('Location: index.php?page=profile');
            exit();
        } else {
            header('Location: index.php?page=profile');
            exit();
        }
    }
    
   
    public function logout() {
       
        $_SESSION = [];
        
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        
        session_destroy();
        
        
        header('Location: /login');
        exit();
    }
    
    
    public static function checkAuth() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }
    }
    
   
    public static function checkAdmin() {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            header('Location: /profile');
            exit();
        }
    }
    
   
    public static function checkReader() {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'reader') {
            header('Location: /profile');
            exit();
        }
    }
}