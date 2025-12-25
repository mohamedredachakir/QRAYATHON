
<?php 


require_once '../app/Models/User.php';


class authcontroller{
    public function register(){
    require_once '../config/db.php';
    if(isset($_POST['signup'])){
    $fn = $_POST['fisrtname'];
    $ls = $_POST['lastname'];
    $email = $_POST['email'];
    $role = "reader";
    $pass = $_POST['password'];
    $password = password_hash($pass,PASSWORD_DEFAULT);
    $check =$conn->prepare("SELECT * FROM users where email = ?");
    $check->execute([$email]);
    if($check->rowCount() > 0){
        echo "user allready exist";
    }else{
     $sql = "INSERT INTO users (firstName,lastName,email,password,role)
             VALUES (?,?,?,?,?)";
     $stmt = $conn->prepare($sql);
       if($stmt->execute([$fn,$ls,$email,$password,$role])){echo "registered succes!";};
    }
    }
 }

 public function login(){
    require_once './../config/db.php';
    if(isset($_POST['signin'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if($user && password_verify($password,$user['password'])){
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['firstName'];
            $_SESSION['role'] = $user['role'];
            if($user['role'] === 'admin') {
                header("Location: /dashboard");
                echo "welcome!";
                exit();
            }else{
                header("Location: /profile");
                echo "welcome!";
                exit();
            }
        }
    
    else{
        echo "invalid email or password!";
    };
 }
}

public function logout() {
    if(isset($_POST['logout'])){
        session_destroy();
        header("Location: /");
        exit();
    }
}

}



?>