<?php 
// استدعاء الموديل في بداية الملف ليتمكن الكنترولر من استخدامه
require_once __DIR__ . '/../Models/Book.php'; 

class bookcontroller {
    
    public function index(){
        // 1. استدعاء ملف القاعدة باستخدام مسار مطلق
        require_once __DIR__ . '/../../config/db.php';
        
        // 2. تفعيل الوصول للمتغير العالمي
        global $conn; 

        try {
            $sql = "SELECT * FROM books";
            $stmt = $conn->query($sql);
            $bookdata = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $books = [];
            foreach ($bookdata as $data){
                // تأكد أن كلاس Book موجود في مجلد Models
                $books[] = new Book($data['id'], $data['title'], $data['author'], $data['status']);
            }
            
            // 3. تصحيح مسار العرض (View)
            require_once './../views/books/list.php';
            
        } catch (PDOException $e) {
            die("Database Error: " . $e->getMessage());
        }
    }

    public function add(){
        if(session_status() === PHP_SESSION_NONE) session_start();
        
        if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin'){
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
                // توجيه باستخدام نظام الـ url/page الخاص بك
                header("Location: index.php?url=books");
                exit();
            }
        }
        require_once __DIR__ . '/../../views/books/addbook.php';
    }
}