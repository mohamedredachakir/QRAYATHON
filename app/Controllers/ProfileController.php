<?php 

require_once __DIR__ . '/../Models/Reader.php';
require_once __DIR__ . '/../Models/Admin.php';

class ProfileController {
    private $db;
    
    public function __construct() {
        
        require_once __DIR__ . '/../../config/db.php';
        global $conn;
        $this->db = $conn;
    }
    
    public function index() {
        if (session_status() === PHP_SESSION_NONE) session_start();

        if (!isset($_SESSION['user'])) {
            header("Location: index.php?url=login");
            exit();
        }

        if ($_SESSION['user']['role'] === 'admin') {
            $admin = new Admin($this->db);
            $stats = $admin->getDashboardStats();
            $totalBooks = $stats['total_books'];
            $availableBooks = $stats['available_books'];
            $totalBorrowed = $stats['active_borrows']; 
            $totalUsers = $stats['total_readers'];
            require_once __DIR__ . '/../../views/profile/admin.php';
            
        } else {
           
            $reader = new Reader($this->db);
            $userId = $_SESSION['user']['id']; 
            
            
            $borrows = $reader->getMyBorrows($userId);
            
            
            require_once __DIR__ . '/../../views/profile/reader.php';
        }
    }
}