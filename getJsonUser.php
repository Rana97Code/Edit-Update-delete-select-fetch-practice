<?php 
require_once 'connect.php';

// for customer Details show in table
$id = $_POST["id"];
$select = $pdo->prepare("select * from bio where id =:id ");
$select->bindParam(":id", $id);
$select->execute();
$row=$select->fetch(PDO::FETCH_ASSOC);

$response = $row;

header('Content-Type: application/json');

echo json_encode($response);





?>