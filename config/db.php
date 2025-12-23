
<?php 

$host = 'localhost';
$user = 'root';
$password = '197170';
$db = 'qrayathon';

$conn = new mysqli($host,$user,$password,$db);

if(!$conn){die("connect failed");}

?>