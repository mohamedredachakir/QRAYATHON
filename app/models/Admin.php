<?php

require_once __DIR__ . '/User.php';

class Admin extends User {
    
    
    public function __construct($db) {
        parent::__construct($db);
        $this->role = 'admin';
    }

    
    public function getDashboardStats() {
        $stats = [];
        
        
        $query = "SELECT COUNT(*) as count FROM books";
        $stmt = $this->conn->query($query);
        $stats['total_books'] = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
        
        
        $query = "SELECT COUNT(*) as count FROM books WHERE status = 'available'";
        $stmt = $this->conn->query($query);
        $stats['available_books'] = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
        
       
        $query = "SELECT COUNT(*) as count FROM books WHERE status = 'borrowed'";
        $stmt = $this->conn->query($query);
        $stats['borrowed_books'] = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
        
       
        $query = "SELECT COUNT(*) as count FROM users WHERE role = 'reader'";
        $stmt = $this->conn->query($query);
        $stats['total_readers'] = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
        
        
        $query = "SELECT COUNT(*) as count FROM borrows WHERE returnDate IS NULL";
        $stmt = $this->conn->query($query);
        $stats['active_borrows'] = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
        
       
        $query = "SELECT COUNT(*) as count FROM borrows";
        $stmt = $this->conn->query($query);
        $stats['total_borrows'] = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
        
        return $stats;
    }

   
    public function getAllBorrows() {
        $query = "SELECT b.*, 
                         bk.title, bk.author,
                         u.firstName, u.lastName, u.email
                  FROM borrows b
                  JOIN books bk ON b.bookId = bk.id
                  JOIN users u ON b.readerId = u.id
                  ORDER BY b.borrowDate DESC";
        
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

  
    public function getActiveBorrows() {
        $query = "SELECT b.*, 
                         bk.title, bk.author,
                         u.firstName, u.lastName, u.email
                  FROM borrows b
                  JOIN books bk ON b.bookId = bk.id
                  JOIN users u ON b.readerId = u.id
                  WHERE b.returnDate IS NULL
                  ORDER BY b.borrowDate DESC";
        
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function getRecentBorrows($limit = 10) {
        $query = "SELECT b.*, 
                         bk.title, bk.author,
                         u.firstName, u.lastName
                  FROM borrows b
                  JOIN books bk ON b.bookId = bk.id
                  JOIN users u ON b.readerId = u.id
                  ORDER BY b.borrowDate DESC
                  LIMIT :limit";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function promoteToAdmin($userId) {
        $query = "UPDATE users SET role = 'admin' WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $userId);
        
        return $stmt->execute();
    }

    
    public function demoteToReader($userId) {
        $query = "UPDATE users SET role = 'reader' WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $userId);
        
        return $stmt->execute();
    }

   
    public function deleteUser($userId) {
        
        $query = "SELECT COUNT(*) as count FROM borrows 
                  WHERE readerId = :id AND returnDate IS NULL";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $userId);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result['count'] > 0) {
            return false; 
        }
        
        
        return $this->delete($userId);
    }
}