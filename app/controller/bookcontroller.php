

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
    
}

?>