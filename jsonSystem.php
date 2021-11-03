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
</head>
<body>
    

<!-- jeson formula select one get full detaul-->
<div class="container">
 <form action="" method="post">
   <table style="border: 1px solid black; margin-left: 500px;" id="UserTable">
    <th><h3>THIS is The Jeson System</h3></th>
 
    <tr>
    
        <th>Name</th>
        <th><select class="form-control" name="userName" id="userName" autocomplete="off" >
            <option value="">নির্বাচন করুন</option>
            <?php
             $dukanSql = "SELECT * FROM bio ";
            $customerData = $conn->query($dukanSql);

            while($row = $customerData->fetch_array()) {									 		
            echo "<option value='".$row['id']."' >".$row['first_name']."</option>";
             } // /while 
                    ?>
    </select></th>
    </tr>
    <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;" >Last Name</td>
        <td style="border: 1px solid black;" ><input type="text" name="last_name" id="last_name"></td>
        <td style="border: 1px solid black;" >Age</td>
        <td style="border: 1px solid black;" ><input type="text" name="age" id="age"></td>
    </tr>
  </table>
 </form>
</div>

<H1>This source code page 4 cdn must be used</H1>

</body>
</html>


<script>
                $("#userName").on("change",function(){
                  var userID=this.value;
                  console.log(userID);
                  var custom=document.querySelector("#UserTable");
                 
                      console.log(custom);
                      $.ajax({
                      url: "getJsonUser.php",
                    method:"POST",
                    data:{
                        id:userID
                    },
                    success:function(data) {
                    console.log(data);
                     custom.querySelector("#last_name").setAttribute("value",data["last_name"]);
                     custom.querySelector("#age").setAttribute("value",data["age"]);
                    
                     
//                   arr.push(data["customer_id"]);
//                   tr.querySelector(".pid").setAttribute("value", data["p_id"]);
//                   tr.querySelector(".pname").setAttribute("value", data["p_name"]); tr.querySelector(".p_purchase_unit").setAttribute("value", data["p_purchase_price"]);
//                   tr.querySelector(".pquantity").setAttribute("value", 0);
//                   tr.querySelector(".ptotal").setAttribute("value", tr.querySelector(".p_purchase_unit").getAttribute("value") * tr.querySelector(".pquantity").getAttribute("value"));
                  
//                    tr.find(".pstock").val(data["p_purchase_unit"]);
//                    
//                    tr.find(".ptotal").val(1);
//                    tr.find(".ptotal").val( tr.find(".pprice").val() *  tr.find(".pquantity").val());
                  // calculate(0,0);
                    
              }
          });
                });



              
 </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>