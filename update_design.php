<?php 
 require 'practisestd/Database.php';
$conn=getDB();
$id=  $_GET['id'];
$fetch = "SELECT * from students where id= '$id'";
$data = mysqli_query($conn, $fetch);

$result = mysqli_fetch_assoc($data);
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
            <h2>Update Form</h2>
            <div class="form">
                <div class="form_items">
                <label for="">Student Name:</label>
                <input type="text" placeholder="studentname" value="<?php echo $result['name'] ?>" name="sname" required>
                </div>    
                <div class="form_items">
                <label for="">Address</label>
                <input type="text" placeholder="address" value="<?php echo $result['address'] ?>" name="saddress" required>
                </div>                 
                <div class="form_items">
                <label for="">email:</label>
                <input type="text" placeholder="email" name="semail" value="<?php echo $result['email'] ?>" required>
                </div>  
                <input type="submit" value="update" name="update">              
                                        
            </div>

        </div>




    </form>
</body>
</html>
<?php 
   if(isset($_POST['update'])){
    $studentname= $_POST['sname'];
    $studentaddress= $_POST['saddress'];
    $studentemail= $_POST['semail'];

    // $sql="insert into students(name,address,email) values('$studentname','$studentaddress','$studentemail')";
    $query= "UPDATE students set name='$studentname',address='$studentaddress',email='$studentemail' WHERE id='$id'";
    // echo "$sql";
    // exit;
    $data=mysqli_query($conn,$query);
    if($data){
        echo "<script>alert('data updated successfully')</script> ";
        ?>
        <meta http-equiv = "refresh" content = "0; url = http://localhost:3000/display.php" />  
        <?php
    }else{
        echo"connection failed";
    }




   }



?>