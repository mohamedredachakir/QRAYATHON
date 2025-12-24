
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

require_once '../views/auth/register.php';
?>