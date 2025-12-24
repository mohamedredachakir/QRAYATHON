

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
    public function signin($email,$password){
        $usermodel = new user($this->conn);
        $user = $usermodel->getbyemail($email);
        if($user && password_verify($password,$user['password'])){
            return $user;
        }
        return false;
    }
}
?>