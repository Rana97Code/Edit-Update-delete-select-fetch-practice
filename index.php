<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
include 'connect.php';
?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"  crossorigin="anonymous">
</head>
<body>
    

<form action="" method="POST">
<table  style=
    "border: 1px solid;"  aling="center" cellspacing="20" >
           
    <tr>
            <td>
                <label for="">ID</label>
                <input type="number" name="id">
            </td>
        </tr>
        <tr>
            <td>
                <label for="">First Name</label>
                <input type="text" name="first_name">
            </td>
        </tr>
        <tr>
            <td>
                <label for="">Last Name</label>
                <input type="text" name="last_name">
            </td>
        </tr>
        <tr>
            <td>
                <label for="">Age</label>
                <input type="text" name="age">
            </td>
        </tr>
        <tr>
            <td><button type="submit" name="submit">submit</button></td>
        </tr>

     
    </table>
</form>



<div class="box" style="border: 1px solid black; margin-left: 599px;"><button><a href="jsonSystem.php">JSON System Select and Get Details</a></button></div>

<!-- Insert to database -->
<?php
if(isset($_POST['submit'])){
  
    $firstname = $_POST['first_name'];
    $last_name=$_POST['last_name'];
    $age =$_POST['age'];


    $insertdata= "INSERT INTO bio (first_name,last_name,age) VALUES ('$firstname', '$last_name', '$age')";
    if (mysqli_query($conn, $insertdata)) {
        $mess = "<div class='bg-success p-2 rounded-pill text-center'>Data Inserted Successfully</div>";
         
     } else {
         $mess = "<div class='bg-danger p-2 rounded-pill text-center'>Insert Error</div>";
     }
}
?>
<!-- Get from database -->

<form action="index.php" method="get">
<input type="submit" name="ASC" value="Ascending"><br>
<input type="submit" name="DESC" value="Descending"><br>
 <table  class=" table-bordered table-striped viewtable"  style=
    "border: 1px solid;">

    <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
    </tr>
    
<?php
 $getdata="select * from bio";
 $data=mysqli_query($conn,$getdata);
 $total = mysqli_num_rows($data);
 if($total!=0){

 while($result=mysqli_fetch_assoc($data))
 {
    echo"
 
       
        <tr>
            <td>".$result['id']."</td>
            <td>".$result['first_name']."</td>
            <td>".$result['last_name']."</td>
            <td>".$result['age']." </td>
         
            <td><a href='edit.php?id=$result[id]&fn=$result[first_name]&ln=$result[last_name]&ag=$result[age]'>Update & Edit</a>
           </td>
            
            <td><a href='delete.php?deleteid=$result[id]&table=bio'>Delete
           </a></td>
            
        </tr>
        ";



        
    }
   }
   ?>
    </table>
</form>
    




<form action="" method="get">
    <table  class=" table-bordered table-striped viewtable"  style=
    "border: 1px solid;">
    <h3>for moddal </h3>
    <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
    </tr>
    
<?php
 $getdata="select * from bio";
 $data=mysqli_query($conn,$getdata);
 $total = mysqli_num_rows($data);
 if($total!=0){

 while($result=mysqli_fetch_assoc($data))
 {
    echo"
 
       
        <tr>
        
            <td>".$result['id']."</td>
            <td>".$result['first_name']."</td>
            <td>".$result['last_name']."</td>
            <td>".$result['age']." </td>
         
            <td><a class='editbtn'>Update & Edit</a>
           </td>
            
            <td><a href='delete.php?id=$result[id]' onclick='return cleckdelete()'>Delete</td>
            
            
        </tr>
        ";

    }
   }
   ?>
    </table>
</form>

<a href="Asc&Dscendin.php">Ascending and Dscending</a>





<button><a href="" id="editbtn"> i am modal</a></button>



<!-- 
modal -->
<div class="modal fade" id="editmodale" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Product Settings</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="width: 50%;">
        
	  <form action="" method="POST">
		 <input type="text" name="id" id="id">
		 <input type="text" name="first_name" id="first_name">
		 <input type="text" name="last_name" id="last_name">
		 <input type="text" name="age" id="age">
          
		
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" name="editsub" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
if(isset($_POST['editsub'])){
  
    $id=$_POST['id'];
    $firstname = $_POST['first_name'];
    $last_name=$_POST['last_name'];
    $age =$_POST['age'];

    $query ="UPDATE BIO SET id='$id', first_name='$firstname', last_name='$last_name', age='$age' WHERE id='$id'";

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






<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>
	$(document).ready(function(){
		$('.editbtn').on('click', function(){
			$('#editmodale').modal('show');

			$tr =$(this).closest('tr');
			 var data= $tr.children("td").map(function() {
				 return $(this).text();
			 }).get();

			 console.log(data);

			 $('#id').val(data[0]);
			 $('#first_name').val(data[1]);
			 $('#last_name').val(data[2]);
			 $('#age').val(data[3]);
		});
	});
</script>
</body>
</html>














<!-- ascending and descending -->
<?php


// Ascending Order
if(isset($_POST['ASC']))
{
    $asc_query = "SELECT * FROM bio ORDER BY age ASC";
    $result = executeQuery($asc_query);
}

// Descending Order
elseif (isset ($_POST['DESC'])) 
    {
          $desc_query = "SELECT * FROM bio ORDER BY age DESC";
          $result = executeQuery($desc_query);
    }
    
    // Default Order
 else {
        $default_query = "SELECT * FROM bio";
        $result = executeQuery($default_query);
}


function executeQuery($query)
{
    $connect = new mysqli("localhost","root","","edit&update");
    $result = mysqli_query($connect, $query);
    return $result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> PHP HTML TABLE ORDER DATA </title>
       <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
     
        <form action="" method="post">
         
            <input type="submit" name="ASC" value="Ascending"><br><br>
            <input type="submit" name="DESC" value="Descending"><br><br>
            </form>
            <table>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                </tr>
                <!-- populate table from mysql database -->
                <?php while ($row = mysqli_fetch_array($result)):?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['first_name'];?></td>
                    <td><?php echo $row['last_name'];?></td>
                    <td><?php echo $row['age'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        
       
    </body>
</html>











