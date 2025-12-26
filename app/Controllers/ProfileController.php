
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
        if ($_SESSION['role'] === 'admin') {
            $admin = new Admin($this->db);
            $stats = $admin->getDashboardStats();
            
        } else {
            $reader = new Reader($this->db);
            $borrows = $reader->getMyBorrows($_SESSION['user_id']);
           
        }
    }
}
?>