
<?php 
try{
$conn = new PDO("mysql:host=localhost;
                dbname=qrayathon","root","197170");
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e ){
    die("database connection failed : " . $e->getMessage() . phpinfo() );
}



?>