<?php

class User {
    protected $conn;
    protected $table = "users";

  
    public $id;
    public $firstName;
    public $lastName;
    public $email;
    public $password;
    public $role;

    
    public function __construct($db) {
        $this->conn = $db;
    }

    
    public function getConnection() {
        return $this->conn;
    }

    
    public function findByEmail($email) {
        $query = "SELECT * FROM " . $this->table . " WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
        return null;
    }

    
    public function findById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
        return null;
    }

   
    public function create($firstName, $lastName, $email, $password, $role = 'reader') {
        $query = "INSERT INTO " . $this->table . " 
                  (firstName, lastName, email, password, role) 
                  VALUES (:firstName, :lastName, :email, :password, :role)";
        
        $stmt = $this->conn->prepare($query);
        
      
        $firstName = htmlspecialchars(strip_tags($firstName));
        $lastName = htmlspecialchars(strip_tags($lastName));
        $email = htmlspecialchars(strip_tags($email));
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
       
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':role', $role);
        
        if ($stmt->execute()) {
            return $this->conn->lastInsertId();
        }
        
        return false;
    }

    
    public function update($id, $firstName, $lastName, $email) {
        $query = "UPDATE " . $this->table . " 
                  SET firstName = :firstName, 
                      lastName = :lastName, 
                      email = :email 
                  WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        
        $firstName = htmlspecialchars(strip_tags($firstName));
        $lastName = htmlspecialchars(strip_tags($lastName));
        $email = htmlspecialchars(strip_tags($email));
        
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':email', $email);
        
        return $stmt->execute();
    }

   
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        
        return $stmt->execute();
    }

    
    public function getAll() {
        $query = "SELECT id, firstName, lastName, email, role FROM " . $this->table . " ORDER BY firstName ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function verifyPassword($inputPassword, $hashedPassword) {
        return password_verify($inputPassword, $hashedPassword);
    }
}