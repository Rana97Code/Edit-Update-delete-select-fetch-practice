<?php
$conn=new mysqli("localhost","root","","edit&update");
if ($conn->connect_error) die("Connection failed");


try {
    $pdo = new PDO('mysql:hostname=localhost; dbname=edit&update', 'root', '');
} catch(PDOException $e){
    exit('database error');
}
?>