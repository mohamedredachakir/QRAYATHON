<?php

require_once __DIR__ . '/User.php';

class Reader extends User {
    
  
    public function __construct($db) {
        parent::__construct($db);
        $this->role = 'reader';
    }

   
    public function getAllReaders() {
        $query = "SELECT id, firstName, lastName, email 
                  FROM " . $this->table . " 
                  WHERE role = 'reader' 
                  ORDER BY firstName ASC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

   
    public function getMyBorrows($readerId, $activeOnly = false) {
        $whereClause = $activeOnly ? "AND b.returnDate IS NULL" : "";
        
        $query = "SELECT b.*, 
                         bk.title, bk.author, bk.year
                  FROM borrows b
                  JOIN books bk ON b.bookId = bk.id
                  WHERE b.readerId = :readerId $whereClause
                  ORDER BY b.borrowDate DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':readerId', $readerId);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function getActiveBorrowsCount($readerId) {
        $query = "SELECT COUNT(*) as count 
                  FROM borrows 
                  WHERE readerId = :readerId AND returnDate IS NULL";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':readerId', $readerId);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    }

    
    public function getTotalBorrowedBooks($readerId) {
        $query = "SELECT COUNT(*) as count 
                  FROM borrows 
                  WHERE readerId = :readerId";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':readerId', $readerId);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    }

    
    public function canBorrowBook($readerId, $maxBorrows = 5) {
        $activeCount = $this->getActiveBorrowsCount($readerId);
        return $activeCount < $maxBorrows;
    }
}