

<?php 
require_once '../app/Models/User.php';

class authservice{
    private $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function signup($fn,$ls,$email,$role,$password){
        $user = new user($this->conn);
        return $user->create($fn,$ls,$email,$role,$password);
    }
}
?>