

<?php 
class user {
    private $conn;
    public function __construct($conn)
    {
      $this->conn = $conn;
    }

    public function create($fn,$ls,$email,$password,$role){
        $sql = "INSER INTO users (firstName,lastName,email,password,role)
                VALUES (:firstName,:lastName,:email,:password,:role)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':firstName' => $fn,
            ':lastName' => $ls,
            ':email' => $email,
            ':password' => $password,
            ':role' => $role
        ]);
    }

    public function getbyemail($email){
        $sql = "SELECT * FROM user where email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>