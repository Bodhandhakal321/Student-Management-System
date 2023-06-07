<?php 
 require 'practisestd/Database.php';
$conn=getDB();
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
    <h1>Student Management System</h1>
    <form action="" method="post">
        <div class="container">
            <h2>Register Form</h2>
            <div class="form">
                <div class="form_items">
                <label for="">Student Name:</label>
                <input type="text" placeholder="studentname" name="sname" required>
                </div>    
                <div class="form_items">
                <label for="">Address</label>
                <input type="text" placeholder="address" name="saddress" required>
                </div>                 
                <div class="form_items">
                <label for="">email:</label>
                <input type="text" placeholder="email" name="semail" required>
                </div>  
                <input type="submit" value="submit" name="register">              
                                        
            </div>

        </div>




    </form>
</body>
</html>
<?php 
   if(isset($_POST['register'])){
    $studentname= $_POST['sname'];
    $studentaddress= $_POST['saddress'];
    $studentemail= $_POST['semail'];

    $sql="insert into students(name,address,email) values('$studentname','$studentaddress','$studentemail')";
    // echo "$sql";
    // exit;
    $query=mysqli_query($conn,$sql);
    if($query){
        echo "data inserted successfully";
    }else{
        echo"connection failed";
    }




   }



?>