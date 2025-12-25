

<?php 

class bookcontroller {
    public function index(){
        require_once './config/db.php';
        $sql = "SELECT * FROM books";
        $stmt = $conn->query($sql);
        $bookdata = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $books = [];
        foreach ($bookdata as $data){
            $books[] = new Book($data['id'], $data['title'], $data['author'], $data['status']);
        }
        require_once './views/books/listviews.php';
    }
    public function add(){
        if(session_status() === PHP_SESSION_NONE) session_start();
        if($_SESSION['role'] !== 'admin'){
            die('not have permetion!');
            header("Location: /home");
            exit();
        }
        if(isset($_POST['add_book'])){
            require './config/db.php';
            $title = $_POST['title'];
            $author = $_POST['author'];
            $year = $_POST['year'];
            $status = "available";
            $sql = "INSERt INTO books (title,author,year,status) VALUES (?,?,?,?)";
            $stmt = $conn->prepare($sql);
            if($stmt->execute([$title,$author,$year,$status])){
                header("Location: /books");
                exit();
            }
        }
        require_once './views/books/addbook.php';
    }
}

?>