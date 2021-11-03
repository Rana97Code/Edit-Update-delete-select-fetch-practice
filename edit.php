<?php
require('connect.php');
error_reporting(0);
$id=$_GET['id'];
$efn=$_GET['fn'];
$eln=$_GET['ln'];
$eag=$_GET['ag'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit The form</title>
</head>
<body>
    
<form action="" method="POST">
    <table  aling="center" cellspacing="20" style=
    "border: 1px solid;" >
    <tr>
            <td>
                <label for="">ID</label>
                <input type="number" name="id" value="<?php echo "$id" ?>">
            </td>
        </tr>
        <tr>
            <td>
                <label for="">First Name</label>
                <input type="text" name="firstname" value="<?php echo "$efn" ?>">
            </td>
        </tr>
        <tr>
            <td>
                <label for="">Last Name</label>
                <input type="text" name="lastname" value="<?php echo "$eln" ?>">
            </td>
        </tr>
        <tr>
            <td>
                <label for="">Age</label>
                <input type="text" name="Age" value="<?php echo "$eag" ?>">
            </td>
        </tr>
        <tr>
            <td><input name="submit" type="submit" value="submit"></td>
        </tr>

     
    </table>
</form>
</body>
</html>
 
  <!-- for edit and update -->
<?php

if(isset($_POST['submit'])){
    $id= $_POST['id'];
    $firstnam= $_POST['firstname'];
    $laststnam= $_POST['lastname'];
    $age= $_POST['Age'];

    $query ="UPDATE BIO SET id='$id', first_name='$firstnam', last_name='$laststnam', age='$age' WHERE id='$id'";

$data =mysqli_query($conn, $query);
 if($data){
     echo "<script>alert('Record Updated')</script>";
     ?>
     <meta http-equiv="refresh" content="0; url=http://localhost/Edit&Update">
     <?php
 }
 else{
     echo "Failed to update Record";
 }
} 

?>

    

