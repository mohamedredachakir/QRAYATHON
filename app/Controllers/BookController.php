<?php 

require_once __DIR__ . '/../Models/Book.php'; 

class bookcontroller {
    
    public function index(){
        
        require_once __DIR__ . '/../../config/db.php';
        if (!isset($_SESSION['user'])) {
       
        header("Location: index.php?url=login");
        exit();
    }
       
        global $conn; 

        try {
            $sql = "SELECT * FROM books";
            $stmt = $conn->query($sql);
            $bookdata = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $books = [];
            foreach ($bookdata as $data){
                
                $books[] = new Book($data['id'], $data['title'], $data['author'], $data['status']);
            }
            

            require_once './../views/books/list.php';
            
        } catch (PDOException $e) {
            die("Database Error: " . $e->getMessage());
        }
    }

    public function add(){
        if(session_status() === PHP_SESSION_NONE) session_start();
        
        if($_SESSION['user']['role'] !== 'admin'){
            die('Access Denied: You do not have permission!');
        }

        if(isset($_POST['add_book'])){
            require_once __DIR__ . '/../../config/db.php';
            global $conn;

            $title = $_POST['title'];
            $author = $_POST['author'];
            $year = $_POST['year'];
            $status = "available";

            $sql = "INSERT INTO books (title, author, year, status) VALUES (?,?,?,?)";
            $stmt = $conn->prepare($sql);
            
            if($stmt->execute([$title, $author, $year, $status])){
               
                header("Location: index.php?url=books");
                exit();
            }
        }
        require_once './../views/books/add.php';
    }

    public function delete(){
        if(session_status() === PHP_SESSION_NONE) session_start();
        
        if($_SESSION['user']['role'] !== 'admin'){
            die('Access Denied: You do not have permission!');
        }

              $id = $_GET['id'] ?? null;

    if($id) {
        require_once __DIR__ . '/../../config/db.php';
        global $conn;

        $sql = "DELETE FROM books WHERE id = ?";
        $stmt = $conn->prepare($sql);
            
            if($stmt->execute([$id])){
               
                header("Location: index.php?url=books");
                exit();
            }
        }
        require_once './../views/books/add.php';
    }

public function edit() {
    if (session_status() === PHP_SESSION_NONE) session_start();
    if ($_SESSION['user']['role'] !== 'admin') die('Access Denied');

    require_once __DIR__ . '/../../config/db.php';
    global $conn;

  
    if (isset($_POST['edit_book'])) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $year = $_POST['year'];

        $sql = "UPDATE books SET title = ?, author = ?, year = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        
        if ($stmt->execute([$title, $author, $year, $id])) {
            header("Location: index.php?url=books");
            exit();
        }
    }

   
    $id = $_GET['id'] ?? $_POST['id'] ?? null;
    
    if ($id) {
        $stmt = $conn->prepare("SELECT * FROM books WHERE id = ?");
        $stmt->execute([$id]);
        $book = $stmt->fetch(PDO::FETCH_OBJ); 

        if ($book) {
            require_once __DIR__ . '/../../views/books/edit.php';
        } else {
            die("Scroll not found in archives!");
        }
    } else {
        header("Location: index.php?url=books");
        exit();
    }
}


}
