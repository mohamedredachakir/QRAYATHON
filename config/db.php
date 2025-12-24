
<?php 

// $host = 'localhost';
// $user = 'root';
// $password = '197170';
// $db = 'qrayathon';

// $conn = new mysqli($host,$user,$password,$db);

// if(!$conn){die("connect failed");}

try{
$conn = new PDO("mysql:host=local=localhost;
                dbname=qrayathon","root","197170");
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException ){
    die("database connection failed : ");
}



?>