
<?php 

require_once __DIR__ . '/../Models/Reader.php';
require_once __DIR__ . '/../Models/Admin.php';

class ProfileController {
    private $db;
    
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }
    
    public function index() {
        if ($_SESSION['user']['role'] === 'admin') {
            $admin = new Admin($this->db);
            $stats = $admin->getDashboardStats();
            $totalBorrowed = $stats['total_borrowed'] ?? 0;
            $totalUsers = $stats['total_users'] ?? 0;
            $totalBooks = $stats['total_books'] ?? 0;
            require_once './../views/profile/admin.php';
            
        } else {
            $reader = new Reader($this->db);
            $borrows = $reader->getMyBorrows($_SESSION['user']['id']);
           
        }
    }
}
?>