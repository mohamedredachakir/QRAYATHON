
<?php 

require_once '../config/database.php';
require_once '../app/Models/User.php';
require_once '../app/Services/AuthService.php';

if(isset($_POST['signup'])){
    $fn = $_POST['fisrtname'];
    $ls = $_POST['lastname'];
    $email = $_post['email'];
    $role = "reader";
    $pass = $_POST['password'];
    $password = password_hash($pass,PASSWORD_DEFAULT);

    $auth = new authservice($conn);
    $result = $auth->signup($fn,$ls,$email,$role,$pass);
    if($result){
        echo "user registered successfully!";
    }else{
        echo "user could not register user!";
    }
}

if(isset($_POST['signin'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $auth = new authservice($conn);
    $user = $auth->signin($email,$password);
    if($user){
        $_SESSION['user'] = $user;
        echo "welcome!";
    }else{
        echo "invalid email or password!";
    };

}


require_once '../views/auth/login.php';
require_once '../views/auth/register.php';
?>