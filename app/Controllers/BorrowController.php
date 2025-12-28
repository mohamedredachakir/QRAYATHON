


<?php 

require_once './../app/Models/Borrow.php';

class borrowcontroller {
    public function  create() {
        if(session_status() === PHP_SESSION_NONE){session_start();}

        if(isset($_GET['book_id'])){
            require './config/db.php';
            $bookid = $_GET['book_id'];
            $userid = $_SESSION['user_id'];
            $date = date('y-m-d');

            $update = $conn->prepare("UPDATE books SET status = 'borrowed' WHERE id = ? AND status = 'available'");
            $update->execute([$bookid]);

            if($update->rowCount()>0){
                $insert = $conn->prepare("INSERT INTO borrows (user_id,book_id,borrow_date) VALUES(?,?,?)");
                $insert->execute([$userid,$bookid,$date]);
                header("Location: /profile");
                exit();
            }
        }
    }

    public function returnbook() {
        if(session_status() === PHP_SESSION_NONE) {session_start();}

        if (isset($_GET['borrow_id']) && isset($_GET['book_id'])){
            require './config/db.php';

            $borrowid = $_GET['borrow_id'];
            $bookid = $_GET['book_id'];
            $returndate = date('y-m-d');

            $updateborrow = $conn->prepare("UPDATE borrows SET returnDate = ? WHERE id = ?");
            $updateborrow->execute([$returndate,$borrowid]);

            $updatebook = $conn->prepare("UPDATE books SET status = 'available' WHERE id = ? ");
            $updatebook->execute([$bookid]);

            header("Location: /profile");
            exit();
        }
    }
}

?>