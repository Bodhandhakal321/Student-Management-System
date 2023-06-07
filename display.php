<html>
    <head>
        <title>Display</title>
        <style>
            body{
                background:#D071f9;
            }
            table{
                background-color: white;
            }
            .update, .delete{
                background-color: blueviolet;
                color: white;
                border: 0;
                outline: none;
                border-radius: 5px;
                height: 22px;
                width: 70px;
                font-weight: bold;
                cursor: pointer;
            }
            .update:hover{
                background-color:burlywood;
            }
            .delete{
                background-color: red;
                
            }
            .delete:hover{
                background-color:burlywood;
            }
        </style>
    </head>
</html>
<?php 
require 'practisestd/Database.php';
$conn=getDB();
error_reporting(0); //to remove error 

$fetch = "SELECT * from students";
$data = mysqli_query($conn, $fetch);

$totalvalues = mysqli_num_rows($data);
// echo $totalvalues;  //forchecking whether databse has values or not
  //fetching data in the form of array asspc fumction

 //case sensetive and must tally name from database . for concatination 

    
if($totalvalues != 0){
    // echo "table has records";
   ?>
   <h2 align="center"> RECORDS FOR STUDENTS</h2>
    <center><table border="1" cellspacing="7" width="80%">
   <tr>
       <th width="5%">id</th>
       <th width="10%">name</th>
       <th width="20%">address</th>
       <th width="25%">email</th>
       <th width="20%">Operations</th>
    </tr>
       


  <?php
    while($result = mysqli_fetch_assoc($data))
    {
    //    echo"hello saroj <br>"; //for checking 
     echo " <tr>
             <td>".$result['id']."</td>
             <td>".$result['name']."</td>
             <td>".$result['address']."</td>
             <td>".$result['email']."</td>

             <td> <a href='update_design.php?id=$result[id]'><input type='submit' value='Update' class='update'></a>

              <a href='delete.php?id=$result[id]'><input type='submit' value='Delete' class='delete' onclick= 'return checkdeleted()'></a></td>
           </tr>
                ";
   
    }
}
else{
    echo "no data record found";
}








?>

</table>
</center>
<script>
    function checkdeleted(){
        return confirm('Are you sure you want to delete this record?');
    }
    </script>
