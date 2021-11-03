<?php
include 'connect.php';



if (isset($_GET['deleteid'])) {

	$TableName = $_GET['table']; 
	$whereid = $_GET['deleteid'];
	
	
    $delete_query = "DELETE FROM {$TableName} WHERE {$whereid}";
    if (mysqli_query($conn, $delete_query)) {
		$mess = "<div class='alert alert-warning p-2 text-white '>Delete Successfully</div>";
		header( "refresh:1;url=index.php?");
		}else{
		$mess = "<div class='bg-danger p-2 rounded-pill text-center'>Delete Error</div>";
	}

}







?>