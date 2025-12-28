


<?php 

require_once './../app/Models/Borrow.php';

class borrowcontroller {
 public function create() {
    if(session_status() === PHP_SESSION_NONE){ session_start(); }
    
    if(isset($_GET['book_id'])){
      
        require_once __DIR__ . '/../../config/db.php';
        global $conn;

        $bookid = $_GET['book_id'];
        
      

        $userid = $_SESSION['user_id'] ?? ($_SESSION['user']['id'] ?? null);

        if (!$userid) {
            die("Error: User session not found. Please login again.");
        }

        $date = date('Y-m-d H:i:s');

      
        $update = $conn->prepare("UPDATE books SET status = 'borrowed' WHERE id = ? AND status = 'available'");
        $update->execute([$bookid]);

        if($update->rowCount() > 0){
           
            $insert = $conn->prepare("INSERT INTO borrows (readerId, bookId, borrowDate) VALUES (?, ?, ?)");
            $insert->execute([$userid, $bookid, $date]);
            
            header("Location: index.php?url=profile");
            
        } else {
           
            header("Location: index.php?url=books&error=already_borrowed");

        }
    }
}

    public function returnbook() {
        
        if(session_status() === PHP_SESSION_NONE) {session_start();}

        if (isset($_GET['borrow_id']) && isset($_GET['book_id'])){
           require_once __DIR__ . '/../../config/db.php';

            
    $borrowid = $_GET['borrow_id'] ?? null;
    $bookid = $_GET['book_id'] ?? null;
    $returndate = date('Y-m-d H:i:s');

    if ($borrowid && $bookid) {
        
        require_once __DIR__ . '/../../config/db.php';
        global $conn; 

        try {
            
            $conn->beginTransaction();

            
            $updateborrow = $conn->prepare("UPDATE borrows SET returnDate = ? WHERE id = ?");
            $updateborrow->execute([$returndate, $borrowid]);

            

            $updatebook = $conn->prepare("UPDATE books SET status = 'available' WHERE id = ?");
            $updatebook->execute([$bookid]);

           
            $conn->commit();

        
            header("Location: index.php?url=profile&success=returned");
            exit();

        } catch (Exception $e) {
            $conn->rollBack();
            die("Error returning book: " . $e->getMessage());
        }
    } else {
        die("Missing Information: Borrow ID or Book ID is not set.");
    }

            header("Location: /profile");
            exit();
        }
    }
}

?>